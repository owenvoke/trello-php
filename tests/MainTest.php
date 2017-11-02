<?php

use PHPUnit\Framework\TestCase;
use pxgamer\Trello;

class MainTest extends TestCase
{
    public function testConnect()
    {
        $trello = new Trello\Client('', '');
    }
}
