<?php namespace FeelRank\Services;

class SourceExtractionService {

	public function getSource($url)
	{
		$urlMap = array('com', 'co.uk', 'co', 'io', 'org', 'net', 'gov', 'edu');

		$host = "";

		$urlData = parse_url($url);
		$hostData = explode('.', $urlData['host']);
		$hostData = array_reverse($hostData);
		
		if(array_search($hostData[1] . '.' . $hostData[0], $urlMap) !== FALSE) {
		  $host = $hostData[2] . '.' . $hostData[1] . '.' . $hostData[0];
		} elseif(array_search($hostData[0], $urlMap) !== FALSE) {
		  $host = $hostData[1] . '.' . $hostData[0];
		}
		
		return $host;
	}
}

