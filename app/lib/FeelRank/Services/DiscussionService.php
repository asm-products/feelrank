<?php namespace FeelRank\Services;

use \FeelRank\Repositories\DiscussionRepository;
use \FeelRank\Validators\DiscussionValidator;

class DiscussionService {
	
	public function __construct(DiscussionRepository $discussionRepository, DiscussionValidator $discussionValidator)
	{
		$this->DiscussionRepository = $discussionRepository;
		$this->DiscussionValidator = $discussionValidator;
	}

	public function create($input)
	{
		if ($this->DiscussionValidator->isValid($input))
		{
			$discussion = $this->DiscussionRepository->create($input);

			return $discussion;
		}

		throw new \FeelRank\Validators\ValidationException("Discussion Validation Failed", $this->DiscussionValidator->getErrors());
	}
}