<?php

use FeelRank\Services\DisqusService;

class DiscussionsController extends BaseController {

	public function __construct(DisqusService $disqusService)
	{
		$this->disqusService = $disqusService;
	}

	public function store()
	{
		$input = Input::all();

		$discussion = new Discussion();

		$discussion->post_id = $input['post_id'];
		$discussion->title = $input['title'];
		$discussion->user_id = Auth::user()->id;

		Post::find($input['post_id'])->discussions()->save($discussion);

		return Redirect::to('discussions/' . $discussion->id);
	}

	public function show($id)
	{
		$discussion = Discussion::with('ranks', 'comments', 'comments.ranks')->findOrFail($id);
		$post = $discussion->post()->with('ranks')->first();

		return View::make('discussions.show', compact('discussion', 'post'));
	}

	// Ranking

	public function uprank($id)
	{
		$uprank = new Dissrank();

		$uprank->vote = 1;
		$uprank->discussion_id = $id;
		$uprank->user_id = Auth::user()->id;

		$uprank->save();

		$newRank = Discussion::find($id)->dissranks->sum('vote');

		return View::make('partials.discussions.uprank', compact('newRank', 'id'));
	}

	public function downrank($id)
	{
		$uprank = new Dissrank();

		$uprank->vote = -1;
		$uprank->discussion_id = $id;
		$uprank->user_id = Auth::user()->id;

		$uprank->save();

		$newRank = Discussion::find($id)->dissranks->sum('vote');

		return View::make('partials.discussions.downrank', compact('newRank', 'id'));
	}

	public function changeRank($id, $current_rank)
	{
		// THIS IS USEFUL, EVENTUALLY MAKE INTO A SCOPE FOR CLENLINESS

		$rank = Dissrank::where('discussion_id', '=', $id)->where('user_id', '=', Auth::user()->id)->first();

		if ($current_rank === 'up')
		{
			$rank->vote = -1;

			$rank->save();

			$newRank = Discussion::find($id)->dissranks->sum('vote');

			return View::make('partials.discussions.downrank', compact('newRank', 'id'));
		}

		$rank->vote = 1;

		$rank->save();

		$newRank = Discussion::find($id)->dissranks->sum('vote');

		return View::make('partials.discussions.uprank', compact('newRank', 'id'));
	}

	public function userDiscussions($id)
	{
		$discussions = Auth::user()->discussions()->with('ranks')->orderBy('created_at', 'DESC')->paginate(30);

		return View::make('users.discussions', compact('discussions'));
	}
}