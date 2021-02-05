<?php
/**
 * Author: Amir Hossein Jahani | iAmir.net
 * Last modified: 11/28/20, 10:40 AM
 * Copyright (c) 2021. Powered by iamir.net
 */

namespace iLaravel\iAWC\Vendor\Models\Methods;


trait SeaLevelPressure
{
    public function sea_level_pressure()
    {
        return (float)$this->record->sea_level_pressure_mb;
    }
}
