<?php namespace FeelRank\Services;

use \FeelRank\Repositories\BetaRepository;
use \FeelRank\Validators\BetaValidator;

class BetaService {
	
	public function __construct(BetaRepository $betaRepository, BetaValidator $betaValidator)
	{
		$this->BetaRepository = $betaRepository;
		$this->BetaValidator = $betaValidator;
	}

	public function create($input)
	{
		if ($this->BetaValidator->isValid($input))
		{
			$beta = $this->BetaRepository->create($input);

			return $beta;
		}

		throw new \FeelRank\Validators\ValidationException("Email Validation Failed", $this->BetaValidator->getErrors());
	}
}