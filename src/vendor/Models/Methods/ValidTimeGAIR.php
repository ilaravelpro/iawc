<?php


namespace iLaravel\iAWC\Vendor\Models\Methods;


trait ValidTimeGAIR
{
    public function valid_time()
    {
        return $this->UTCTime($this->record->valid_time);
    }
}
