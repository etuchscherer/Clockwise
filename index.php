<?php

require 'config/bootstrap.php';

$bar = new Clockwise\Clockwise();
$foo = new Clockwise\Comparison();
$baz = new \Clockwise\Stopwatch();

$baz->start();
sleep(1);
$baz->stop();

echo $baz->getElapsed();
