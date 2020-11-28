<?php


namespace iLaravel\iAWC\Vendor\Models\Methods;


trait Hazard
{
    public function hazard()
    {
        return [
            'type' => $this->record->hazard ? (string)$this->record->hazard->attributes()->type : null,
            'severity' => $this->record->hazard ? (string)$this->record->hazard->attributes()->severity : null,
        ];
    }
}
