<?php
/**
 * Author: Amir Hossein Jahani | iAmir.net
 * Last modified: 11/28/20, 10:40 AM
 * Copyright (c) 2021. Powered by iamir.net
 */

namespace iLaravel\iAWC\Vendor\Models\Methods;


trait IcingCondition
{
    public function icing_condition()
    {
        $clouds = $this->record->icing_condition;
        $cloud_array = [];
        foreach ($clouds as $cloud) {
            $cloud_array[] = [
                'type' => (string) $cloud['icing_type'],
                'intensity' => (string) $cloud['icing_intensity'],
                'base' => (int) $cloud['icing_base_ft_msl'],
                'top' => (int) $cloud['icing_top_ft_msl'],
                'min' => (int) $cloud['icing_min_alt_ft_agl'],
                'max' => (int) $cloud['icing_max_alt_ft_agl '],
            ];
        }
        return $cloud_array;
    }
}
