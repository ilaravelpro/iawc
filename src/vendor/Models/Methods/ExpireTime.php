<?php


namespace iLaravel\iAWC\Vendor\Models\Methods;


trait ExpireTime
{
    public function expire_time()
    {
        return $this->UTCTime($this->record->expire_time);
    }
}
