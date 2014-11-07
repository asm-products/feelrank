<?php namespace FeelRank\Repositories;

use Tag;
use \Auth;

class TagRepository {
	
	public function create($input, $post)
	{
		$tags = explode(",", $input['tags']);

		for($i = 0; $i <= count($tags); $i++)
		{
			$tag = new Tag();

			$tag->name = $tags[$i];
			
			$post->tags->save($tag);			
		}

		return true;
	}
}