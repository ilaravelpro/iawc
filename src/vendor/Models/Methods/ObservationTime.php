<?php
/**
 * Author: Amir Hossein Jahani | iAmir.net
 * Last modified: 11/28/20, 10:40 AM
 * Copyright (c) 2021. Powered by iamir.net
 */

namespace iLaravel\iAWC\Vendor\Models\Methods;

use Carbon\Carbon;

trait ObservationTime
{
    public function observation_time()
    {
        return $this->UTCTime($this->record->observation_time);
    }
}
