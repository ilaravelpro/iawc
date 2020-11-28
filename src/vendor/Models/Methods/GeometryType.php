<?php


namespace iLaravel\iAWC\Vendor\Models\Methods;


trait GeometryType
{
    public function geometry_type()
    {
        return (string)$this->record->geometry_type;
    }
}
