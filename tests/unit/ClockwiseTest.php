<?php

require __DIR__ . '/../bootstrap.php';

use Clockwise\Clockwise;

/**
 * Description of ClockwiseTest
 *
 * @author papersling
 */
class ClockwiseTest extends PHPUnit_Framework_TestCase {
  
  public function testCanInstansiateFromString() {
    $clock = new Clockwise('yesterday');
    $this->assertEquals(strtotime('yesterday'), $clock->time);
  }
  
  public function testCanInstansiateFromTimestamp() {
    $clock = new Clockwise(time());
    $this->assertEquals(time(), $clock->time);
  }
  
  public function testCanInstansiateFromDefault() {
    $clock = new Clockwise();
    $this->assertEquals(time(), $clock->time);
  }
  
  public function testNowReturnsValidTime() {
    $clock = new Clockwise();
    $this->assertEquals(time(), $clock->now());
  }
}