<?php
/**
 * Author: Amir Hossein Jahani | iAmir.net
 * Last modified: 2/4/21, 11:23 PM
 * Copyright (c) 2021. Powered by iamir.net
 */

namespace iLaravel\iAWC\iApp\Http\Controllers\API\v1\AWCMetar;

use iLaravel\Core\iApp\Http\Requests\iLaravel as Request;

trait Rules
{
    public function rules(Request $request, $action, $parent = null)
    {
        $rules = [];
        switch ($action) {
            case 'update':
                $rules = [];
                break;
            case 'index':
                $rules = [
                    'startTime' => ['nullable', 'date_format:Y-m-d H:i:s'],
                    'endTime' => ['nullable', 'date_format:Y-m-d H:i:s'],
                    'stations.*' => ['nullable', 'string'],
                ];
                break;
        }
        return $rules;
    }
}
