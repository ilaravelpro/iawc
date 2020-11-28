<?php

namespace iLaravel\iAWC\Vendor\Models\Methods;

trait NotDecoded
{
    public function not_decoded()
    {
        return (string)$this->record->not_decoded;
    }
}
