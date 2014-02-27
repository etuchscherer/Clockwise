<?php

require __DIR__ . '/../bootstrap.php';

use Clockwise\Stopwatch;

/**
 * Description of StopwatchTest
 *
 * @author papersling
 */
class StopwatchTest extends PHPUnit_Framework_TestCase {
  
  public function testNewStopwatchDefaultsToMicroseconds() {
    $timer = new Stopwatch();
    $this->assertEquals(Stopwatch::MICRSECONDS, $timer->type);
  }
  
  public function testTimerHasNotStartedAtInstansiation() {
    $timer = new Stopwatch();
    $this->assertFalse($timer->hasStarted());
  }
  
  public function testTimerHasNotStoppedAtInstansiation() {
    $timer = new Stopwatch();
    $this->assertFalse($timer->hasStopped());
  }
  
  public function testStopwatchOptionForMilliseconds() {
    $timer = new Stopwatch(Stopwatch::MILLISECONDS);
    $this->assertEquals(Stopwatch::MILLISECONDS, $timer->type);
  }
  
  public function testCanTellStopwatchUseMilliseconds() {
    $timer = new Stopwatch(Stopwatch::MICRSECONDS);
    $timer->useMilliseconds();
    $this->assertEquals(Stopwatch::MILLISECONDS, $timer->type);
  }
  
  public function testCanTellStopwatchUseMicroseconds() {
    $timer = new Stopwatch(Stopwatch::MILLISECONDS);
    $timer->useMicroseconds();
    $this->assertEquals(Stopwatch::MICRSECONDS, $timer->type);
  }
  
  public function testCanStartTimer() {
    $timer = new Stopwatch();
    $timer->start();
    $this->assertTrue($timer->hasStarted());
  }
  
  public function testResetClearsStoppedTime() {
    $timer = new Stopwatch();
    $timer->start()->stop();
    $timer->reset();
    $this->assertFalse($timer->stoppedAt);
  }
  
  public function testResetResetsStartedTime() {
    $timer = new Stopwatch();
    $timer->start();
    $original = $timer->startedAt;
    $timer->reset();
    $this->assertNotEquals($original, $timer->startedAt);
  }
  
  public function testCanStopTimer() {
    $timer = new Stopwatch();
    $timer->start();
    $timer->stop();
    $this->assertTrue($timer->hasStopped());
  }
  
  public function testCanGetTimeElapsed() {
    $timer = new Stopwatch();
    $timer->start()->stop();
    $this->assertLessThan(0.1, $timer->getElapsed(), 'Elapsed time in start stop test:' . $timer->getElapsed());
  }
  
  public function testGetElapsedThrowsException() {
    $this->setExpectedException('Clockwise\Exception\StopwatchException');
    $timer = new Stopwatch();
    $timer->stop();
    $timer->getElapsed();
  }
  
  public function testTypeMustBeValid() {
    $this->setExpectedException('Clockwise\Exception\StopwatchException');
    $timer = new Stopwatch('invalid type');
  }
}
