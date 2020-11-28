<?php

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
