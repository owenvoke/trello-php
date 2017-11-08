# trello-php

[![Latest Version on Packagist][ico-version]][link-packagist]
[![Software License][ico-license]](LICENSE.md)
[![Build Status][ico-travis]][link-travis]
[![Style CI][ico-styleci]][link-styleci]
[![Code Coverage][ico-code-quality]][link-code-quality]
[![Total Downloads][ico-downloads]][link-downloads]

A simple PHP wrapper for utilising the [Trello](https://developers.trello.com) api.

## Structure

```
src/
tests/
vendor/
```

## Install

Via Composer

``` bash
$ composer require pxgamer/trello-php
```

## Usage

```php
use pxgamer\Trello;

$trello = new Trello\Client('api_key', 'access_token');
```

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

## Change log

Please see [CHANGELOG](CHANGELOG.md) for more information on what has changed recently.

## Testing

Testing requires a [Trello API key](https://trello.com/app-key) in order to access my public boards.

``` bash
$ export TRELLO_API_KEY=
$ export TRELLO_ACCESS_TOKEN=
$ composer test
```

## Contributing

Please see [CONTRIBUTING](CONTRIBUTING.md) and [CODE_OF_CONDUCT](CODE_OF_CONDUCT.md) for details.

## Security

If you discover any security related issues, please email owzie123@gmail.com instead of using the issue tracker.

## Credits

- [pxgamer][link-author]
- [All Contributors][link-contributors]

## License

The MIT License (MIT). Please see [License File](LICENSE.md) for more information.

[ico-version]: https://img.shields.io/packagist/v/pxgamer/trello-php.svg?style=flat-square
[ico-license]: https://img.shields.io/badge/license-MIT-brightgreen.svg?style=flat-square
[ico-travis]: https://img.shields.io/travis/pxgamer/trello-php/master.svg?style=flat-square
[ico-styleci]: https://styleci.io/repos/80208704/shield
[ico-code-quality]: https://img.shields.io/codecov/c/github/pxgamer/trello-php.svg?style=flat-square
[ico-downloads]: https://img.shields.io/packagist/dt/pxgamer/trello-php.svg?style=flat-square

[link-packagist]: https://packagist.org/packages/pxgamer/trello-php
[link-travis]: https://travis-ci.org/pxgamer/trello-php
[link-styleci]: https://styleci.io/repos/80208704
[link-code-quality]: https://codecov.io/gh/pxgamer/trello-php
[link-downloads]: https://packagist.org/packages/pxgamer/trello-php
[link-author]: https://github.com/pxgamer
[link-contributors]: ../../contributors
