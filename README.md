# trello-php

A simple PHP wrapper for utilising the [Trello](https://developers.trello.com) api.

## Usage

__Include the class:__
- Using Composer  
`composer require pxgamer/trello-php`  
```php
<?php
require 'vendor/autoload.php';
$trello = new \pxgamer\trello('access_token');
```
- Including the file manually  
```php
<?php
include 'src/Client.php';
$trello = new \pxgamer\trello('access_token');
```