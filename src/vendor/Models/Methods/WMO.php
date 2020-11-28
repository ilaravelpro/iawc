<?php

namespace iLaravel\iAWC\Vendor\Models\Methods;

trait WMO
{

    public function wmo()
    {
        return (string)$this->record->wmo_id;
    }
}
