<?php

use FeelRank\Services\DiscussionService;
use FeelRank\Repositories\DiscussionRepository;

class DiscussionsController extends BaseController {

	public function __construct(DiscussionService $discussionService, DiscussionRepository $discussionRepository)
	{
		$this->DiscussionService = $discussionService;
		$this->DiscussionRepository = $discussionRepository;
	}

	public function store()
	{
		try
		{
			$discussion = $this->DiscussionService->create(Input::all());
		}
		catch (FeelRank\Validators\ValidationException $e)
		{
			return Redirect::back()->withInput()->withErrors($e->getErrors());
		}

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

	public function follow($id)
	{
		$discussion = $this->DiscussionRepository->follow($id);

		return '<span id="follow-discussion-' . $discussion->id . '"><a href="#" class="btn btn-success btn-xs" ic-src="/tags/' . $discussion->id . '/unfollow" ic-trigger-on="click" ic-target="#follow-discussion-' . $discussion->id . '"><i class="fa fa-check"></i>&nbsp;&nbsp;Following</a></span>';
	}

	public function unfollow($id)
	{
		$discussion = $this->DiscussionRepository->unfollow($id);

		return '<span id="follow-discussion-' . $discussion->id . '"><a href="#" class="btn btn-default btn-xs" ic-src="/tags/' . $discussion->id . '/follow" ic-trigger-on="click" ic-target="#follow-discussion-' . $discussion->id . '"><i class="fa fa-binoculars"></i>&nbsp;&nbsp;Follow</a></span>';
	}
}