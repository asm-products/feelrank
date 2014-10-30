<?php namespace FeelRank\Validators;

class LoginValidator extends Validator {

	protected static $rules = [
		'username' => 'required|exists:users',
		'password' => 'required'
	];
}