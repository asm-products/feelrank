<?php namespace FeelRank\Repositories;

use DB;
use Post;
use Tag;
use Source;
use \Auth;
use \FeelRank\Services\Url64Service;
use \FeelRank\Services\SourceExtractionService;
use \FeelRank\Services\ThumbnailService;
use \FeelRank\Services\TitleService;

class PostRepository {

	// Laravel docs mention paginate() as inefficient
	// when used with groupBy. Change to use
	// Paginator::make() in the Controller.

	public function __construct(Url64Service $url64Service, SourceExtractionService $sourceExtractionService, ThumbnailService $thumbnailService, TitleService $titleService)
	{
		$this->Url64Service = $url64Service;
		$this->SourceExtractionService = $sourceExtractionService;
		$this->ThumbnailService = $thumbnailService;
		$this->TitleService = $titleService;
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

		// Consider moving this to PostsController

		$url = $input['url'];
		$id = $this->Url64Service->urlTo64BitHash($url);

		$post->id = $id;
		$post->url = urlencode($url);
		$post->title = $this->TitleService->getTitle($url);
		
		// Source Handling--Refactor!
		
		$extracted_source = $this->SourceExtractionService->getSource($url);
		$source = Source::where('name', '=', $extracted_source)->first();
		
		if ($source == null)
		{
			$source = new Source();
			
			$source->name = $extracted_source;
			
			$source->save();
		}
		
		$post->source_id = $source->id;

		$this->ThumbnailService->getThumbnail($url, $id);

		Auth::user()->posts()->save($post);

		return $post;
	}

	public function getTagged($id)
	{
		return \Tag::find($id)->posts;
	}

	public function follow($id)
	{
		$post = Post::find($id);
		$user = Auth::user();

		$user->followedPosts()->attach($post);
		$user->save();

		return $post;
	}

	public function unfollow($id)
	{
		$post = Post::find($id);
		$user = Auth::user();

		$user->followedPosts()->detach($post);
		$user->save();

		return $post;
	}
}