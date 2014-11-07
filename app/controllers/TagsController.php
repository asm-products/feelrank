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
		$tags = Auth::user()->tags;

		if (count($tags) > 0)
		{
			$firstId = $tags->first()->id;
		}

		$posts = Tag::find(1)->posts;

		return 	View::make('tags.mytags', compact('tags', 'posts'));
	}

	public function search()
	{
		return View::make('tags.search');
	}

	public function doSearch()
	{
		$tags = $this->TagRepository->search(Input::get('search'));

		return View::make('tags.results', compact('tags'));
	}

	public function save($id)
	{
		$tag = $this->TagRepository->save($id);

		return '<span id="save-tag-' . $tag->id . '"><a href="#" ic-src="/tags/' . $tag->id . '/remove" ic-trigger-on="click" ic-target="#save-tag-' . $tag->id . '">Remove</a></span>';
	}

	public function remove($id)
	{
		$tag = $this->TagRepository->remove($id);

		return '<span id="save-tag-' . $tag->id . '"><a href="#" ic-src="/tags/' . $tag->id . '/save" ic-trigger-on="click" ic-target="#save-tag-' . $tag->id . '">Save</a></span>';
	}

	public function getTaggedPosts($id)
	{
		$posts = $this->PostRepository->getTagged($id);

		return View::make('tags.partials.posts', compact('posts'));
	}
}	