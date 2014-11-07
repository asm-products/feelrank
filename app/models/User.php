<?php

use Zizaco\Confide\ConfideUser;
use Zizaco\Confide\ConfideUserInterface;

class User extends Eloquent implements ConfideUserInterface
{
    use ConfideUser;

    public function posts()
    {
		return $this->hasMany('Post');
    }

    public function comments()
    {
    	return $this->hasMany('Comment');
    }

    public function discussions()
    {
    	return $this->hasMany('Discussion');
    }

    public function ranks()
    {
    	return $this->hasMany('Rank');
    }

    public function tags()
    {
        return $this->belongsToMany('Tag');
    }
}