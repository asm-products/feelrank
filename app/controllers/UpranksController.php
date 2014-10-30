<?php

class UpranksController extends BaseController {

	public function store()
	{
		$input = Input::all();

		$discussion = new Discussion();

		$discussion->post_id = $input['post_id'];
		$discussion->title = $input['title'];

		if ($input['opening'])
		{
			$comment = new Comment();

			$comment->user_id = Auth::user()->id;
			$comment->comment = $input['opening'];
		}

		Post::find($input['post_id'])->discussions()->save($discussion);
		Discussion::find($discussion->id)->comments()->save($comment);

		return Redirect::to('discussions/' . $discussion->id);
	}

	public function show($id)
	{
		$discussion = Discussion::find($id)->first()->with('comments');

		return View::make('discussions.show', compact('discussion'));
	}

	public function userUpranks($id)
	{
		$upranks = User::find($id)->ranks()->where('vote', '=', 1)->paginate(30);

		return View::make('users.upranks', compact('upranks'));
	}

}