<?php namespace FeelRank\Validators;

use Validator as V;
use Auth;

abstract class Validator {

	/* This is an abstract class because we never want the user to call this directly.
	 * Calling it directly would result in an error because the validator wouldh have no rules.
	 */

	protected $errors;

	protected static $messages = [];
	
	public function isValid($attributes) {
		
		$rules = static::$rules;

		$messages = static::$messages;
		
		$v = V::make($attributes, $rules, $messages);

		if ($v->fails())
		{
			$this->errors = $v->messages();
			return false;
		}

		return true;
	}

	public function getErrors() {
		
		return $this->errors;
	}
}