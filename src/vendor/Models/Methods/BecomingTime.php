<?php


namespace iLaravel\iAWC\Vendor\Models\Methods;

trait BecomingTime
{
    public function becoming_time()
    {
        return $this->UTCTime($this->record->time_becoming);
    }
}
