<?php

class Rank extends Eloquent
{
    public function user()
    {
        return $this->belongsTo('user');
    }

    public function rankable()
    {
        return $this->morphTo();
    }

	public function scopePreviousRank($query, $user_id)
	{
		return $query->where('user_id', '=', $user_id);
	}
	
	public function scopeUpranks($query)
	{
		return $query->where('vote', '=', 1);
	}
	
	public function scopeDownranks($query)
	{
		return $query->where('vote', '=', -1);
	}
}