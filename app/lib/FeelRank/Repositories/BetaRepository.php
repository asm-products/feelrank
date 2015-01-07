<?php namespace FeelRank\Repositories;

use Beta;

class BetaRepository {
	
	public function create($input)
	{
		$beta = new Beta();
		
		$beta->email = $input['email'];
		
		$beta->save();
		
		return $beta;
	}

}