<?php namespace FeelRank\Validators;

class UserValidator extends Validator {

	protected static $rules = [
		'email' => 'required|email|unique:users',
		'name' => 'required|unique:stores',
		'slug' => 'required|unique:stores',
		'password' => 'required|confirmed'
	];
	
	protected static $messages = [
		'subdomain.unique' => 'That store url is already taken.',
		'subdomain.required' => 'Your store name creates an invalid url. Change your store\'s name.'
	];
}