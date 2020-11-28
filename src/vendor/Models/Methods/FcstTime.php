<?php


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
