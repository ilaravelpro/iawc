<?php


namespace iLaravel\iAWC\iApp;


use Illuminate\Database\Eloquent\Model;

class AWCAircraftReport extends Model
{
    use \iLaravel\Core\iApp\Modals\Modal;

    public static $s_prefix = 'IAWCAR';
    public static $s_start = 1155;
    public static $s_end = 1733270554752;
    protected $table = 'i_awc_aircraft_reports';
    protected $guarded = [];

    protected $casts = [
        'receipt_at' => 'datetime',
        'observation_at' => 'datetime',
        'temperature' => 'array',
        'wind' => 'array',
        'visibility' => 'array',
        'wx' => 'array',
        'sky_condition' => 'array',
        'turbulence_condition' => 'array',
        'icing_condition' => 'array',
        'quality_control_flags' => 'array',
    ];

    public static function getByRef($reference)
    {
        return static::where('reference', $reference)->get();
    }

}
