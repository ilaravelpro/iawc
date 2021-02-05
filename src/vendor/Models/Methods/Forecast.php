<?php
/**
 * Author: Amir Hossein Jahani | iAmir.net
 * Last modified: 11/28/20, 10:40 AM
 * Copyright (c) 2021. Powered by iamir.net
 */

namespace iLaravel\iAWC\Vendor\Models\Methods;


trait Forecast
{
    public function forecast() {

        $clouds = $this->record->forecast;
        $cloud_array = [];
        foreach ($clouds as $cloud) {
            $cloud->raw_text = $this->text();
            $cloud_array[] = (new \iLaravel\iAWC\Vendor\Models\Forecast($cloud))->toArray();
        }
        return $cloud_array;
    }
}
