<?php

namespace pxgamer\Trello;

class Client
{
    const BASE_URL = 'https://api.trello.com/';
    const API_VERSION = 1;

    public $access_token;
    private $api_url;
    private $api_key;

    public function __construct($api_key, $access_token)
    {
        if (!$this->api_key) {
            $this->api_key = $api_key;
        }
        if (!$this->access_token) {
            $this->access_token = $access_token;
        }
        if (!$this->api_url) {
            $this->api_url = self::BASE_URL . self::API_VERSION;
        }
    }

    public function getBoardsByUser($username)
    {
        return $this->get("/members/$username/boards");
    }

    public function getListsFromBoard($board_id)
    {
        return $this->get("/boards/$board_id/lists");
    }

    public function getCardsFromList($list_id)
    {
        return $this->get("/lists/$list_id/cards");
    }

    public function getCard($card_id)
    {
        return $this->get("/cards/$card_id");
    }

    public function addCard($content)
    {
        return $this->post('/cards', $content);
    }

    private function get($endpoint)
    {
        $cu = curl_init();
        curl_setopt_array(
            $cu,
            [
                CURLOPT_URL            => $this->api_url
                                          . $endpoint
                                          . ((strpos($endpoint, '?') > -1) ? '&' : '?')
                                          . 'key='
                                          . $this->api_key
                                          . '&token='
                                          . $this->access_token,
                CURLOPT_SSL_VERIFYHOST => 0,
                CURLOPT_SSL_VERIFYPEER => 0,
                CURLOPT_RETURNTRANSFER => true,
            ]
        );

        return $this->toArray(curl_exec($cu));
    }

    public function post($endpoint, $content)
    {
        $cu = curl_init();
        curl_setopt_array(
            $cu,
            [
                CURLOPT_URL            => $this->api_url
                                          . $endpoint
                                          . ((strpos($endpoint, '?') > -1) ? '&' : '?')
                                          . 'key='
                                          . $this->api_key
                                          . '&token='
                                          . $this->access_token,
                CURLOPT_SSL_VERIFYHOST => 0,
                CURLOPT_SSL_VERIFYPEER => 0,
                CURLOPT_RETURNTRANSFER => true,
                CURLOPT_POST           => true,
                CURLOPT_POSTFIELDS     => $content,
            ]
        );

        return $this->toArray(curl_exec($cu));
    }

    private function toArray($string)
    {
        if (is_string($string)) {
            return json_decode($string, true);
        } else {
            return [];
        }
    }
}
