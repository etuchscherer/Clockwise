<?php

namespace Clockwise;

/**
 * Description of Comparison
 *
 * @author papersling
 */
class Comparison extends Clockwise {
  
  /**
   * Returns true if the instansiation happened before
   * the specified time.
   * @param Clockwise $time
   * @return Boolean
   */
  public function happenedBefore(Clockwise $time) {
    return $this->time < $time->time;
  }
  
  /**
   * Returns true if the instansiation happened after
   * the specified time.
   * @param Clockwise $time
   * @return Boolean
   */
  public function happenedAfter(Clockwise $time) {
    return $this->time > $time->time;
  }
  
  /**
   * Returns true if between two timestamps.
   * @param Clockwise $time1
   * @param Clockwise $time2
   * @return Boolean
   */
  public function isBetween(Clockwise $time1, Clockwise $time2) {
    if ($time1 > $time2) {
      $temp = $time2;
      $time2 = $time1;
      $time1 = $temp;
    }
    
    return $this->happenedAfter($time1) && $this->happenedBefore($time2);
  }
}