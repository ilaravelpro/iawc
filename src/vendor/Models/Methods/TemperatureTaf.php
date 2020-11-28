<?php


namespace iLaravel\iAWC\Vendor\Models\Methods;


trait TemperatureTaf
{
    public function temperature() {

        $clouds = $this->record->temperature;
        $cloud_array = [];
        foreach ($clouds as $cloud) {
            $cloud_array[] = [
                'valid_time' => $this->UTCTime($cloud['valid_time']),
                'surface' => (float)$cloud['sfc_temp_c'],
                'max' => (float) $cloud['max_temp_c'],
                'min' => (float) $cloud['min_temp_c'],
            ];
        }
        return $cloud_array;
    }
}
