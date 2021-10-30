<?php
/**
 * Author: Amir Hossein Jahani | iAmir.net
 * Last modified: 11/28/20, 3:22 PM
 * Copyright (c) 2021. Powered by iamir.net
 */

namespace iLaravel\iAWC\iApp\Http\Controllers\API\v1\AWCTaf;

use Carbon\Carbon;
use iLaravel\Core\iApp\Http\Requests\iLaravel as Request;
use iLaravel\iAWC\Vendor\AviationWeather;
use Illuminate\Support\Facades\DB;

trait RequestData
{
    public function requestData(Request $request, $action, &$data)
    {
        if (in_array($action, ['index']) && isset($request->stationString)){
            $start_time = $request->has('startTime') ? Carbon::parse(str_replace('/', '-', $request->startTime))->format('Y-m-d H:i:s') : Carbon::now()->format('Y-m-d 00:00:00');
            $end_time = $request->has('endTime') ? Carbon::parse(str_replace('/', '-', $request->endTime))->format('Y-m-d H:i:s') : null;
            $data['startTime'] = $start_time;
            $data['endTime'] = $end_time;
            $stations = explode(',', $request->stationString);
            $data['stations'] = $stations;
            \DB::enableQueryLog();
            /*$check = $this->model::where(function ($query) use ($request, $start_time, $end_time, $stations) {
                if ($start_time) $query->orWhere('start_at', '>=', $start_time);
                if ($end_time) $query->where('end_at', '<=', $end_time);
                if ($request->stationString) $query->whereIn('station', $stations);
                return $query;
            });
            if ($check->get()->groupBy('station')->count() < count($stations)) {
                $params = $request->all();
                $params['format'] = 'model';
                unset($params['limited']);
                (new AviationWeather("tafs", $params))->get();
            }*/
            $params = $request->all();
            $params['format'] = 'model';
            unset($params['limited']);
            (new AviationWeather("tafs", $params))->get();
        }
    }
}
