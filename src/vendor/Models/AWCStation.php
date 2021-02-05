<?php
/**
 * Author: Amir Hossein Jahani | iAmir.net
 * Last modified: 11/28/20, 3:00 PM
 * Copyright (c) 2021. Powered by iamir.net
 */

namespace iLaravel\iAWC\Vendor\Models;

use Carbon\Carbon;
use iLaravel\iAWC\Vendor\Models\Methods\Country;
use iLaravel\iAWC\Vendor\Models\Methods\Elevation;
use iLaravel\iAWC\Vendor\Models\Methods\Latitude;
use iLaravel\iAWC\Vendor\Models\Methods\Longitude;
use iLaravel\iAWC\Vendor\Models\Methods\Site;
use iLaravel\iAWC\Vendor\Models\Methods\SiteType;
use iLaravel\iAWC\Vendor\Models\Methods\State;
use iLaravel\iAWC\Vendor\Models\Methods\Station as StationMethod;
use iLaravel\iAWC\Vendor\Models\Methods\WMO;

class AWCStation extends Modal
{
    protected $geoType = 'station';

    use StationMethod,
        WMO,
        Latitude,
        Longitude,
        Elevation,
        Site,
        State,
        Country,
        SiteType;

    public function id() {
        return $this->station();
    }

    public function toModel() {
        $model = imodal('AWCStation');
        $record = $this->toArray();
        $hash = md5(http_build_query($record));
        if ($hashFind = $model::where('hash', $hash)->first())
            return $hashFind;
        $data = [
            "station" => _get_value($record, "station"),
            "latitude" => _get_value($record, "altitude"),
            "longitude" => _get_value($record, "longitude"),
            "wmo" => _get_value($record, "wmo"),
            "elevation" => _get_value($record, "elevation"),
            "site" => _get_value($record, "site"),
            "state" => _get_value($record, "state"),
            "country" => _get_value($record, "country"),
            "site_type" => _get_value($record, "site_type"),
            "hash" => $hash
        ];
        return $model::create($data);
    }
}
