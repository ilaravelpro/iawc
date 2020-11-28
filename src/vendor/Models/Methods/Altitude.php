<?php


namespace iLaravel\iAWC\Vendor\Models\Methods;

trait Altitude
{
    public function altitude()
    {
        return (float)$this->record->altitude_ft_msl;
    }
}
