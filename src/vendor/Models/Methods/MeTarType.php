<?php


namespace iLaravel\iAWC\Vendor\Models\Methods;


trait MeTarType
{
    public function type()
    {
        return (string)$this->record->metar_type;
    }
}
