<?php

class Source extends Eloquent
{
    protected $table = 'sources';

    public function posts()
    {
        return $this->hasMany('Post');
    }
    
    public function users()
    {
        return $this->belongsToMany('User');
    }
}