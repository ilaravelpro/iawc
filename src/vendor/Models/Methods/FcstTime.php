<?php
/**
 * Author: Amir Hossein Jahani | iAmir.net
 * Last modified: 11/28/20, 10:40 AM
 * Copyright (c) 2021. Powered by iamir.net
 */

namespace iLaravel\iAWC\Vendor\Models\Methods;


trait FcstTime
{
    public function fcst_time()
    {
        return  [
            'from' => $this->UTCTime($this->record->fcst_time_from),
            'to' => $this->UTCTime($this->record->fcst_time_to),
        ];
    }

}
