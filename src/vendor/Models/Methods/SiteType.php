<?php

namespace iLaravel\iAWC\Vendor\Models\Methods;

trait SiteType
{

    public function site_type()
    {
        return array_keys((array)$this->record->site_type);
    }
}
