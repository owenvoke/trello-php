# trello-php

A simple PHP wrapper for utilising the [Trello](https://developers.trello.com) api.

## Usage

#### Using Composer

`composer require pxgamer/trello-php`

```php
require 'vendor/autoload.php';
use pxgamer\Trello;

$trello = new Trello\Client('api_key', 'access_token');
```

#### Including the class manually

```php
include 'src/Client.php';
use pxgamer\Trello;

$trello = new Trello\Client('api_key', 'access_token');
```

## Methods

_All functions return associative arrays._

```php
// Returns a PHP array of boards that a user is a member of
$trello->getBoardsByUser($username);
```
```php
// Returns an array of lists that are available on a board
$trello->getListsFromBoard($board_id);
```
```php
// Returns an array of cards that are in a list
$trello->getCardsFromList($list_id);
```
```php
// Returns an array of data about a specific card
$trello->getCard($card_id);
```
```php
// Adds a card (requires a list ID to be specified)
// Example Content:
$content = [
	'name'   => 'Card Title',
	'desc'   => 'Card Description... La la la.',
	'idList' => 'List Id',
	'pos'    => 'bottom',
    'due'    => '2017-01-27',
];

$trello->addCard($content);
```
