<?php

use pxgamer\Trello;

class MainTest extends PHPUnit_Framework_TestCase
{
    public function testConnect()
    {
        $trello = new Trello\Client('', '');
    }
}
