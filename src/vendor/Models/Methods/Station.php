<?php

namespace iLaravel\iAWC\Vendor\Models\Methods;

trait Station
{

    public function station()
    {
        return (string)$this->record->station_id;
    }
}
