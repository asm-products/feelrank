<?php

class RanksController extends BaseController {

	public function __construct()
	{
		// Eventually put Post, Discussion and Comment repos here.
	}

	// Posts

	public function uprank_post($id)
	{
		$post = Post::find($id);

		$rank = $post->ranks()->where('user_id', '=', Auth::user()->id)->first();

		if (is_null($rank))
		{
			$rank = new Rank();
			$rank->vote = 1;
			$rank->user_id = Auth::user()->id;

			$post->ranks()->save($rank);

			return View::make('partials.posts.uprank', compact('post'));
		}
		
		$rank->vote = 1;
		$rank->save();

		return View::make('partials.posts.uprank', compact('post'));
	}

	public function downrank_post($id)
	{
		$post = Post::find($id);

		$rank = $post->ranks()->where('user_id', '=', Auth::user()->id)->first();

		if (is_null($rank))
		{
			$rank = new Rank();
			$rank->vote = -1;
			$rank->user_id = Auth::user()->id;

			$post->ranks()->save($rank);

			return View::make('partials.posts.downrank', compact('post'));
		}

		$rank->vote = -1;
		$rank->save();

		return View::make('partials.posts.downrank', compact('post'));
	}

	// Discussions

	public function uprank_discussion($id)
	{
		$discussion = Discussion::find($id);

		$rank = $discussion->ranks()->where('user_id', '=', Auth::user()->id)->first();

		if (is_null($rank))
		{
			$rank = new Rank();
			$rank->vote = 1;
			$rank->user_id = Auth::user()->id;

			$discussion->ranks()->save($rank);

			return View::make('partials.discussions.uprank', compact('discussion'));
		}

		$rank->vote = 1;
		$rank->save();

		return View::make('partials.discussions.uprank', compact('discussion'));
	}

	public function downrank_discussion($id)
	{
		$discussion = Discussion::find($id);

		$rank = $discussion->ranks()->where('user_id', '=', Auth::user()->id)->first();

		if (is_null($rank))
		{
			$rank = new Rank();
			$rank->vote = -1;
			$rank->user_id = Auth::user()->id;

			$discussion->ranks()->save($rank);

			return View::make('partials.discussions.downrank', compact('discussion'));
		}

		$rank->vote = -1;
		$rank->save();

		return View::make('partials.discussions.downrank', compact('discussion'));
	}
	
	// Comments

	public function uprank_comment($id)
	{
		$comment = Comment::find($id);

		$rank = $comment->ranks()->where('user_id', '=', Auth::user()->id)->first();

		if (is_null($rank))
		{
			$rank = new Rank();
			$rank->vote = 1;
			$rank->user_id = Auth::user()->id;

			$comment->ranks()->save($rank);

			return View::make('partials.comments.uprank', compact('comment'));
		}

		$rank->vote = 1;
		$rank->save();

		return View::make('partials.comments.uprank', compact('comment'));
	}

	public function downrank_comment($id)
	{
		$comment = Comment::find($id);

		$rank = $comment->ranks()->where('user_id', '=', Auth::user()->id)->first();

		if (is_null($rank))
		{
			$rank = new Rank();
			$rank->vote = -1;
			$rank->user_id = Auth::user()->id;

			$comment->ranks()->save($rank);

			return View::make('partials.comments.downrank', compact('comment'));
		}

		$rank->vote = -1;
		$rank->save();

		return View::make('partials.comments.downrank', compact('comment'));
	}
}