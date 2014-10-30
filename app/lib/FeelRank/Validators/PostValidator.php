<?php namespace FeelRank\Validators;

class PostValidator extends Validator {

	protected static $rules = [
		'title' => 'required|unique:posts',
	];
}