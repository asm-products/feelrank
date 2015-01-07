<?php namespace FeelRank\Services;

use \DOMDocument;

class TitleService {

	public function getTitle($url)
	{
	    $html = file_get_contents($url);
	
		//parsing begins here:
		$doc = new DOMDocument();
		@$doc->loadHTML($html);
		$nodes = $doc->getElementsByTagName('title');
		
		//get and display what you need:
		$title = $nodes->item(0)->nodeValue;
		
		return $title;
	}
}