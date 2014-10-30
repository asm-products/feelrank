<?php

class Discussion extends Eloquent
{
    protected $table = 'discussions';

	public function user()
	{
		return $this->belongsTo('User');
	}

	public function post()
	{
		return $this->belongsTo('Post');
	}

	public function ranks()
	{
		return $this->morphMany('Rank', 'rankable');
	}

	public function comments()
	{
		return $this->hasMany('Comment');
	}
}
