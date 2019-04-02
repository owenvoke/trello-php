<?php

declare(strict_types=1);

namespace pxgamer\Trello;

use function curl_exec;
use function curl_init;
use function curl_setopt_array;
use function is_string;
use function json_decode;
use function strpos;

class Client
{
    public const BASE_URL = 'https://api.trello.com/';
    public const API_VERSION = 1;

    /** @var string */
    public $accessToken;
    /** @var string */
    private $apiUrl;
    /** @var string */
    private $apiKey;

    public function __construct(string $apiKey, string $accessToken)
    {
        $this->apiUrl = self::BASE_URL.self::API_VERSION;
        $this->apiKey = $apiKey;
        $this->accessToken = $accessToken;
    }

    public function getBoardsByUser(string $username): array
    {
        return $this->get("/members/$username/boards");
    }

    public function getListsFromBoard(string $boardId): array
    {
        return $this->get("/boards/$boardId/lists");
    }

    public function getCardsFromList(string $listId): array
    {
        return $this->get("/lists/$listId/cards");
    }

    public function getCard(string $cardId): array
    {
        return $this->get("/cards/$cardId");
    }

    public function addCard(array $content): array
    {
        return $this->post('/cards', $content);
    }

    private function get(string $endpoint): array
    {
        $cu = curl_init();
        curl_setopt_array(
            $cu,
            [
                CURLOPT_URL => $this->apiUrl
                    .$endpoint
                    .((strpos($endpoint, '?') > -1) ? '&' : '?')
                    .'key='
                    .$this->apiKey
                    .'&token='
                    .$this->accessToken,
                CURLOPT_RETURNTRANSFER => true,
            ]
        );

        return $this->toArray(curl_exec($cu));
    }

    public function post(string $endpoint, array $content): array
    {
        $cu = curl_init();
        curl_setopt_array(
            $cu,
            [
                CURLOPT_URL => $this->apiUrl
                    .$endpoint
                    .((strpos($endpoint, '?') > -1) ? '&' : '?')
                    .'key='
                    .$this->apiKey
                    .'&token='
                    .$this->accessToken,
                CURLOPT_RETURNTRANSFER => true,
                CURLOPT_POST => true,
                CURLOPT_POSTFIELDS => $content,
            ]
        );

        return $this->toArray(curl_exec($cu));
    }

    private function toArray(string $string): array
    {
        return is_string($string) ? json_decode($string, true) : [];
    }
}
