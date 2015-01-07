<?php namespace FeelRank\Validators;

class BetaValidator extends Validator {

	protected static $rules = [
		'email' => 'required|email|unique:betas',
	];
	
	protected static $messages = [
		'email.unique' => 'You\'re already signed up!'
	];
}