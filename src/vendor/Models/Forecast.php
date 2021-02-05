<?php
/**
 * Author: Amir Hossein Jahani | iAmir.net
 * Last modified: 11/28/20, 10:40 AM
 * Copyright (c) 2021. Powered by iamir.net
 */

namespace iLaravel\iAWC\Vendor\Models;

use iLaravel\iAWC\Vendor\Models\Methods\Altimeter;
use iLaravel\iAWC\Vendor\Models\Methods\BecomingTime;
use iLaravel\iAWC\Vendor\Models\Methods\ChangeIndicator;
use iLaravel\iAWC\Vendor\Models\Methods\FcstTime;
use iLaravel\iAWC\Vendor\Models\Methods\IcingCondition;
use iLaravel\iAWC\Vendor\Models\Methods\NotDecoded;
use iLaravel\iAWC\Vendor\Models\Methods\Probability;
use iLaravel\iAWC\Vendor\Models\Methods\SkyCondition;
use iLaravel\iAWC\Vendor\Models\Methods\TemperatureTaf;
use iLaravel\iAWC\Vendor\Models\Methods\Text;
use iLaravel\iAWC\Vendor\Models\Methods\TurbulenceCondition;
use iLaravel\iAWC\Vendor\Models\Methods\Wind;
use iLaravel\iAWC\Vendor\Models\Methods\Visibility;
use iLaravel\iAWC\Vendor\Models\Methods\WX;

class Forecast extends Modal
{
    protected $excludes = ['wind_variation_raw', 'weather_handel', 'text'];

    use Text,
        FcstTime,
        ChangeIndicator,
        BecomingTime,
        Probability,
        Wind,
        WX,
        Altimeter,
        Visibility,
        NotDecoded,
        SkyCondition,
        TurbulenceCondition,
        IcingCondition,
        TemperatureTaf;

    public function id() {
        return $this->text();
    }
}
