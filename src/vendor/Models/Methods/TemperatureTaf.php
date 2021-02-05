<?php
/**
 * Author: Amir Hossein Jahani | iAmir.net
 * Last modified: 11/28/20, 10:40 AM
 * Copyright (c) 2021. Powered by iamir.net
 */

namespace iLaravel\iAWC\Vendor\Models\Methods;


trait TemperatureTaf
{
    public function temperature() {

        $clouds = $this->record->temperature;
        $cloud_array = [];
        foreach ($clouds as $cloud) {
            $cloud_array[] = [
                'valid_time' => $this->UTCTime($cloud['valid_time']),
                'surface' => (float)$cloud['sfc_temp_c'],
                'max' => (float) $cloud['max_temp_c'],
                'min' => (float) $cloud['min_temp_c'],
            ];
        }
        return $cloud_array;
    }
}
