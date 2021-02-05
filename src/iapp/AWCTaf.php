<?php
/**
 * Author: Amir Hossein Jahani | iAmir.net
 * Last modified: 11/28/20, 10:40 AM
 * Copyright (c) 2021. Powered by iamir.net
 */

namespace iLaravel\iAWC\iApp;


use Illuminate\Database\Eloquent\Model;

class AWCTaf extends Model
{
    use \iLaravel\Core\iApp\Modals\Modal;

    public static $s_prefix = 'IAWCT';
    public static $s_start = 1155;
    public static $s_end = 1733270554752;
    protected $table = 'i_awc_tafs';
    protected $guarded = [];

    protected $casts = [
        'start_at' => 'datetime',
        'end_at' => 'datetime',
        'issue_at' => 'datetime',
        'bulletin_at' => 'datetime',
    ];

    public static function getByStation($station)
    {
        return static::where('station', $station)->get();
    }

    public function forecasts() {
        return $this->hasMany(imodal('AWCTafForecast'), 'taf_id');
    }
}
