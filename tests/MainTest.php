<?php

namespace pxgamer\Trello;

use PHPUnit\Framework\TestCase;

class MainTest extends TestCase
{
    public function testCanGetBoardsByUser()
    {
        $trello = new Client(
            getenv('TRELLO_API_KEY'),
            getenv('TRELLO_ACCESS_TOKEN')
        );

        $boards = $trello->getBoardsByUser('owenvoke');

        $this->assertTrue(count($boards) === 2);
    }

    public function testCanGetListsFromBoard()
    {
        $trello = new Client(
            getenv('TRELLO_API_KEY'),
            getenv('TRELLO_ACCESS_TOKEN')
        );

        $lists = $trello->getListsFromBoard('5a03881875400b8f73bd83f0');

        $this->assertTrue(count($lists) === 1);
    }

    public function testCanGetCardsFromList()
    {
        $trello = new Client(
            getenv('TRELLO_API_KEY'),
            getenv('TRELLO_ACCESS_TOKEN')
        );

        $cards = $trello->getCardsFromList('5a038add68bc5bb0c45c5eb0');

        $this->assertTrue(count($cards) === 1);
    }

    public function testCanGetCard()
    {
        $trello = new Client(
            getenv('TRELLO_API_KEY'),
            getenv('TRELLO_ACCESS_TOKEN')
        );

        $card = $trello->getCard('5a038ae9d73035b7e59f283c');

        $this->assertArrayHasKey('id', $card);
        $this->assertTrue($card['id'] === '5a038ae9d73035b7e59f283c');
        $this->assertTrue($card['desc'] === '');
    }

    public function testCanAddCard()
    {
        $trello = new Client(
            getenv('TRELLO_API_KEY'),
            getenv('TRELLO_ACCESS_TOKEN')
        );

        $date = date('Y-m-d');
        $card = $trello->addCard([
            'name'   => 'Test Title - ' . $date,
            'desc'   => 'Test Description...',
            'idList' => '5a038d1968274350f8b4ba6e',
            'pos'    => 'top',
            'due'    => $date,
        ]);

        $this->assertInternalType('array', $card);
        $this->assertArrayHasKey('id', $card);
        $this->assertArrayHasKey('name', $card);
        $this->assertTrue($card['name'] === 'Test Title - ' . $date);
    }
}
