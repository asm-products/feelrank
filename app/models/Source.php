<?php

class Source extends Eloquent
{
    protected $table = 'sources';

    public function posts()
    {
        return $this->belongsToMany('Post');
    }
    
    public function users()
    {
        return $this->belongsToMany('User');
    }
}