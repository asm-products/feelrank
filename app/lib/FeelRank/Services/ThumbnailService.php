<?php namespace FeelRank\Services;

use FeelRank\Connectors\UrlboxConnector;

class ThumbnailService {
	
	public function __construct(UrlboxConnector $urlBoxConnector)
	{
		$this->UrlboxConnector = $urlBoxConnector;
	}

	public function getThumbnail($url, $id)
	{
		$dirname = dirname('img/' . $id . '/thumbnail.png');
			
		if (!is_dir($dirname))
		{
		    mkdir($dirname, 0755, true);
		}
		
		$ch = curl_init($this->UrlboxConnector->getImg($url));
		$fp = fopen('img/' . $id . '/thumbnail.png', 'wb');
		curl_setopt($ch, CURLOPT_FILE, $fp);
		curl_setopt($ch, CURLOPT_HEADER, 0);
		curl_exec($ch);
		curl_close($ch);
		fclose($fp);
		
		return true;
	}
}