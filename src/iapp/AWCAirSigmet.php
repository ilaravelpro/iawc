<?php
/**
 * Author: Amir Hossein Jahani | iAmir.net
 * Last modified: 11/28/20, 12:13 PM
 * Copyright (c) 2021. Powered by iamir.net
 */

namespace iLaravel\iAWC\iApp;


use Illuminate\Database\Eloquent\Model;

class AWCAirSigmet extends Model
{
    use \iLaravel\Core\iApp\Modals\Modal;

    public static $s_prefix = 'IAWCAS';
    public static $s_start = 1155;
    public static $s_end = 1733270554752;
    protected $table = 'i_awc_air_sigmets';
    protected $guarded = [];

    protected $casts = [
        'start_at' => 'datetime',
        'end_at' => 'datetime',
        'altitude' => 'array',
        'movement' => 'array',
        'points' => 'array',
        'hazard' => 'array',
    ];
}
