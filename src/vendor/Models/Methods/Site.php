<?php

namespace iLaravel\iAWC\Vendor\Models\Methods;

trait Site
{

    public function site()
    {
        return (string)$this->record->site;
    }
}
