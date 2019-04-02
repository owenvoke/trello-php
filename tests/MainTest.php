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

        $this->assertCount(2, $boards);
    }

    /** @test */
    public function canGetListsFromBoard(): void
    {
        $trello = new Client(
            getenv('TRELLO_API_KEY'),
            getenv('TRELLO_ACCESS_TOKEN')
        );

        $lists = $trello->getListsFromBoard('5a03881875400b8f73bd83f0');

        $this->assertCount(1, $lists);
    }

    /** @test */
    public function canGetCardsFromList(): void
    {
        $trello = new Client(
            getenv('TRELLO_API_KEY'),
            getenv('TRELLO_ACCESS_TOKEN')
        );

        $cards = $trello->getCardsFromList('5a038add68bc5bb0c45c5eb0');

        $this->assertCount(1, $cards);
    }

    /** @test */
    public function canGetCard(): void
    {
        $trello = new Client(
            getenv('TRELLO_API_KEY'),
            getenv('TRELLO_ACCESS_TOKEN')
        );

        $card = $trello->getCard('5a038ae9d73035b7e59f283c');

        $this->assertArrayHasKey('id', $card);
        $this->assertSame('5a038ae9d73035b7e59f283c', $card['id']);
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
