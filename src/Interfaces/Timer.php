<?php

namespace Clockwise\Interfaces;

/**
 *
 * @author papersling
 */
interface Timer {
  
  public function start();
  
  public function stop();
  
  public function reset();
  
  public function pause();
}
