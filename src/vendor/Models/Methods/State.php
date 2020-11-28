<?php

namespace iLaravel\iAWC\Vendor\Models\Methods;

trait State
{

    public function state()
    {
        return (string)$this->record->state;
    }
}
