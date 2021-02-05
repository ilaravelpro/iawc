<?php
/**
 * Author: Amir Hossein Jahani | iAmir.net
 * Last modified: 11/28/20, 10:40 AM
 * Copyright (c) 2021. Powered by iamir.net
 */

namespace iLaravel\iAWC\Vendor\Models\Methods;


trait SkyCondition
{
    public function sky_condition()
    {
        $clouds = $this->record->sky_condition;
        $cloud_array = [];
        foreach ($clouds as $cloud) {
            $cloud_array[] = [
                'type' => (string)$cloud['sky_cover'],
                'base' => (int)$cloud['cloud_base_ft_agl'],
                'top' => (int) $cloud['cloud_top_ft_msl'],
            ];
        }
        return $cloud_array;
    }
}
