<?php
/**
 * Author: Amir Hossein Jahani | iAmir.net
 * Last modified: 11/28/20, 3:48 PM
 * Copyright (c) 2021. Powered by iamir.net
 */

namespace iLaravel\iAWC\Vendor\Methods;


trait Construct
{
    public function __construct($source = "metars", $params = [])
    {
        if ($source) $this->params['dataSource'] = $source;
        if (is_array($params)) {
            $this->params = array_merge($this->params, $params);
        }elseif (preg_match('/^[a-zA-Z]{4}$/', $params))
            $this->params['stationString'] = strtoupper($params);
    }
}
