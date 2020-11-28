<?php


namespace iLaravel\iAWC\Vendor\Models\Methods;


trait FlightCategory
{
    public function flight_cat()
    {
        return (string)$this->record->flight_category;
    }
}
