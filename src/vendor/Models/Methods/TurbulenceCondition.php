<?php


namespace iLaravel\iAWC\Vendor\Models\Methods;


trait TurbulenceCondition
{
    public function turbulence_condition()
    {
        $clouds = $this->record->turbulence_condition;
        $cloud_array = [];
        foreach ($clouds as $cloud) {
            $cloud_array = [
                'type' => (string) $cloud['turbulence_type'],
                'intensity' => (string) $cloud['turbulence_intensity'],
                'base' => (int) $cloud['turbulence_base_ft_msl'],
                'top' => (int) $cloud['turbulence_top_ft_msl'],
                'frequency' => (int) $cloud['turbulence_freq'],
                'min' => (int) $cloud['turbulence_min_alt_ft_agl'],
                'max' => (int) $cloud['turbulence_max_alt_ft_agl '],
            ];
        }
        return $cloud_array;
    }
}
