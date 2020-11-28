<?php

namespace iLaravel\iAWC\Vendor\Models;

use Carbon\Carbon;
use iLaravel\iAWC\Vendor\Models\Methods\BulletinTime;
use iLaravel\iAWC\Vendor\Models\Methods\Elevation;
use iLaravel\iAWC\Vendor\Models\Methods\IssueTime;
use iLaravel\iAWC\Vendor\Models\Methods\Remarks;
use iLaravel\iAWC\Vendor\Models\Methods\Station;
use iLaravel\iAWC\Vendor\Models\Methods\Latitude;
use iLaravel\iAWC\Vendor\Models\Methods\Longitude;
use iLaravel\iAWC\Vendor\Models\Methods\Text;
use iLaravel\iAWC\Vendor\Models\Methods\ValidTime;
use iLaravel\iAWC\Vendor\Models\Methods\Forecast;

class AWCTaf extends Modal
{
    protected $excludes = ['wind_variation_raw', 'weather_handel'];
    protected $geoType = 'taf';

    use Station,
        Text,
        IssueTime,
        BulletinTime,
        ValidTime,
        Remarks,
        Latitude,
        Longitude,
        Elevation,
        Forecast;

    public function id() {
        return $this->station();
    }

    public function toModel() {
        $model = imodal('AWCTaf');
        $record = $this->toArray();
        $hash = md5(http_build_query($record));
        if ($hashFind = $model::where('hash', $hash)->first())
            return $hashFind;
        $data = [
            "station" => _get_value($record, "station"),
            "text" => _get_value($record, "text"),
            "elevation" => _get_value($record, "elevation"),
            "latitude" => _get_value($record, "latitude"),
            "longitude" => _get_value($record, "longitude"),
            "remarks" => _get_value($record, "remarks"),
            "start_at" => Carbon::parse(_get_value($record, "valid_time.from"))->format('Y-m-d H:i:s'),
            "end_at" => Carbon::parse(_get_value($record, "valid_time.to"))->format('Y-m-d H:i:s'),
            "issue_at" => Carbon::parse(_get_value($record, "issue_time"))->format('Y-m-d H:i:s'),
            "bulletin_at" => Carbon::parse(_get_value($record, "bulletin_time"))->format('Y-m-d H:i:s'),
            "hash" => $hash
        ];
        $recordSaved = $model::create($data);
        foreach ($record['forecast'] as $forecast)
            $recordSaved->forecasts()->create([
                "text" => _get_value($forecast, "text"),
                "change_indicator" => _get_value($forecast, "change_indicator"),
                "probability" => _get_value($forecast, "probability"),
                "not_decoded" => _get_value($forecast, "not_decoded"),
                "temperature" => _get_value($forecast, "temperature"),
                "wind" => _get_value($forecast, "wind"),
                "visibility" => _get_value($forecast, "visibility"),
                "wx" => _get_value($forecast, "wx"),
                "sky_condition" => _get_value($forecast, "sky_condition"),
                "turbulence_condition" => _get_value($forecast, "turbulence_condition"),
                "icing_condition" => _get_value($forecast, "icing_condition"),
                "start_at" => Carbon::parse(_get_value($record, "fcst_time.from"))->format('Y-m-d H:i:s'),
                "end_at" => Carbon::parse(_get_value($record, "fcst_time.to"))->format('Y-m-d H:i:s'),
                "becoming_at" => Carbon::parse(_get_value($record, "becoming_time"))->format('Y-m-d H:i:s'),
            ]);
        return $recordSaved;
    }
}
