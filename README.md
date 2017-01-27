# trello-php

A simple PHP wrapper for utilising the [Trello](https://developers.trello.com) api.

## Usage

__Include the class:__

#### Using Composer  
`composer require pxgamer/trello-php`  
```php
<?php
require 'vendor/autoload.php';
$trello = new \pxgamer\trello('api_key', 'access_token');
```

#### Including the file manually  
```php
<?php
include 'src/Client.php';
$trello = new \pxgamer\trello('api_key', 'access_token');
```

## Functions

_All functions return associative arrays._

```php
<?php
// Returns a PHP array of boards that a user is a member of
getBoardsByUser($username);
```
```php
<?php
// Returns an array of lists that are available on a board
getListsFromBoard($board_id);
```
```php
<?php
// Returns an array of cards that are in a list
getCardsFromList($list_id);
```
```php
<?php
// Returns an array of data about a specific card
getCard($card_id);
```
```php
<?php
// Adds a card (requires a list ID to be specified)
// Example Content:
$content = [
	'name' => 'Card Title',
	'desc' => 'Card Description... La la la.',
	'idList' => 'List Id',
	'pos' => 'bottom',
    'due' => '2017-01-27'
];

addCard($content);
```