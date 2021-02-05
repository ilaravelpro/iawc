<?php
/**
 * Author: Amir Hossein Jahani | iAmir.net
 * Last modified: 11/28/20, 10:40 AM
 * Copyright (c) 2021. Powered by iamir.net
 */

namespace iLaravel\iAWC\Vendor\Models\Methods;


trait ValidTime
{
    public function valid_time()
    {
        return  [
            'from' => $this->UTCTime($this->record->valid_time_from),
            'to' => $this->UTCTime($this->record->valid_time_to),
        ];
    }
}
