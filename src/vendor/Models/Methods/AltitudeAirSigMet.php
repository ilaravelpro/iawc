<?php


namespace iLaravel\iAWC\Vendor\Models\Methods;


trait AltitudeAirSigMet
{
    public function altitude()
    {
        return [
            'level' => $this->record->altitude ? (int)$this->record->altitude->attributes()->level_ft_msl: null,
            'min' => $this->record->altitude ? (int)$this->record->altitude->attributes()->min_ft_msl : null,
            'max' => $this->record->altitude ? (int)$this->record->altitude->attributes()->max_ft_msl: null,
        ];
    }
}
