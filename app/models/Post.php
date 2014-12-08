<?php

class Post extends Eloquent
{
    protected $table = 'posts';

    public $incrementing = false;

	public function user()
	{
		return $this->belongsTo('User');
	}

	public function discussions()
	{
		return $this->hasMany('Discussion');
	}
	
	public function cardDiscussions()
	{
		return $this->discussions()->take(2);
	}

	public function ranks()
	{
		return $this->morphMany('Rank', 'rankable');
	}

	public function tags()
	{
		return $this->morphToMany('Tag', 'taggable');
	}
	
	public function cardTags()
	{
		return $this->tags()->take(5);
	}

	public function followers()
	{
		return $this->belongsToMany('User');
	}
}