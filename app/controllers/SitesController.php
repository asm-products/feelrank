<?php

use FeelRank\Services\Url64Service;
use FeelRank\Connectors\UrlboxConnector;
use FeelRank\Services\DiscussionService;
use FeelRank\Repositories\TagRepository;

class SitesController extends BaseController {

	public function __construct(Url64Service $url64Service, UrlboxConnector $urlBoxConnector, DiscussionService $discussionService, TagRepository $tagRepository)
	{
		$this->Url64Service = $url64Service;
		$this->UrlboxConnector = $urlBoxConnector;
		$this->DiscussionService = $discussionService;
		$this->TagRepository = $tagRepository;
	}

	public function create()
	{
		return View::make('sites.create');
	}

	public function store()
	{
		$input = Input::all();
		
		$url_parts = parse_url($input['url']);
		$host = $url_parts['host'];
		
		$site = new Post();
		
		$site->id = $this->Url64Service->urlTo64BitHash($input['url']);
		$site->url = urlencode($input['url']);
		$site->title = $this->getTitle($input['url']);
		$site->description = '';
		$site->source = $host;
		
		//$img = '/public/img/' . $site->id . 'thumbnail.png';
		//file_put_contents($img, file_get_contents($this->UrlboxConnector->getImg($input['url'])));
		
		// Extract this code to a handler injected into repo
			
		$dirname = dirname('img/' . $site->id . '/thumbnail.png');
			
		if (!is_dir($dirname))
		{
		    mkdir($dirname, 0755, true);
		}
		
		$ch = curl_init($this->UrlboxConnector->getImg($input['url']));
		$fp = fopen('img/' . $site->id . '/thumbnail.png', 'wb');
		curl_setopt($ch, CURLOPT_FILE, $fp);
		curl_setopt($ch, CURLOPT_HEADER, 0);
		curl_exec($ch);
		curl_close($ch);
		fclose($fp);
		
		$site->thumbnail = '';
		
		Auth::user()->posts()->save($site);
		
		return View::make('sites.partials.create2', compact('site'));
	}
	
	public function getTitle($url)
	{
		// Doesn't work for some reason though it worked before.
		
	    $str = file_get_contents($url);
	    
	    if(strlen($str)>0)
	    {
	    	preg_match("/\<title\>(.*)\<\/title\>/",$str,$title);
			return $title[1];
	    }
	    
	    // Update to throw exception instead.
	    return 'No title found.';
	}
	
	public function store2()
	{
		$input = Input::all();
		$post = Post::find($input['post_id']);
		
		if (Input::has('title'))
		{
			$this->DiscussionService->create($input);
		}
		
		if (Input::has('tags'))
		{
			$this->TagRepository->create($input['tags'], $post);
		}
		
		return Redirect::to('/posts/' . $post->id);
	}
	
	public function show()
	{
		$posts = Post::all();
		
		return View::make('sites.list', compact('posts'));
	}
}