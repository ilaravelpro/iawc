<?php


namespace iLaravel\iAWC\Vendor\Models\Methods;

use Carbon\Carbon;

trait ObservationTime
{
    public function observation_time()
    {
        return $this->UTCTime($this->record->observation_time);
    }
}
