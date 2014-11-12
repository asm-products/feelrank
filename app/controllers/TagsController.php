<?php

use FeelRank\Repositories\TagRepository;
use FeelRank\Repositories\PostRepository;

class TagsController extends BaseController {

	public function __construct(TagRepository $tagRepository, PostRepository $postRepository)
	{
		$this->TagRepository = $tagRepository;
		$this->PostRepository = $postRepository;
	}

	public function taggedPost($id)
	{
		$posts = $this->PostRepository->getTagged($id);

		$qTag = Tag::find($id);

		return 	View::make('tags.showlist', compact('posts', 'qTag'));
	}

	public function taggedPosts()
	{
		$tags = Auth::user()->followedTags;

		$posts = '';

		if (count($tags) > 0)
		{
			$posts = $tags->first()->posts;
		}

		return 	View::make('tags.mytags', compact('tags', 'posts'));
	}

	public function search()
	{
		$tags = $this->TagRepository->recentTags();

		return View::make('tags.search', compact('tags'));
	}

	public function doSearch()
	{
		$query = Input::get('search');

		$tags = $this->TagRepository->search($query);

		return View::make('tags.results', compact('tags', 'query'));
	}

	public function follow($id)
	{
		$tag = $this->TagRepository->follow($id);

		return '<span id="follow-tag-' . $tag->id . '"><a href="#" class="btn btn-success" ic-src="/tags/' . $tag->id . '/unfollow" ic-trigger-on="click" ic-target="#follow-tag-' . $tag->id . '"><i class="fa fa-check"></i>&nbsp;&nbsp;Following</a></span>';
	}

	public function unfollow($id)
	{
		$tag = $this->TagRepository->unfollow($id);

		return '<span id="follow-tag-' . $tag->id . '"><a href="#" class="btn btn-default" ic-src="/tags/' . $tag->id . '/follow" ic-trigger-on="click" ic-target="#follow-tag-' . $tag->id . '"><i class="fa fa-binoculars"></i>&nbsp;&nbsp;Follow</a></span>';
	}

	public function getTaggedPosts($id)
	{
		$posts = $this->PostRepository->getTagged($id);

		return View::make('tags.partials.posts', compact('posts'));
	}
}