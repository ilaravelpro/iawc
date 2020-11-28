<?php


namespace iLaravel\iAWC\Vendor\Models\Methods;


trait Longitude
{
    public function longitude()
    {
        return (float)$this->record->longitude;
    }
}
