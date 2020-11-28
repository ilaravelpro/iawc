<?php


namespace iLaravel\iAWC\Vendor\Models\Methods;


trait AirsigmetType
{
    public function type()
    {
        return (string)$this->record->airsigmet_type;
    }
}
