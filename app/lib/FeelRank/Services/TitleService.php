<?php namespace FeelRank\Services;

use \DOMDocument;

class TitleService {

	public function getTitle($url)
	{
	    $doc = new DOMDocument;
	    $html = @$doc->loadHTMLFile($url);
	    
	    $title = $doc->getElementsByTagName("title");
	    
	    if ($title->length > 0)
	    {
	    	return $title->item(0)->nodeValue;
	    }
	    
	    // Factor to have user input title on next page.
	    
	    dd("I'm sorry, I couldn't get the title");
	}
}