<?php namespace FeelRank\Services;

use \FeelRank\Repositories\PostRepository;
use \FeelRank\Validators\PostValidator;
use \FeelRank\Connectors\EmbedlyConnector;

class PostService {
	
	public function __construct(PostRepository $postRepository, PostValidator $postValidator, EmbedlyConnector $embedlyConnector)
	{
		$this->PostRepository = $postRepository;
		$this->PostValidator = $postValidator;
		$this->EmbedlyConnector = $embedlyConnector;
	}

	public function fetch($input)
	{
		if ($this->FetchValidator->isValid($input))
		{
			$url_info = $this->EmbedlyConnector->embed($input['url']);

			return $url_info;
		}

		throw new \FeelRank\Validators\ValidationException("URL Validation Failed", $this->FetchValidator->getErrors());
	}

	public function create($input)
	{
		if ($this->PostValidator->isValid($input))
		{
			$post = $this->PostRepository->create($input);

			return $post;
		}

		throw new \FeelRank\Validators\ValidationException("Post Validation Failed", $this->PostValidator->getErrors());
	}
}