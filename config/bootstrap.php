<?php

if (($loader = require_once __DIR__ . '/../vendor/autoload.php') == null)  {
  die('Vendor directory not found, Please run composer install.');
}

use \Clockwise;

var_dump($loader);