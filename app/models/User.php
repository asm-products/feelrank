<?php

use Zizaco\Confide\ConfideUser;
use Zizaco\Confide\ConfideUserInterface;
use Zizaco\Entrust\HasRole;

class User extends Eloquent implements ConfideUserInterface
{
    use ConfideUser;
    use HasRole;

    // Created by User

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

    // Followed by User

    public function followedTags()
    {
        return $this->belongsToMany('Tag');
    }

    public function followedPosts()
    {
        return $this->belongsToMany('Post');
    }

    public function followedDiscussions()
    {
        return $this->belongsToMany('Discussion');
    }
    
    // Owned by User
    
    public function ownedPosts()
    {
        return $this->belongsToMany('Post', 'ownedpost_user', 'post_id', 'user_id');
    }
    
    public function ownedSources()
    {
        return $this->belongsToMany('Source');
    }
}