<?php
/**
 * Author: Amir Hossein Jahani | iAmir.net
 * Last modified: 11/28/20, 3:10 PM
 * Copyright (c) 2021. Powered by iamir.net
 */

namespace iLaravel\iAWC\Vendor\Models;

use Carbon\Carbon;

class Modal
{
    protected $record = null;
    protected $excludes = [];
    protected $geoType = 'awc';

    public function __construct($record)
    {
        $this->record = $record;
    }

    public function record()
    {
        return $this->record;
    }

    public function geo_type()
    {
        return $this->geoType;
    }

    public function UTCTime($time)
    {
        return (string) $time;
        /*$obs = str_replace('Z', 'UTC', $time);
        return (new Carbon($obs))->format('Y-m-d H:i:s e');*/
    }

    public function appendExclude($exclude)
    {
        $this->excludes = array_merge($this->excludes, is_array($exclude) ? $exclude : [$exclude]);
        return $this->excludes;
    }

    public function toArray()
    {
        $exclude_functions = array_merge([
            'appendExclude',
            'UTCTime',
            'record',
            'excludes',
            '__construct',
            'toArray',
            'toGeoJson',
            'toModel',
        ], $this->excludes);

        $array = [];
        $methods = get_class_methods($this);
        foreach ($methods as $method_name) {
            if (array_search($method_name, $exclude_functions) === false && $this->{$method_name}() && (is_array($this->{$method_name}()) ? count($this->{$method_name}()) : true)) {
                if (is_array($this->{$method_name}())){
                    $values = array_filter((array)($this->{$method_name}()), function ($val) use ($method_name){
                        if (is_array($val)){
                            $val = array_filter((array)($val), function ($value){
                                return !in_array($value, ['', null, "0"]) ? true :false;
                            });
                            return count($val) > 0;
                        }
                        return !in_array($val, ['', null, "0"]) ? true :false;
                    });
                    if (count($values) > 0)
                        $array[$method_name] = $values;
                }else
                    $array[$method_name] = $this->$method_name();
            }
        }
        return $array;
    }

    public function toGeoJson()
    {
        $type = 'Point';
        if (method_exists($this, 'area')){
            $type = 'Polygon';
            if (method_exists($this, 'geometry_type'))
                $type = strtoupper($this->geometry_type()) == 'LINE' ? 'LineString' : $type;
            $coordinates = [array_map(function ($val){
                return array_values($val);
            }, $this->area()->toArray())];
        }else
            $coordinates = array($this->longitude(), $this->latitude());
        $feature = array(
            'type' => 'Feature',
            'geometry' => array(
                'type' => $type,
                'coordinates' => $coordinates
            ),
            'properties' => $this->toArray()
        );
        return $feature;
    }
}
