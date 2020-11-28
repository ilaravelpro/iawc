<?php


namespace iLaravel\iAWC\Vendor\Models\Methods;


trait Movement
{
    public function movement()
    {
        return [
            'direction' => (int)$this->record->movement_dir_degrees,
            'speed' => (int)$this->record->movement_speed_kt,
        ];
    }
}
