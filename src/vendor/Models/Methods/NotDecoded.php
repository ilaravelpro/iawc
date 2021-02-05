<?php
/**
 * Author: Amir Hossein Jahani | iAmir.net
 * Last modified: 11/28/20, 10:40 AM
 * Copyright (c) 2021. Powered by iamir.net
 */

namespace iLaravel\iAWC\Vendor\Models\Methods;

trait NotDecoded
{
    public function not_decoded()
    {
        return (string)$this->record->not_decoded;
    }
}
