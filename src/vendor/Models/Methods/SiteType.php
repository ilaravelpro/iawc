<?php
/**
 * Author: Amir Hossein Jahani | iAmir.net
 * Last modified: 11/28/20, 3:02 PM
 * Copyright (c) 2021. Powered by iamir.net
 */

namespace iLaravel\iAWC\Vendor\Models\Methods;

trait SiteType
{

    public function site_type()
    {
        return array_keys((array)$this->record->site_type);
    }
}
