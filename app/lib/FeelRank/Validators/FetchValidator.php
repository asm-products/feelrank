<?php namespace FeelRank\Validators;

class FetchValidator extends Validator {

	protected static $rules = [
		'url' => 'required|url',
	];
}