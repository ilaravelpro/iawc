<?php
/**
 * Author: Amir Hossein Jahani | iAmir.net
 * Last modified: 11/28/20, 4:24 PM
 * Copyright (c) 2021. Powered by iamir.net
 */

namespace iLaravel\iAWC\iApp\Http\Controllers\API\v1\AWCMetar;

use iLaravel\Core\iApp\Http\Requests\iLaravel as Request;

trait FilterWithSTED
{
    public function filterWithSTED(Request $request, $model, $parent = null, $filters = [], $operators = [])
    {
        $model->where(function ($query) use ($request) {
            if ($request->startTime) $query->orWhere('observation_at', '>', $request->startTime);
            if ($request->endTime) $query->where('observation_at', '<', $request->endTime);
            if ($request->stations) $query->whereIn('station', $request->stations);
            return $query;
        });
        $stations = $request->stations;
        if ($request->limited) {
            foreach ($stations as $index => $station) {
                if ($mstation = $this->model::where('station', $station)->orderBy('observation_at', 'desc')->first())
                    $stations[$index] = $mstation->id;
                else
                    unset($stations[$index]);
            }
            $model->whereIn('id', $stations);
        }
        $model->orderBy('observation_at', 'desc');
    }
}
