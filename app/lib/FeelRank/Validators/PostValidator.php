<?php namespace FeelRank\Validators;

class PostValidator extends Validator {

	protected static $rules = [
		'url' => 'required|url'
	];
}