<?php
/**
 * Author: Amir Hossein Jahani | iAmir.net
 * Last modified: 11/28/20, 10:40 AM
 * Copyright (c) 2021. Powered by iamir.net
 */

namespace iLaravel\iAWC\Vendor\Models\Methods;


trait QualityControlFlags
{
    public function quality_control_flags()
    {
        return array_map(function ($val) {
            return $val == 'TRUE' ? true : false;
        }, (array)$this->record->quality_control_flags);
        //return (array)$this->record->quality_control_flags;
    }
}
