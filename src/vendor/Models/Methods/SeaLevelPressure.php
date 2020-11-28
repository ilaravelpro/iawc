<?php


namespace iLaravel\iAWC\Vendor\Models\Methods;


trait SeaLevelPressure
{
    public function sea_level_pressure()
    {
        return (float)$this->record->sea_level_pressure_mb;
    }
}
