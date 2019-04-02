<?php

declare(strict_types=1);

namespace pxgamer\Trello;

use PHPUnit\Framework\TestCase;

class MainTest extends TestCase
{
    /** @test */
    public function canGetBoardsByUser(): void
    {
        $trello = new Client(
            getenv('TRELLO_API_KEY'),
            getenv('TRELLO_ACCESS_TOKEN')
        );

        $boards = $trello->getBoardsByUser('owenvoke');

        $this->assertGreaterThan(0, count($boards));
    }

    /** @test */
    public function canGetListsFromBoard(): void
    {
        $trello = new Client(
            getenv('TRELLO_API_KEY'),
            getenv('TRELLO_ACCESS_TOKEN')
        );

        $lists = $trello->getListsFromBoard('560e52c0d17f79e1e931d8db');

        $this->assertGreaterThan(0, count($lists));
    }

    /** @test */
    public function canGetCardsFromList(): void
    {
        $trello = new Client(
            getenv('TRELLO_API_KEY'),
            getenv('TRELLO_ACCESS_TOKEN')
        );

        $cards = $trello->getCardsFromList('560e52c0d17f79e1e931d8db');

        $this->assertGreaterThan(0, count($cards));
    }

    /** @test */
    public function canGetCard(): void
    {
        $trello = new Client(
            getenv('TRELLO_API_KEY'),
            getenv('TRELLO_ACCESS_TOKEN')
        );

        $card = $trello->getCard('560e52c1d17f79e1e931d8f6');

        $this->assertArrayHasKey('id', $card);
        $this->assertSame('560e52c1d17f79e1e931d8f6', $card['id']);
        $this->assertEmpty($card['desc']);
    }

    /** @test */
    public function canAddCard(): void
    {
        $trello = new Client(
            getenv('TRELLO_API_KEY'),
            getenv('TRELLO_ACCESS_TOKEN')
        );

        $date = date('Y-m-d');
        $card = $trello->addCard([
            'name' => 'Test Title - '.$date,
            'desc' => 'Test Description...',
            'idList' => '5a038d1968274350f8b4ba6e',
            'pos' => 'top',
            'due' => $date,
        ]);

        $this->assertIsArray($card);
        $this->assertArrayHasKey('id', $card);
        $this->assertArrayHasKey('name', $card);
        $this->assertEquals('Test Title - '.$date, $card['name']);
    }
}
