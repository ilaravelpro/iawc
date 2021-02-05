<?php
/**
 * Author: Amir Hossein Jahani | iAmir.net
 * Last modified: 11/28/20, 10:40 AM
 * Copyright (c) 2021. Powered by iamir.net
 */

namespace iLaravel\iAWC\Vendor\Models\Methods;

trait BecomingTime
{
    public function becoming_time()
    {
        return $this->UTCTime($this->record->time_becoming);
    }
}
