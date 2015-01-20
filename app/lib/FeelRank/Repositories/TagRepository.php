<?php namespace FeelRank\Repositories;

use Tag;
use \DB;
use \Auth;
use \FeelRank\Transformers\TagTransformer;

class TagRepository {
	
	public function __construct(TagTransformer $tagTransformer)
	{
		$this->TagTransformer = $tagTransformer;
	}
	
	public function create($input, $post)
	{
		$tags = explode(",", $input);

		for($i = 0; $i < count($tags); $i++)
		{
			$tags[$i] = $this->TagTransformer->transform($tags[$i]);
			
			$tag = Tag::where('name', '=', $tags[$i])->first();
			
			if ($tag == null)
			{
				$tag = new Tag();
	
				$tag->name = $tags[$i];
				
				$tag->save();
				
				$post->tags()->save($tag);
			}
			
			$has_tag = DB::table('taggables')->whereTagId($tag->id)->whereTaggableId($post->id)->count() > 0;
			
			if ($has_tag)
			{
				continue;
			}
			
			$post->tags()->save($tag);
		}

		return true;
	}

	public function search($input)
	{
		$tags = Tag::where('name', 'LIKE', $input)->get();

		return $tags;
	}

	public function follow($id)
	{
		$tag = Tag::find($id);
		$user = Auth::user();

		$user->followedTags()->attach($tag);
		$user->save();

		return $tag;
	}

	public function unfollow($id)
	{
		$tag = Tag::find($id);
		$user = Auth::user();

		$user->followedTags()->detach($tag);
		$user->save();

		return $tag;
	}

	public function recentTags()
	{
		$tags = Tag::orderBy('created_at')->paginate(12);

		return $tags;
	}
}