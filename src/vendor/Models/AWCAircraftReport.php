<?php

namespace iLaravel\iAWC\Vendor\Models;

use Carbon\Carbon;
use iLaravel\iAWC\Vendor\Models\Methods\AircraftReportType;
use iLaravel\iAWC\Vendor\Models\Methods\FlightType;
use iLaravel\iAWC\Vendor\Models\Methods\IcingCondition;
use iLaravel\iAWC\Vendor\Models\Methods\ReceiptTime;
use iLaravel\iAWC\Vendor\Models\Methods\ObservationTime;
use iLaravel\iAWC\Vendor\Models\Methods\QualityControlFlags;
use iLaravel\iAWC\Vendor\Models\Methods\AircraftRef;
use iLaravel\iAWC\Vendor\Models\Methods\Latitude;
use iLaravel\iAWC\Vendor\Models\Methods\Longitude;
use iLaravel\iAWC\Vendor\Models\Methods\Altitude;
use iLaravel\iAWC\Vendor\Models\Methods\SkyCondition;
use iLaravel\iAWC\Vendor\Models\Methods\TurbulenceCondition;
use iLaravel\iAWC\Vendor\Models\Methods\Text;
use iLaravel\iAWC\Vendor\Models\Methods\Temperature;
use iLaravel\iAWC\Vendor\Models\Methods\Wind;
use iLaravel\iAWC\Vendor\Models\Methods\Visibility;
use iLaravel\iAWC\Vendor\Models\Methods\WX;

class AWCAircraftReport extends Modal
{
    protected $excludes = ['wind_variation_raw', 'weather_handel'];
    protected $geoType = 'airep';

    use AircraftRef,
        Text,
        Altitude,
        ReceiptTime,
        ObservationTime,
        Latitude,
        Longitude,
        Temperature,
        Visibility,
        Wind,
        WX,
        SkyCondition,
        TurbulenceCondition,
        IcingCondition,
        QualityControlFlags,
        FlightType,
        AircraftReportType;

    public function icon() {
        $url = 'https://www.aviationweather.gov/cgi-bin/plot/';
        $icon = null;
        $dir = 45;
        $color = "000000";
        if ($this->type() == "Urgent PIREP") $color = "aa0000";
        $text = "";
        $statmodel = "";
        $code = "PLANE";
        $wxplot = 0;

        $tbType1 = count($this->turbulence_condition()) > 0 && isset($this->turbulence_condition()[0]) ? $this->turbulence_condition()[0]['type'] :  '';
        $tbInt1 = count($this->turbulence_condition()) > 0 && isset($this->turbulence_condition()[0]) ? $this->turbulence_condition()[0]['intensity'] :  '';
        $icgInt1 = count($this->icing_condition()) > 0 && isset($this->icing_condition()[0]) ? $this->icing_condition()[0]['intensity'] :  '';
        $cloudCvg1 = count($this->sky_condition()) > 0 && isset($this->sky_condition()[0]) ? $this->sky_condition()[0]['type'] :  '';
        $cloudBas1 = count($this->sky_condition()) > 0 && isset($this->sky_condition()[0]) ? $this->sky_condition()[0]['base'] :  '';
        $cloudTop1 = count($this->sky_condition()) > 0 && isset($this->sky_condition()[0]) ? $this->sky_condition()[0]['top'] :  '';

        $fltlvl = (int)($this->altitude() / 100);

        // Extreme turb
        if ($tbInt1 == "EXTM") {
            $code = "TUR-X";
            $color = "cc00cc";
            // Extreme/severe turb
        } elseif ($tbInt1 == "SEV-EXTM") {
            $code = "TUR-S";
            $color = "cc00cc";
            // Severe turb
        } elseif ($tbInt1 == "SEV") {
            $code = "TUR-S";
            $color = "aa0000";
            // Severe icing
        } elseif ($icgInt1 == "SEV" || $icgInt1 == "HVY") {
            $code = "ICE-S";
            $color = "aa0000";
            // Moderate/severe turb
        } elseif ($tbInt1 == "MOD-SEV") {
            $code = "TUR-MS";
            $color = "aa0000";
            // Moderate/severe icing
        } elseif ($icgInt1 == "MOD-SEV") {
            $code = "ICE-M";
            $color = "aa0000";
            // Mountain wave turb
        } elseif ($tbType1 == "MWAVE") {
            $text = "MWAV";
            $color = "ff8800";
            // Low level wind shear
        } elseif ($tbType1 == "LLWS") {
            $text = "LLWS";
            $color = "aa0000";
            // Moderate turb
        } elseif ($tbInt1 == "MOD") {
            $code = "TUR-M";
            $color = "ff8800";
            // Moderate icing
        } elseif ($icgInt1 == "MOD") {
            $code = "ICE-M";
            $color = "ff8800";
            // Light/moderate turb
        } elseif ($tbInt1 == "LGT-MOD") {
            $code = "TUR-LM";
            $color = "ff8800";
            // Light/moderate icing
        } elseif ($icgInt1 == "LGT-MOD") {
            $code = "ICE-L";
            $color = "ff8800";
            // Light turb
        } elseif ($tbInt1 == "LGT") {
            $code = "TUR-L";
            $color = "00aa00";
            // Light icing
        } elseif ($icgInt1 == "LGT") {
            $code = "ICE-L";
            $color = "00aa00";
            // Smooth/light turb
        } elseif ($tbInt1 == "SMTH-LGT") {
            $code = "TUR-TL";
            $color = "00aa00";
            // Trace/light icing
        } elseif ($icgInt1 == "TRC-LGT") {
            $code = "ICE-TL";
            $color = "00aa00";
            // Trace/light icing
        } elseif ($icgInt1 == "TRC") {
            $code = "ICE-T";
            $color = "00aa00";
            // Negative turb
        } elseif ($tbInt1 == "NEG") {
            $code = "TUR-N";
            $color = "0000ff";
            // Negative icing
        } elseif ($icgInt1 == "NEG") {
            $code = "ICE-N";
            $color = "0000ff";
        }
        elseif (
            $wxplot &&
            (
                (float)$this->record->temp_c ||
                (int)$this->record->wind_dir_degrees||
                $cloudCvg1
            )) {
            if ((float)$this->record->temp_c) $statmodel = $statmodel . "temp=" . feature.attributes.temp . "&";
            if ((int)$this->record->wind_dir_degrees) {
                $statmodel = $statmodel . "wdir=" . (int)$this->record->wind_dir_degrees . "&";
                $statmodel = $statmodel . "wspd=" . (int)$this->record->wind_speed_kt . "&";
            }
            $statmodel = $statmodel . "fltlvl=" . $fltlvl . "&";
            if ($cloudCvg1) $statmodel = $statmodel . "cover=" . $cloudCvg1 . "&";
            else $statmodel = $statmodel . "cover=S&";
            if ($cloudBas1) $statmodel = $statmodel . "cbas=" . $cloudBas1 . "&";
            if ($cloudTop1) $statmodel = $statmodel . "ctop=" . $cloudTop1 . "&";
        }
        $params['scale'] = 1;
        if ($this->type()== "Urgent PIREP") $color = "aa0000";
        if ($text != "") $icon = $url . "txticon.php?text=" . $text . "&color=" . $color;
        elseif ($statmodel != "") $icon = $url . "stationicon.php?" . $statmodel;
        elseif ($code == "PLANE") $icon = $url . "wxicon.php?code=" . (string)$code . "&color=" . (string)$color . "&dir=" . (string)$dir;
        else $icon = $url . "wxicon.php?code=" . (string)$code . "&color=" . (string)$color;
        $icon = $icon . "&scale=" . '1';
        return $icon;
    }

    public function id() {
        return $this->aircraft();
    }

    public function toModel() {
        $model = imodal('AWCAircraftReport');
        $record = $this->toArray();
        $hash = md5(http_build_query($record));
        if ($hashFind = $model::where('hash', $hash)->first())
            return $hashFind;
        $data = [
            "reference" => _get_value($record, "aircraft"),
            "text" => _get_value($record, "text"),
            "altitude" => _get_value($record, "altitude"),
            "latitude" => _get_value($record, "latitude"),
            "longitude" => _get_value($record, "longitude"),
            "type" => _get_value($record, "type"),
            "icon" => _get_value($record, "icon"),
            "temperature" => _get_value($record, "temperature"),
            "wind" => _get_value($record, "wind"),
            "visibility" => _get_value($record, "visibility"),
            "wx" => _get_value($record, "wx"),
            "sky_condition" => _get_value($record, "sky_condition"),
            "turbulence_condition" => _get_value($record, "turbulence_condition"),
            "icing_condition" => _get_value($record, "icing_condition"),
            "quality_control_flags" => _get_value($record, "quality_control_flags"),
            "receipt_at" => Carbon::parse(_get_value($record, "receipt_time"))->format('Y-m-d H:i:s'),
            "observation_at" => Carbon::parse(_get_value($record, "observation_time"))->format('Y-m-d H:i:s'),
            "hash" => $hash
        ];
        return $model::create($data);
    }
}
