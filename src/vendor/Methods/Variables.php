<?php
/**
 * Author: Amir Hossein Jahani | iAmir.net
 * Last modified: 11/28/20, 11:58 AM
 * Copyright (c) 2021. Powered by iamir.net
 */

namespace iLaravel\iAWC\Vendor\Methods;


trait Variables
{
    private $service_url = "https://aviationweather.gov/cgi-bin/data/dataserver.php";

    public $params = [
        "page" => 1,
        "per_page" => 20,
        "dataSource" => "metars",
        "requestType" => "retrieve",
        "format" => "json",
    ];

    public $modals = [
        "metars" => "\iLaravel\iAWC\Vendor\Models\AWCMetar",
        "aircraftreports" => "\iLaravel\iAWC\Vendor\Models\AWCAircraftReport",
        "tafs" => "\iLaravel\iAWC\Vendor\Models\AWCTaf",
        "airsigmets" => "\iLaravel\iAWC\Vendor\Models\AWCAirSigmet",
        "gairmets" => "\iLaravel\iAWC\Vendor\Models\AWCGAirMet",
        "stations" => "\iLaravel\iAWC\Vendor\Models\AWCStation",
    ];

    public $sources = [
        "metars" => "METAR",
        "aircraftreports" => "AircraftReport",
        "tafs" => "TAF",
        "airsigmets" => "AIRSIGMET",
        "gairmets" => "GAIRMET",
        "stations" => "Station",
    ];

    public $data = [];

    protected $cache_time = 30;

}
