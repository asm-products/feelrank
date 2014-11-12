<?php

class Tag extends Eloquent
{
    protected $table = 'tags';

    public function posts()
    {
        return $this->morphedByMany('Post', 'taggable');
    }

    public function flags()
    {
    	return $this->morphMany('Flag', 'flaggable');
    }

    public function followers()
    {
    	return $this->belongsToMany('User');
    }
}