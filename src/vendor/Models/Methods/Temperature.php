<?php
/**
 * Author: Amir Hossein Jahani | iAmir.net
 * Last modified: 11/28/20, 10:40 AM
 * Copyright (c) 2021. Powered by iamir.net
 */

namespace iLaravel\iAWC\Vendor\Models\Methods;


trait Temperature
{
    public function temperature()
    {
        return [
            'air' => (float)$this->record->temp_c,
            'dewpoint' => (float)$this->record->dewpoint_c,
            'max_air' => [
                'hr6' => (float)$this->record->maxT_c,
                'hr24' => (float)$this->record->maxT24hr_c,
            ],
            'min_air' => [
                'hr6' => (float)$this->record->minT_c,
                'hr24' => (float)$this->record->minT24hr_c,
            ],
        ];
    }
}
