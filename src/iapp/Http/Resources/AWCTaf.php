<?php
/**
 * Author: Amir Hossein Jahani | iAmir.net
 * Last modified: 11/28/20, 4:32 PM
 * Copyright (c) 2021. Powered by iamir.net
 */

namespace iLaravel\iAWC\iApp\Http\Resources;

use iLaravel\Core\iApp\Http\Resources\Resource;

class AWCTaf extends Resource
{
    public function toArray($request)
    {
        $data = parent::toArray($request);
        $data['forecasts'] = Resource::collection($this->forecasts);
        return $data;
    }
}
