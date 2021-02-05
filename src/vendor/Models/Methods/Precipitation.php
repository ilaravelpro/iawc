<?php
/**
 * Author: Amir Hossein Jahani | iAmir.net
 * Last modified: 11/28/20, 10:40 AM
 * Copyright (c) 2021. Powered by iamir.net
 */

namespace iLaravel\iAWC\Vendor\Models\Methods;


trait Precipitation
{
    public function precip()
    {
        return [
            'in' => (float)$this->record->precip_in,
            'hr3' => (float)$this->record->pcp3hr_in,
            'hr6' => (float)$this->record->pcp6hr_in,
            'hr24' => (float)$this->record->pcp24hr_in,
        ];
    }
}
