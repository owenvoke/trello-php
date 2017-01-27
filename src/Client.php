<?php

namespace pxgamer\Trello;

class Client
{
	const BASE_URL = 'https://api.trello.com/';
	const API_VERSION = 1;

    public $access_token;
	private $api_url;

    public function __construct($access_token)
    {
        if (!$this->access_token) {
			$this->access_token = $access_token;
		}
        if (!$this->api_url) {
			$this->api_url = self::BASE_URL . self::API_VERSION;
		}
    }
}
