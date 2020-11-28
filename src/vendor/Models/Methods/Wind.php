<?php


namespace iLaravel\iAWC\Vendor\Models\Methods;


trait Wind
{
    public function wind()
    {
        $variation = $this->wind_variation_raw();
        return [
            'direction' => (int)$this->record->wind_dir_degrees,
            'variation' => [
                'raw' => $variation,
                'upper' => $variation ? (int)explode('V', $variation)[1] : null,
                'lower' => $variation ? (int)explode('V', $variation)[0] : null,
            ],
            'speed' => (int)$this->record->wind_speed_kt,
            'gust' => (int)$this->record->wind_gust_kt,
            'shear' => [
                'height' => (int)$this->record->wind_shear_hgt_ft_agl,
                'direction' => (int)$this->record->wind_shear_dir_degrees,
                'speed' => (int)$this->record->wind_shear_speed_kt,
            ],
        ];
    }

    public function wind_variation_raw()
    {
        preg_match('/\d{3}V\d{3}/', $this->text(), $matches);
        return count($matches) == 0 ? null : $matches[0];
    }
}
