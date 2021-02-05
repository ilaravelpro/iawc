<?php
/**
 * Author: Amir Hossein Jahani | iAmir.net
 * Last modified: 11/28/20, 10:40 AM
 * Copyright (c) 2021. Powered by iamir.net
 */

namespace iLaravel\iAWC\iApp;


use Illuminate\Database\Eloquent\Model;

class AWCMetar extends Model
{
    use \iLaravel\Core\iApp\Modals\Modal;

    public static $s_prefix = 'IAWCM';
    public static $s_start = 1155;
    public static $s_end = 1733270554752;
    protected $table = 'i_awc_metars';
    protected $guarded = [];

    protected $casts = [
        'observation_at' => 'datetime',
        'temperature' => 'array',
        'wind' => 'array',
        'quality_control_flags' => 'array',
        'visibility' => 'array',
        'wx' => 'array',
        'sky_condition' => 'array',
        'precip' => 'array'
    ];

    public static function getByStation($station)
    {
        return static::where('station', $station)->get();
    }

}
