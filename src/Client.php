<?php
namespace LongchengjqSdk;

use Exception;
use LongchengjqSdk\Exception\ValidationException;
use LongchengjqSdk\Http\ApiIdent;

class Client
{
    private $apiKey;

    private $apiSecret;

    /**
     * 
     */
    public function __construct($key, $secret)
    {
        if (empty($key) || empty($secret)) {
            throw new ValidationException('key and secret not is empty');
        }

        $this->apiKey = $key;
        $this->apiSecret = $secret;
        $apiIdent = new ApiIdent();
        $apiIdent->checkUser($this->apiKey, $this->apiSecret);
    }




    
}