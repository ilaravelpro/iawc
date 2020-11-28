<?php


namespace iLaravel\iAWC\Vendor\Models\Methods;


trait Product
{
    public function product()
    {
        return (string)$this->record->product;
    }
}
