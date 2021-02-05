<?php
/**
 * Author: Amir Hossein Jahani | iAmir.net
 * Last modified: 11/28/20, 10:40 AM
 * Copyright (c) 2021. Powered by iamir.net
 */

namespace iLaravel\iAWC\Vendor\Models\Methods;


trait Area
{
    public function area()
    {
        $clouds = $this->record->area->point;
        $cloud_array = [];
        foreach ($clouds as $cloud) {
            $cloud_array[] = [
                'longitude' => (float)$cloud->longitude,
                'latitude' => (float)$cloud->latitude,
            ];
        }
        return $cloud_array;
    }
}
