<?php


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
