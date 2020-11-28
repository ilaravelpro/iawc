<?php

namespace iLaravel\iAWC\Vendor\Models\Methods;

trait Country
{

    public function country()
    {
        return (string)$this->record->country;
    }
}
