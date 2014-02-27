<?php 

namespace Clockwise;

class Clockwise 
{
    public $time;

	/**
     * Constructs a new instance of Clockwise. Acceptable formats
     * are Unix Timestamp, or string representation befitting
     * strtotime. Defaults to now. 
     * @param mixed $time
     */
    public function __construct($time = null)
	{
        if ($time === null) {
            $time = time();
        }

        if (is_string($time)) {
            $time = strtotime($time);
        }

        if (is_numeric($time)) {
            $time = $time;
        }

        $this->time = $time;
	}

    /**
     * Returns a timestamp for now.
     * @return Integer
     */
    public function now() {
        return time();
    }


}
