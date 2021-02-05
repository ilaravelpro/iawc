<?php
/**
 * Author: Amir Hossein Jahani | iAmir.net
 * Last modified: 11/28/20, 10:40 AM
 * Copyright (c) 2021. Powered by iamir.net
 */

namespace iLaravel\iAWC\Vendor\Models\Methods;


trait WX
{
    public function wx()
    {
        return [
            'raw' => (string)$this->record->wx_string,
            'handel' => $this->weather_handel()
        ];
    }

    public function weather_handel()
    {
        $orig_weather = explode(' ', (string)$this->record->wx_string);
        $weather = str_replace('+', 'Heavy ', $orig_weather);
        $weather = str_replace('-', 'Light ', $weather);
        $weather = str_replace('VC', 'In Vicinity: ', $weather);

        $weatherCodes = collect([
            "MI" => "Shallow ",
            "BC" => "Patches ",
            "PR" => "Partial ",
            "DR" => "Drifiting ",
            "BL" => "Blowing ",
            "MI" => "Shallow ",
            "SH" => "Showers ",
            "TS" => "Thunderstorm ",
            "FZ" => "Freezing ",
            "DZ" => "Drizzle",
            "RA" => "Rain",
            "SN" => "Snow",
            "SG" => "Snow Grains",
            "IC" => "Ice Crystals",
            "PL" => "Ice Pellets",
            "GR" => "Hail",
            "GS" => "Small Hail",
            "BR" => "Mist",
            "FG" => "Fog",
            "FU" => "Smoke",
            "VA" => "Volcanic ash",
            "DU" => "Widespread Dust",
            "SA" => "Sand",
            "HZ" => "Haze",
            "PY" => "Spray",
        ]);

        $just_keys = $weatherCodes->keys()->all();
        $just_vals = $weatherCodes->values()->all();

        $human_weather = str_replace($just_keys, $just_vals, $weather);

        $combined = collect($orig_weather)->values()->combine(collect($human_weather))->all();

        $output = [];

        foreach ($combined as $code => $value) {
            if (!in_array($value, ['', null]))$output[] = ['code' => $code, 'desc' => $value];
        }
        return $output;
    }
}
