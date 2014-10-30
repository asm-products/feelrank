<?php namespace FeelRank\Services;

class Url64Service {

	public function canonize($url)
	{
	    $url = parse_url(strtolower($url));
	 
	    $canonic = $url['host'] . $url['path'];
	 
	    if (isset($url['query']))
	    {
	        parse_str($url['query'], $queryString);
	        $canonic .= '?' . $this->canonizeQueryString($queryString);
	    }
	 
	    return $canonic;
	}
	 
	public function canonizeQueryString(array $params)
	{
	    if (!is_array($params) || 0 === count($params))
	        return '';
	 
	    // Urlencode both keys and values.
	    $keys = $this->urlencode_rfc3986(array_keys($params));
	    $values = $this->urlencode_rfc3986(array_values($params));
	    $params = array_combine($keys, $values);
	 
	    // Parameters are sorted by name, using lexicographical byte value ordering.
	    // Ref: Spec: 9.1.1 (1)
	    uksort($params, 'strcmp');
	 
	    $pairs = array();
	    foreach ($params as $parameter => $value)
	    {
	        $lower_param = strtolower($parameter);
	 
	        if (is_array($value))
	        {
	            // If two or more parameters share the same name, they are sorted by their value
	            // Ref: Spec: 9.1.1 (1)
	            natsort($value);
	            foreach ($value as $duplicate_value)
	                $pairs[] = $lower_param . '=' . $duplicate_value;
	        }
	        else
	        {
	            $pairs[] = $lower_param . '=' . $value;
	        }
	    }
	 
	    if (0 === count($pairs))
	        return '';
	 
	    return implode('&', $pairs);
	}
	 
	public function urlencode_rfc3986($input)
	{
	    if (is_array($input))
	        return array_map(array(&$this, 'urlencode_rfc3986'), $input);
	    else if (is_scalar($input))
	        return str_replace('+', ' ', str_replace('%7E', '~', rawurlencode($input)));
	 
	    return '';
	}

	public function get64BitHash($str)
	{
	    return gmp_intval(gmp_init(substr(md5($str), 0, 16), 16));
	}

	public function urlTo64BitHash($url)
	{
	    return $this->get64BitHash($this->canonize($url));
	}

}

