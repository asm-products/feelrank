<?php

class DownranksController extends BaseController {

	public function store($id)
	{
		$downrank = new Downrank();

		return Response::json();
	}

	public function show($id)
	{
		$discussion = Discussion::find($id)->first()->with('comments');

		return View::make('discussions.show', compact('discussion'));
	}

	public function userDownranks($id)
	{
		$downranks = User::find($id)->ranks()->where('vote', '=', -1)->paginate(30);

		return View::make('users.downranks', compact('downranks'));
	}

}