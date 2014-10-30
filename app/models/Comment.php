<?php

class Comment extends Eloquent
{
    protected $table = 'comments';
    protected $with = ['children'];

	public function user()
	{
		return $this->belongsTo('User');
	}

	public function discussion()
	{
		return $this->belongsTo('Discussion');
	}

	public function ranks()
	{
		return $this->morphMany('Rank', 'rankable');
	}

	public function children()
	{
		return $this->hasMany('Comment', 'parent_id');
	}

	public function parent()
	{
		return $this->belongsTo('Comment', 'parent_id');
	}
}
