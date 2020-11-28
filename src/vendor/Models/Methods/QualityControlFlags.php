<?php


namespace iLaravel\iAWC\Vendor\Models\Methods;


trait QualityControlFlags
{
    public function quality_control_flags()
    {
        return array_map(function ($val) {
            return $val == 'TRUE' ? true : false;
        }, (array)$this->record->quality_control_flags);
        //return (array)$this->record->quality_control_flags;
    }
}
