<?php


namespace iLaravel\iAWC\Vendor\Models\Methods;


trait Snow
{
    public function snow()
    {
        return (float)$this->record->snow_in;
    }
}
