<?php


namespace iLaravel\iAWC\Vendor\Models\Methods;


trait AircraftRef
{
    public function aircraft()
    {
        return (string)$this->record->aircraft_ref;
    }
}
