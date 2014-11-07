<?php namespace FeelRank\Repositories;

use DB;
use Post;
use Tag;
use \Auth;
use \FeelRank\Services\Url64Service;

class PostRepository {

	// Laravel docs mention paginate() as inefficient
	// when used with groupBy. Change to use
	// Paginator::make() in the Controller.

	public function __construct(Url64Service $url64Service)
	{
		$this->Url64Service = $url64Service;
	}
	
	public function mostRank()
	{
		return Post::leftJoin('ranks', function($join) {
			$join->on('posts.id', '=', 'ranks.rankable_id')
				 ->where('ranks.rankable_type', '=', 'Post');
		})->selectRaw('posts.*, sum(ranks.vote) as rankSum')->groupBy('posts.id')->orderBy('rankSum', 'DESC')->paginate(30);
	}

	public function leastRank()
	{
		return Post::leftJoin('ranks', function($join) {
			$join->on('posts.id', '=', 'ranks.rankable_id')
				 ->where('ranks.rankable_type', '=', 'Post');
		})->selectRaw('posts.*, sum(ranks.vote) as rankSum')->groupBy('posts.id')->orderBy('rankSum', 'ASC')->paginate(30);
	}

	public function mostDiscussions()
	{
		return Post::leftJoin('discussions', 'posts.id', '=', 'discussions.post_id')->selectRaw('posts.*, count(discussions.post_id) as dissCount')->groupBy('posts.id')->orderBy('dissCount', 'DESC')->paginate(30);
	}

	public function leastDiscussions()
	{
		return Post::leftJoin('discussions', 'posts.id', '=', 'discussions.post_id')->selectRaw('posts.*, count(discussions.post_id) as dissCount')->groupBy('posts.id')->orderBy('dissCount', 'ASC')->paginate(30);
	}

	public function mostRecent()
	{
		return Post::orderBy('created_at', 'DESC')->paginate(30);
	}

	public function leastRecent()
	{
		return Post::orderBy('created_at', 'ASC')->paginate(30);
	}

	public function userPosts($id)
	{
		return Post::where('user_id', '=', $id)->orderBy('created_at', 'DESC')->paginate(30);
	}

	public function create($input)
	{
		$post = new Post();

		$url = $input['url'];
		$id = $this->Url64Service->urlTo64BitHash($url);

		$post->id = $id;
		$post->url = urlencode($url);
		$post->title = $input['title'];
		$post->source = $input['source'];
		$post->description = $input['description'];
		$post->thumbnail = '';

		if(isset($input['thumbnail']))
		{
			$post->thumbnail = urlencode($input['thumbnail']);
		}

		Auth::user()->posts()->save($post);

		return $post;
	}

	public function getTagged($id)
	{
		return \Tag::find($id)->posts;
	}
}