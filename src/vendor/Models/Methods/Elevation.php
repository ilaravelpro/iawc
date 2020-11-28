<?php


namespace iLaravel\iAWC\Vendor\Models\Methods;


trait Elevation
{
    public function elevation()
    {
        return (float)$this->record->elevation_m;
    }
}
