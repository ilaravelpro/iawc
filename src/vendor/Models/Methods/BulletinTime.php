<?php


namespace iLaravel\iAWC\Vendor\Models\Methods;


trait BulletinTime
{
    public function bulletin_time()
    {
        return $this->UTCTime($this->record->bulletin_time);
    }
}
