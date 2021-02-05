<?php
/**
 * Author: Amir Hossein Jahani | iAmir.net
 * Last modified: 11/28/20, 2:36 PM
 * Copyright (c) 2021. Powered by iamir.net
 */

namespace iLaravel\iAWC\Vendor\Models;

use Carbon\Carbon;
use iLaravel\iAWC\Vendor\Models\Methods\AltitudeAirSigMet;
use iLaravel\iAWC\Vendor\Models\Methods\Area;
use iLaravel\iAWC\Vendor\Models\Methods\ExpireTime;
use iLaravel\iAWC\Vendor\Models\Methods\ForecastHour;
use iLaravel\iAWC\Vendor\Models\Methods\FzlAltitude;
use iLaravel\iAWC\Vendor\Models\Methods\GeometryType;
use iLaravel\iAWC\Vendor\Models\Methods\Hazard;
use iLaravel\iAWC\Vendor\Models\Methods\IssueTime;
use iLaravel\iAWC\Vendor\Models\Methods\Product;
use iLaravel\iAWC\Vendor\Models\Methods\ReceiptTime;
use iLaravel\iAWC\Vendor\Models\Methods\Tag;
use iLaravel\iAWC\Vendor\Models\Methods\ValidTimeGAIR;

class AWCGAirMet extends Modal
{
    protected $excludes = ['wind_variation_raw', 'weather_handel'];
    protected $geoType = 'gairmet';

    use ReceiptTime,
        AltitudeAirSigMet,
        FzlAltitude,
        IssueTime,
        ExpireTime,
        ForecastHour,
        Product,
        Tag,
        ValidTimeGAIR,
        Hazard,
        GeometryType,
        Area;

    public function id() {
        return $this->product();
    }

    public function toModel() {
        $model = imodal('AWCGAirMet');
        $record = $this->toArray();
        $hash = md5(http_build_query($record));
        if ($hashFind = $model::where('hash', $hash)->first())
            return $hashFind;
        $data = [
            "hazard" => _get_value($record, "hazard"),
            "altitude" => _get_value($record, "altitude"),
            "forecast_hour" => _get_value($record, "forecast_hour"),
            "product" => _get_value($record, "product"),
            "tag" => _get_value($record, "tag"),
            "geometry" => _get_value($record, "geometry_type"),
            "points" => _get_value($record, "area"),
            "receipt_at" => Carbon::parse(_get_value($record, "receipt_time"))->format('Y-m-d H:i:s'),
            "issue_at" => Carbon::parse(_get_value($record, "issue_time"))->format('Y-m-d H:i:s'),
            "valid_at" => Carbon::parse(_get_value($record, "valid_time"))->format('Y-m-d H:i:s'),
            "expire_at" => Carbon::parse(_get_value($record, "expire_time"))->format('Y-m-d H:i:s'),
            "hash" => $hash
        ];
        return $model::create($data);
    }
}
