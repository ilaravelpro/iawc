<?php


namespace iLaravel\iAWC\Vendor\Models\Methods;


trait Probability
{
    public function probability()
    {
        return (int)$this->record->probability;
    }
}
