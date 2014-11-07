<?php

class Flag extends Eloquent
{
    public function flaggable()
    {
        return $this->morphTo();
    }
}