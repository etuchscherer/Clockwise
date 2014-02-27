<?php

namespace Clockwise;

use Clockwise\Interfaces\Timer;
use Clockwise\Exception\StopwatchException;

/**
 * Timer that can be used to measure
 * events.
 *
 * @author papersling
 */
class Stopwatch extends Clockwise implements Timer {
  
  CONST MICRSECONDS  = 0;
  
  CONST MILLISECONDS = 1;
  
  /**
   * Timestamp the timer started.
   * @var Integer
   */
  public $startedAt;
  
  /**
   * Timestamp the timer stopped.
   * @var type 
   */
  public $stoppedAt;
  
  /**
   * The accuracy of time.
   * @var Integer
   */
  public $type;
  
  /**
   * Instansiates an instance of Timer. Args include,
   * the type of time to track: Milliseconds || Microseconds.
   * Defaults to Milliseconds.
   * 
   * @param Integer $type
   * @param Mixed $time
   */
  public function __construct($type = 0, $time = null) {
    
    $this->setType($type);
    $this->startedAt = false;
    $this->stoppedAt = false;
    
    parent::__construct($time);
  }
  
  /**
   * Returns the amount of time elapsed between
   * the start and stop.
   * @return Integer
   */
  public function getElapsed() {
    if ($this->hasStarted() && $this->hasStopped()) {
      return number_format($this->stoppedAt - $this->startedAt, 7);
    }
    throw new StopwatchException('Cannot get elapsed time, insufficient data');
  }
  
  /**
   * Returns true if the timer has been started.
   * @return Boolean
   */
  public function hasStarted() {
    return (bool) $this->startedAt;
  }
  
  /**
   * Returns true if the timer has been stopped.
   * @return Boolean
   */
  public function hasStopped() {
    return (bool) $this->stoppedAt;
  }
  
  /**
   * Marks the start time.
   * @return $this
   */
  public function start() {
    $this->startedAt = microtime(true);
    return $this;
  }
  
  /**
   * Marks the stop time
   * @return $this;
   */
  public function stop() {
    $this->stoppedAt = microtime(true);
    return $this;
  }
  
  /**
   * Resets the timer, effectively resetting the
   * start time, and clearing the stopped time.
   */
  public function reset() {
    $this->startedAt = microtime(true);
    $this->stoppedAt = false;
    return $this;
  }
  
  /**
   * Pauses the timer.
   * @todo Implement this feature!
   */
  public function pause() {
    // needs to be implemented!;
  }
  
  /**
   * Sets the timer to track microseconds.
   */
  public function useMicroseconds() {
    $this->type = self::MICRSECONDS;
  }
  
  /**
   * Sets the timer to track milliseconds.
   */
  public function useMilliseconds() {
    $this->type = self::MILLISECONDS;
  }
  
  /**
   * Sets the type of timer.
   * @param Integer $type
   * @return Mixed
   * @throws Exception
   */
  private function setType($type) {
    if ($type === self::MICRSECONDS) {
      return $this->useMicroseconds();
    }
    
    if ($type === self::MILLISECONDS) {
      return $this->useMilliseconds();
    }
    
    throw new StopwatchException('Invalid type of timer specified');
  }
}