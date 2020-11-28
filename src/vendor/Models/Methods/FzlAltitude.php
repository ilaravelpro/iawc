<?php


namespace iLaravel\iAWC\Vendor\Models\Methods;


trait FzlAltitude
{
    public function fzl_altitude()
    {
        return [
            'min' => $this->record->fzl_altitude ? (int)$this->record->fzl_altitude->attributes()->min_ft_msl : null,
            'max' => $this->record->fzl_altitude ? (int)$this->record->fzl_altitude->attributes()->max_ft_msl: null,
        ];
    }
}
