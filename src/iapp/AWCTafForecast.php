<?php
/**
 * Author: Amir Hossein Jahani | iAmir.net
 * Last modified: 11/28/20, 10:40 AM
 * Copyright (c) 2021. Powered by iamir.net
 */

namespace iLaravel\iAWC\iApp;


use Illuminate\Database\Eloquent\Model;

class AWCTafForecast extends Model
{
    use \iLaravel\Core\iApp\Modals\Modal;

    public static $s_prefix = 'IAWCTF';
    public static $s_start = 1155;
    public static $s_end = 1733270554752;
    protected $table = 'i_awc_tafs_forecasts';
    protected $guarded = [];

    protected $casts = [
        'start_at' => 'datetime',
        'end_at' => 'datetime',
        'becoming_at' => 'datetime',
        'temperature' => 'array',
        'wind' => 'array',
        'visibility' => 'array',
        'wx' => 'array',
        'sky_condition' => 'array',
        'turbulence_condition' => 'array',
        'icing_condition' => 'array',
    ];

}
