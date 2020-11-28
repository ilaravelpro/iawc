<?php


namespace iLaravel\iAWC\Vendor\Models\Methods;


trait ChangeIndicator
{
    public function change_indicator()
    {
        return (string)$this->record->change_indicator;
    }
}
