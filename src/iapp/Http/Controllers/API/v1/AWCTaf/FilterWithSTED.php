<?php
/**
 * Author: Amir Hossein Jahani | iAmir.net
 * Last modified: 11/28/20, 4:22 PM
 * Copyright (c) 2021. Powered by iamir.net
 */

namespace iLaravel\iAWC\iApp\Http\Controllers\API\v1\AWCTaf;

use Carbon\Carbon;
use iLaravel\Core\iApp\Http\Requests\iLaravel as Request;
use iLaravel\iAWC\Vendor\AviationWeather;

trait FilterWithSTED
{
    public function filterWithSTED(Request $request, $model, $parent = null, $filters = [], $operators = [])
    {
        $start_time = $request->has('startTime') ? Carbon::parse(str_replace('/', '-', $request->startTime))->format('Y-m-d H:i:s') : null;
        $end_time = $request->has('endTime') ? Carbon::parse(str_replace('/', '-', $request->endTime))->format('Y-m-d H:i:s') : null;
        $request->validate([
            'startTime' => ['nullable', 'date_format:Y-m-d H:i:s'],
            'endTime' => ['nullable', 'date_format:Y-m-d H:i:s'],
        ]);
        $stations = explode(',', $request->stationString);
        $check = $this->model::where(function ($query) use ($request, $start_time, $end_time, $stations) {
            if ($start_time) $query->orWhere('start_at', '>', $start_time);
            if ($end_time) $query->where('end_at', '<', $end_time);
            if ($request->stationString) $query->whereIn('station', $stations);
            return $query;
        });
        if ($check->get()->groupBy('station')->count() < count($stations)) {
            $params = $request->all();
            if (isset($params['startTime'])) $params['startTime'] = Carbon::parse($params['startTime'])->timestamp;
            if (isset($params['endTime'])) $params['endTime'] = Carbon::parse($params['endTime'])->timestamp;
            $params['format'] = 'model';
            unset($params['limited']);
            (new AviationWeather("tafs", $params))->get();
        }
        $model->where(function ($query) use ($request, $start_time, $end_time, $stations) {
            if ($start_time) $query->orWhere('start_at', '>', $start_time);
            if ($end_time) $query->where('end_at', '<', $end_time);
            if ($request->stationString) $query->whereIn('station', $stations);
            return $query;
        });
        if ($request->limited)
            foreach ($stations as $index => $station) {
                if ($mstation = $this->model::where('station', $station)->orderBy('start_at', 'desc')->first())
                    $stations[$index] = $mstation->id;
                else
                    unset($stations[$index]);
            }
        $model->whereIn('id', $stations);
        $model->orderBy('start_at', 'desc');
    }
}
