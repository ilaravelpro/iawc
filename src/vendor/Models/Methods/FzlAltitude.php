<?php
/**
 * Author: Amir Hossein Jahani | iAmir.net
 * Last modified: 11/28/20, 10:40 AM
 * Copyright (c) 2021. Powered by iamir.net
 */

namespace iLaravel\iAWC\Vendor\Models\Methods;


trait FzlAltitude
{
    public function fzl_altitude()
    {
        return [
            'min' => $this->record->fzl_altitude ? (int)$this->record->fzl_altitude->attributes()->min_ft_msl : null,
            'max' => $this->record->fzl_altitude ? (int)$this->record->fzl_altitude->attributes()->max_ft_msl: null,
        ];
    }
}
