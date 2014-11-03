<?php namespace FeelRank\Repositories;

use Discussion;
use Post;
use \Auth;

class DiscussionRepository {
	
	public function create($input)
	{
		$discussion = new Discussion();

		$discussion->post_id = $input['post_id'];
		$discussion->title = $input['title'];
		$discussion->user_id = Auth::user()->id;

		Post::find($input['post_id'])->discussions()->save($discussion);

		return $discussion;
	}
}