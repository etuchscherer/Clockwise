<?php

require __DIR__ . '/../bootstrap.php';

use Clockwise\Comparison;

/**
 * Description of ComparisonTest
 *
 * @author papersling
 */
class ComparisonTest extends PHPUnit_Framework_TestCase {
  
  public function setUp() {
    $this->yesterday = new Comparison('yesterday');
    $this->now = new Comparison();
  }
  
  public function testYesterdayHappenedBeforeToday() {
    $this->assertTrue($this->yesterday->happenedBefore($this->now));
  }
  
  public function testNowHappenedAfterYesterday() {
    $this->assertTrue($this->now->happenedAfter($this->yesterday));
  }
  
  public function testBetweenCanReturnTrue() {
    $today     = new Comparison('today');
    $yesterday = new Comparison('yesterday');
    $tomorrow  = new Comparison('tomorrow');
    $this->assertTrue($today->isBetween($tomorrow, $yesterday));
  }
  
  public function testCanRefuteBetween() {
    $today     = new Comparison('today');
    $yesterday = new Comparison('yesterday');
    $tomorrow  = new Comparison('tomorrow');
    $this->assertFalse($tomorrow->isBetween($today, $yesterday));
  }
}