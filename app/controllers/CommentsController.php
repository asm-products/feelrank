<?php

class CommentsController extends BaseController {

	public function store($id)
	{
		$input = Input::all();

		$comment = new Comment();

		$comment->user_id = Auth::user()->id;
		$comment->body = $input['comment'];
		$comment->parent_id = null;

		Discussion::find($id)->comments()->save($comment);

		return Redirect::to('discussions/' . $id);
	}

	public function create_reply($discussion_id, $comment_id)
	{
		return View::make('partials.comments.reply', compact('discussion_id', 'comment_id'));
	}

	public function store_reply($discussion_id, $comment_id)
	{
		$input = Input::all();

		$comment = new Comment();

		$comment->user_id = Auth::user()->id;
		$comment->body = $input['comment'];
		$comment->parent_id = $comment_id;

		Discussion::find($discussion_id)->comments()->save($comment);

		return Redirect::to('discussions/' . $discussion_id);
	}

	public function show_replies($id)
	{
		$comments = Comment::find($id)->children;

		return View::make('partials.comments.child', compact('comments'));
	}

	public function userComments($id)
	{
		$comments = Auth::user()->comments()->with('ranks')->orderBy('created_at', 'DESC')->paginate(30);

		return View::make('users.comments', compact('comments'));
	}
}