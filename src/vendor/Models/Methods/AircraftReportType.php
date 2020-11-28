<?php


namespace iLaravel\iAWC\Vendor\Models\Methods;


trait AircraftReportType
{
    public function type()
    {
        return (string)$this->record->report_type;
    }
}
