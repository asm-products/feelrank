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

	public function ranks()
	{
		return $this->morphMany('Rank', 'rankable');
	}

	public function tags()
	{
		return $this->morphToMany('Tag', 'taggable');
	}
}