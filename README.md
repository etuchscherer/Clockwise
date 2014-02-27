# Clockwise

A PHP library for timestamps. Comparisions, timers, ect. 


## Basic functionality

    $now = new Comparison();  // defaults to now
    $then = new Comparison('yesterday noon');  // can use anything that works for strtotime
    
    $now->happenedBefore($then); //returns true

    $yesterday = new Comparison('yesterday');
    $today = new Comparison();
    $tomorrow = new Comparison('tomorrow');
    
    $today->isBetween($yesterday, $tomorrow); // returns true
    
## Timer functionality
For tracking events, and page load, ect.

    $clock = new Stopwatch();
    $clock->start();
    $clock->stop();
    
    $clock->getElapsed(); == // the difference
