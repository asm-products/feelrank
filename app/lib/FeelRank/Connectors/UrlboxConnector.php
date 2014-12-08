<?php namespace FeelRank\Connectors;

class UrlboxConnector {
	
	public function getImg($url)
	{
		$URLBOX_APIKEY = $this->getKey();
	    $URLBOX_SECRET = $this->getSecret();
	 
	    $options['url'] = urlencode($url);
	    $options['width'] = 1024;
	    $options['height'] = 768;
	    // $options += $args;
	 
	    foreach ($options as $key => $value)
	    {
	        $_parts[] = "$key=$value";
	    }
	 
	    $query_string = implode("&", $_parts);
	    $TOKEN = hash_hmac("sha1", $query_string, $URLBOX_SECRET);
	 
	    return "https://api.urlbox.io/v1/$URLBOX_APIKEY/$TOKEN/png?$query_string";
	}
	
	public function getKey()
	{
		return $this->key;
	}
	
	public function getSecret()
	{
		return $this->secret;
	}
	
	private $key = '4e9be61e-8603-48a2-90d7-d2ee7afe5af6';
	
	private $secret = '2de8e684-29d9-4262-97e3-08dad369be59';
}