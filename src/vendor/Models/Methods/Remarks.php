<?php


namespace iLaravel\iAWC\Vendor\Models\Methods;


trait Remarks
{
    public function remarks()
    {
        return (string)$this->record->remarks;
    }
}
