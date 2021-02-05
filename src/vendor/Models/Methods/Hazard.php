<?php
/**
 * Author: Amir Hossein Jahani | iAmir.net
 * Last modified: 11/28/20, 10:40 AM
 * Copyright (c) 2021. Powered by iamir.net
 */

namespace iLaravel\iAWC\Vendor\Models\Methods;


trait Hazard
{
    public function hazard()
    {
        return [
            'type' => $this->record->hazard ? (string)$this->record->hazard->attributes()->type : null,
            'severity' => $this->record->hazard ? (string)$this->record->hazard->attributes()->severity : null,
        ];
    }
}
