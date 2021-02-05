<?php
/**
 * Author: Amir Hossein Jahani | iAmir.net
 * Last modified: 11/28/20, 11:41 AM
 * Copyright (c) 2021. Powered by iamir.net
 */

namespace iLaravel\iAWC\iApp;


use Illuminate\Database\Eloquent\Model;

class AWCStation extends Model
{
    use \iLaravel\Core\iApp\Modals\Modal;

    public static $s_prefix = 'IAWCS';
    public static $s_start = 1155;
    public static $s_end = 1733270554752;
    protected $table = 'i_awc_stations';
    protected $guarded = [];

    protected $casts = [
        'site_type' => 'array',
    ];

    public static function getByStation($station)
    {
        return static::where('station', $station)->get();
    }
}
