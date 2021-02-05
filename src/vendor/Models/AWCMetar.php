<?php
/**
 * Author: Amir Hossein Jahani | iAmir.net
 * Last modified: 11/28/20, 1:25 PM
 * Copyright (c) 2021. Powered by iamir.net
 */

namespace iLaravel\iAWC\Vendor\Models;

use Carbon\Carbon;

use iLaravel\iAWC\Vendor\Models\Methods\Text;
use iLaravel\iAWC\Vendor\Models\Methods\Station;
use iLaravel\iAWC\Vendor\Models\Methods\ObservationTime;
use iLaravel\iAWC\Vendor\Models\Methods\Latitude;
use iLaravel\iAWC\Vendor\Models\Methods\Longitude;
use iLaravel\iAWC\Vendor\Models\Methods\Temperature;
use iLaravel\iAWC\Vendor\Models\Methods\Wind;
use iLaravel\iAWC\Vendor\Models\Methods\QualityControlFlags;
use iLaravel\iAWC\Vendor\Models\Methods\Visibility;
use iLaravel\iAWC\Vendor\Models\Methods\Altimeter;
use iLaravel\iAWC\Vendor\Models\Methods\WX;
use iLaravel\iAWC\Vendor\Models\Methods\SkyCondition;
use iLaravel\iAWC\Vendor\Models\Methods\FlightCategory;
use iLaravel\iAWC\Vendor\Models\Methods\Precipitation;
use iLaravel\iAWC\Vendor\Models\Methods\Snow;
use iLaravel\iAWC\Vendor\Models\Methods\MeTarType;
use iLaravel\iAWC\Vendor\Models\Methods\Elevation;

class AWCMetar extends Modal
{
    protected $excludes = ['wind_variation_raw', 'weather_handel'];
    protected $geoType = 'metar';

    use Station,
        Text,
        ObservationTime,
        Latitude,
        Longitude,
        Temperature,
        Wind,
        QualityControlFlags,
        Visibility,
        Altimeter,
        WX,
        SkyCondition,
        FlightCategory,
        Precipitation,
        Snow,
        MeTarType,
        Elevation;

    public function id() {
        return $this->station();
    }

    public function icon() {
        $url = 'https://www.aviationweather.gov/cgi-bin/plot/stationicon.php';
        $params['scale'] = 1;
        if ($this->station()) $params['id'] = $this->station();
        if ((float)$this->record->temp_c) $params['temp'] = (float)$this->record->temp_c;
        if ((float)$this->record->dewpoint_c) $params['dewp'] = (float)$this->record->dewpoint_c;
        if ((float)$this->record->altim_in_hg) $params['altim'] = (float)$this->record->altim_in_hg;
        if (count($this->sky_condition()) > 0){
            if ($this->sky_condition()[count($this->sky_condition()) - 1]['type']) $params['cover'] = $this->sky_condition()[count($this->sky_condition()) - 1]['type'];
            if ($this->sky_condition()[count($this->sky_condition()) - 1]['base']) $params['ceil'] = $this->sky_condition()[count($this->sky_condition()) - 1]['base'] / 100;
        }
        if ((int)$this->record->wind_speed_kt)$params['wspd'] = (int)$this->record->wind_speed_kt;
        if ((int)$this->record->wind_gust_kt)$params['wgst'] = (int)$this->record->wind_gust_kt;
        if ((int)$this->record->wind_dir_degrees) {
            $dir = (int)$this->record->wind_dir_degrees;
            if ($this->longitude() < 0)
                $params['wdir'] = -($dir);
            else
                $params['wdir'] = $dir;
        }
        if ((float)$this->record->visibility_statute_mi)$params['visib'] = (float)$this->record->visibility_statute_mi;
        if ((string)$this->record->wx_string)
            $params['wx'] = str_replace(' ', '+', (string)$this->record->wx_string);
        if ((string)$this->record->flight_category) $params['fltcat'] = (string)$this->record->flight_category;
        return bit_add_get_method($url, $params);
    }

    public function toModel() {
        $model = imodal('AWCMetar');
        $record = $this->toArray();
        $hash = md5(http_build_query($record));
        if ($hashFind = $model::where('hash', $hash)->first())
            return $hashFind;
        $data = [
            "station" => _get_value($record, "station"),
            "text" => _get_value($record, "text"),
            "latitude" => _get_value($record, "latitude"),
            "longitude" => _get_value($record, "longitude"),
            "altimeter" => _get_value($record, "altimeter"),
            "flight_cat" => _get_value($record, "flight_cat"),
            "snow" => _get_value($record, "snow"),
            "icon" => _get_value($record, "icon"),
            "temperature" => _get_value($record, "temperature"),
            "wind" => _get_value($record, "wind"),
            "visibility" => _get_value($record, "visibility"),
            "wx" => _get_value($record, "wx"),
            "sky_condition" => _get_value($record, "sky_condition"),
            "precip" => _get_value($record, "precip"),
            "quality_control_flags" => _get_value($record, "quality_control_flags"),
            "observation_at" => Carbon::parse(_get_value($record, "observation_time"))->format('Y-m-d H:i:s'),
            "hash" => $hash
        ];
        return $model::create($data);
    }
}
