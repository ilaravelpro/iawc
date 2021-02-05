<?php
/**
 * Author: Amir Hossein Jahani | iAmir.net
 * Last modified: 11/28/20, 10:40 AM
 * Copyright (c) 2021. Powered by iamir.net
 */

namespace iLaravel\iAWC\Vendor\Models\Methods;


trait Movement
{
    public function movement()
    {
        return [
            'direction' => (int)$this->record->movement_dir_degrees,
            'speed' => (int)$this->record->movement_speed_kt,
        ];
    }
}
