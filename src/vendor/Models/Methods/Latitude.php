<?php


namespace iLaravel\iAWC\Vendor\Models\Methods;


trait Latitude
{
    public function latitude()
    {
        return (float)$this->record->latitude;
    }
}
