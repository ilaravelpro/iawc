<?php


namespace iLaravel\iAWC\Vendor\Models\Methods;


trait Altimeter
{
    public function altimeter()
    {
        return (float)$this->record->altim_in_hg;
    }
}
