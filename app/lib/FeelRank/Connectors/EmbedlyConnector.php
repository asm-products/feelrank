<?php namespace FeelRank\Connectors;

class EmbedlyConnector {
	
	public function embed($url)
	{
		$client = new \Guzzle\Service\Client('http://api.embed.ly/1');

		$response = $client->get('oembed', [], [
			'query' => [
				'key' => $this->getKey(),
				'url' => $url
			]
		])->send();

		$embed = $response->json();

		return $embed;
	}

	public function getKey()
	{
		return $this->key;
	}

	private $key = '21e049005b2f4491b02a53d3df9831e7';
}