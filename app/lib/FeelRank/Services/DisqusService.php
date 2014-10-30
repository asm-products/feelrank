<?php namespace FeelRank\Services;

class DisqusService {

	private $key_secret = 'PZlB19b5k3WJh36icAjNk9swMzirUUXbz0KOItUaZ8azl8yHWU8DQzQ2q2zr194F';

	private $key_public = 'iqdoEOMUIswrNUIZm02RPWQsPXVwwY68CKkw9brutP8nlNWR8w5kiRFvJbYaS3r0';

	public function dsqHmacsha1($data) {
		$key = $this->key_secret;

	    $blocksize=64;
	    $hashfunc='sha1';
	    if (strlen($key)>$blocksize)
	        $key=pack('H*', $hashfunc($key));
	    $key=str_pad($key,$blocksize,chr(0x00));
	    $ipad=str_repeat(chr(0x36),$blocksize);
	    $opad=str_repeat(chr(0x5c),$blocksize);
	    $hmac = pack(
	                'H*',$hashfunc(
	                    ($key^$opad).pack(
	                        'H*',$hashfunc(
	                            ($key^$ipad).$data
	                        )
	                    )
	                )
	            );
	    return bin2hex($hmac);
	}

	public function getPublicKey()
	{
		return $this->key_public;
	}
}