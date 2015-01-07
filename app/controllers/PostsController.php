<?php

use FeelRank\Connectors\EmbedlyConnector;
use FeelRank\Services\Url64Service;
use FeelRank\Services\PostService;
use FeelRank\Repositories\PostRepository;
use FeelRank\Repositories\TagRepository;

use FeelRank\Validators\FetchValidator;
use FeelRank\Validators\PostValidator;

class PostsController extends BaseController {

	public function __construct(EmbedlyConnector $embedlyConnector, Url64Service $url64Service, PostRepository $postRepository, TagRepository $tagRepository, PostService $postService)
	{
		$this->EmbedlyConnector = $embedlyConnector;
		$this->PostRepository = $postRepository;
		$this->TagRepository = $tagRepository;
		$this->PostService = $postService;
	}

	public function create()
	{
		return View::make('posts.create');
	}

	public function store()
	{
		// Extract out--corrects for lack of http, which throws a validation error.
		
		$input = Input::all();
		
		if (substr($input['url'], 0, 7) !== "http://")
		{
			$input['url'] = 'http://' . $input['url'];
		}
		
		try
		{
			$post = $this->PostService->create($input);
		}
		catch (FeelRank\Validators\ValidationException $e)
		{
			return Redirect::back()->withInput()->withErrors($e->getErrors());
		}

		$this->TagRepository->create(Input::get('tags'), $post);

		return View::make('posts.partials.create2', compact('post'));
	}
	
	public function store2()
	{
		$input = Input::all();
		
		$post = Post::find($input['post_id']);
		
		if (Input::has('title'))
		{
			$this->DiscussionService->create($input);
		}
		
		if (Input::has('tags'))
		{
			$this->TagRepository->create($input['tags'], $post);
		}
		
		return Redirect::to('/posts/' . $post->id);
	}

	public function fetch()
	{
		$input = Input::all();

		if (substr($input['url'], 0, 7) !== "http://")
		{
			$input['url'] = 'http://' . $input['url'];
		}

		try
		{
			$url_info = $this->PostService->fetch($input);
		}
		catch (FeelRank\Validators\ValidationException $e)
		{
			return Redirect::back()->withInput()->withErrors($e->getErrors());
		}
		catch (Guzzle\Http\Exception\ClientErrorResponseException $e)
		{
			return Redirect::back()->withInput()->withErrors($e->getMessage());
		}

		return View::make('posts.fetch', compact('url_info'));
	}

	public function show($id)
	{
		$post = Post::with('discussions', 'ranks', 'tags')->find($id);
		
		$post_history = Rank::where('rankable_id', '=', $id)->orderBy('created_at', 'DESC')->take(20)->get();

		$post_rank = 0;

		if($post->ranks->count() > 0)
		{
			$post_rank = $post->ranks->sum('vote');
			unset($post_history[0]);
		}

		$original_rank = $post_rank;

		$owned = false;

		if (Auth::check())
		{
			if (Auth::user()->ownedSources()->where('id', '=', $post->source()->first()->id)->first())
			{
				$owned = true;
			}
		}

		return View::make('posts.show', compact('post', 'post_history', 'post_rank', 'original_rank', 'owned'));
	}

	// Sorting

	public function mostRank()
	{
		$posts = $this->PostRepository->mostRank();

		$sort = 'Most Rank';

		return 	View::make('posts.showlist', compact('posts', 'sort'));
	}

	public function leastRank()
	{
		$posts = $this->PostRepository->leastRank();

		$sort = 'Least Rank';

		return 	View::make('posts.showlist', compact('posts', 'sort'));
	}

	public function mostDiscussions()
	{
		$posts = $this->PostRepository->mostDiscussions();

		$sort = 'Most Discussions';

		return 	View::make('posts.showlist', compact('posts', 'sort'));
	}

	public function leastDiscussions()
	{
		$posts = $this->PostRepository->leastDiscussions();

		$sort = 'Least Discussions';

		return 	View::make('posts.showlist', compact('posts', 'sort'));
	}

	public function mostRecent()
	{
		$posts = $this->PostRepository->mostRecent();

		$sort = 'Most Recent';

		return 	View::make('posts.showlist', compact('posts', 'sort'));
	}

	public function leastRecent()
	{
		$posts = $this->PostRepository->leastRecent();

		$sort = 'Least Recent';

		return 	View::make('posts.showlist', compact('posts', 'sort'));
	}

	public function userPosts($id)
	{
		$posts = $this->PostRepository->userPosts($id);

		$sort = 'My Posts - Most Recent';

		return 	View::make('posts.showlist', compact('posts', 'sort'));
	}

	public function taggedPost($id)
	{
		$posts = $this->PostRepository->getTagged($id);

		$sort = 'Tagged: ' . Tag::where('id', '=', $id)->first()->name;

		return 	View::make('posts.showlist', compact('posts', 'sort'));
	}

	public function taggedPosts()
	{
		return 	View::make('posts.showlist', compact('posts'));
	}

	public function getTags()
	{
		$tags = $this->TagRepository->search(Input::get('search'));

		return View::make('tags.search', compact('tags'));
	}

	public function follow($id)
	{
		$post = $this->PostRepository->follow($id);

		return '<span id="follow-post-' . $post->id . '"><a href="#" class="btn btn-success btn-xs" ic-src="/tags/' . $post->id . '/unfollow" ic-trigger-on="click" ic-target="#follow-post-' . $post->id . '"><i class="fa fa-check"></i>&nbsp;&nbsp;Following</a></span>';
	}

	public function unfollow($id)
	{
		$post = $this->PostRepository->unfollow($id);

		return '<span id="follow-post-' . $post->id . '"><a href="#" class="btn btn-default btn-xs" ic-src="/tags/' . $post->id . '/follow" ic-trigger-on="click" ic-target="#follow-post-' . $post->id . '"><i class="fa fa-binoculars"></i>&nbsp;&nbsp;Follow</a></span>';
	}
	
	public function claim($id)
	{
		// Probably should be extracted
		
		$user = Auth::user();
		
		$source = Post::find($id)->source()->first();
		
		$domain = $source->name;
		
		try
		{
			$key = file_get_contents('http://' . $domain . '/feelrank.txt');
		}
		catch (Exception $e)
		{
			return View::make('ownership.error');
		}
		
		if ($source->users != null)
		{
			return View::make('ownership.ownederror');
		}
		
		if ($key === Auth::user()->confirmation_code)
		{
			$user->ownedSources()->attach($source);
			
			$user->attachRole(1);
			
			return View::make('ownership.confirmed');
		}
		
		return View::make('ownership.error');
	}
}