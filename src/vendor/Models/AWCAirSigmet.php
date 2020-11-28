<?php

namespace iLaravel\iAWC\Vendor\Models;

use Carbon\Carbon;
use iLaravel\iAWC\Vendor\Models\Methods\AirsigmetType;
use iLaravel\iAWC\Vendor\Models\Methods\AltitudeAirSigMet;
use iLaravel\iAWC\Vendor\Models\Methods\Area;
use iLaravel\iAWC\Vendor\Models\Methods\Hazard;
use iLaravel\iAWC\Vendor\Models\Methods\Movement;
use iLaravel\iAWC\Vendor\Models\Methods\Text;
use iLaravel\iAWC\Vendor\Models\Methods\ValidTime;

class AWCAirSigmet extends Modal
{
    protected $excludes = ['wind_variation_raw', 'weather_handel'];
    protected $geoType = 'airsigmet';

    use Text,
        ValidTime,
        AltitudeAirSigMet,
        Movement,
        Hazard,
        AirsigmetType,
        Area;

    public function id() {
        return $this->text();
    }

    public function toModel() {
        $model = imodal('AWCAirSigmet');
        $record = $this->toArray();
        $hash = md5(http_build_query($record));
        if ($hashFind = $model::where('hash', $hash)->first())
            return $hashFind;
        $data = [
            "text" => _get_value($record, "text"),
            "altitude" => _get_value($record, "altitude"),
            "movement" => _get_value($record, "movement"),
            "hazard" => _get_value($record, "hazard"),
            "points" => _get_value($record, "area"),
            "start_at" => Carbon::parse(_get_value($record, "valid_time.from"))->format('Y-m-d H:i:s'),
            "end_at" => Carbon::parse(_get_value($record, "valid_time.to"))->format('Y-m-d H:i:s'),
            "hash" => $hash
        ];
        return $model::create($data);
    }
}
