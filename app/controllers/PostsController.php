<?php

use FeelRank\Connectors\EmbedlyConnector;
use FeelRank\Services\Url64Service;
use FeelRank\Services\PostService;
use FeelRank\Repositories\PostRepository;

use FeelRank\Validators\FetchValidator;
use FeelRank\Validators\PostValidator;

class PostsController extends BaseController {

	public function __construct(EmbedlyConnector $embedlyConnector, Url64Service $url64Service, PostRepository $postRepository, PostService $postService)
	{
		$this->EmbedlyConnector = $embedlyConnector;
		$this->PostRepository = $postRepository;
		$this->PostService = $postService;
	}

	public function create()
	{
		return View::make('posts.create');
	}

	public function store()
	{
		try
		{
			$post = $this->PostService->create(Input::all());
		}
		catch (FeelRank\Validators\ValidationException $e)
		{
			return Redirect::back()->withInput()->withErrors($e->getErrors());
		}

		return Redirect::to('posts/' . $post->id);
	}

	public function fetch()
	{
		try
		{
			$url_info = $this->PostService->fetch(Input::all());
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
		$post = Post::with('discussions', 'ranks')->find($id);
		
		$post_history = Rank::where('rankable_id', '=', $id)->orderBy('created_at', 'ASC')->take(20)->get();
		$post_history->reverse();

		$post_rank = $post->ranks->sum('vote');

		return View::make('posts.show', compact('post', 'post_history', 'post_rank'));
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

	// History

	public function getHistory()
	{
		$input = Input::all();

		$post_history = Rank::where('rankable_id', '=', $input['id'])->orderBy('created_at', 'ASC')->take(20)->get();
		$post_history->reverse();

		$post_rank = $input['post_rank'];

		return View::make('posts.history', compact('post_history', 'post_rank'));
	}
}