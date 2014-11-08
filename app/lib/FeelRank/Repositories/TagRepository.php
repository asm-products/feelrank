<?php namespace FeelRank\Repositories;

use Tag;
use \Auth;

class TagRepository {
	
	public function create($input, $post)
	{
		$tags = explode(",", $input);

		for($i = 0; $i < count($tags); $i++)
		{
			$tag = new Tag();

			$tag->name = $tags[$i];
			
			$post->tags()->save($tag);			
		}

		return true;
	}

	public function search($input)
	{
		$tags = Tag::where('name', 'LIKE', $input)->get();

		return $tags;
	}

	public function save($id)
	{
		$tag = Tag::find($id);
		$user = Auth::user();

		$user->tags()->attach($tag);
		$user->save();

		return $tag;
	}

	public function remove($id)
	{
		$tag = Tag::find($id);
		$user = Auth::user();

		$user->tags()->detach($tag);
		$user->save();

		return $tag;
	}

	public function recentTags()
	{
		$tags = Tag::orderBy('created_at')->paginate(12);

		return $tags;
	}
}