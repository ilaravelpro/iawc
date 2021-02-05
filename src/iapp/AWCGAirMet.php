<?php
/**
 * Author: Amir Hossein Jahani | iAmir.net
 * Last modified: 11/28/20, 2:23 PM
 * Copyright (c) 2021. Powered by iamir.net
 */

namespace iLaravel\iAWC\iApp;


use Illuminate\Database\Eloquent\Model;

class AWCGAirMet extends Model
{
    use \iLaravel\Core\iApp\Modals\Modal;

    public static $s_prefix = 'IAWCG';
    public static $s_start = 1155;
    public static $s_end = 1733270554752;
    protected $table = 'i_awc_g_air_mets';
    protected $guarded = [];

    protected $casts = [
        'receipt_at' => 'datetime',
        'issue_at' => 'datetime',
        'valid_at' => 'datetime',
        'expire_at' => 'datetime',
        'points' => 'array',
        'hazard' => 'array',
        'altitude' => 'array',
    ];

    public static function getByProduct($product)
    {
        return static::where('product', $product)->get();
    }
}
