<?php
/**
 * Author: Amir Hossein Jahani | iAmir.net
 * Last modified: 11/28/20, 2:55 PM
 * Copyright (c) 2021. Powered by iamir.net
 */

namespace iLaravel\iAWC\Vendor;


use Cache;
use SimpleXMLElement;
use GuzzleHttp\Client;

class AviationWeather
{
    use Methods\Construct,
        Methods\Request,
        Methods\Variables;

    public function get()
    {
        if ($this->data) return $this->exportData($this->data);
        $xml_data = $this->request();
        if (!$xml_data) return [];
        $xml = new SimpleXMLElement($xml_data);
        if (((int)count((array)$xml->errors)) > 0 || ((int)$xml->data->attributes()->num_results) == 0) return [];
        $this->data = $this->modal($xml, false, true);
        return ['data' => $this->data];
    }

    private function modal($response, $single = false, $toArray = false)
    {
        $modal = $this->modals[$this->params['dataSource']];
        $clouds = ((array)$response->data)[$this->sources[$this->params['dataSource']]];
        $cloud_array = collect();
        $uniqs = [];
        foreach ($clouds as $cloud) {
            switch ($this->params['format']){
                case 'model':
                    $cloud_array->push((new $modal($cloud))->toModel());
                    break;
                case 'gjson':
                    $cloud_array->push((new $modal($cloud))->toGeoJson());
                    break;
                default:
                    $cloud_array->push((new $modal($cloud))->toArray());
                    break;
            }
            $uniqs[] = (new $modal($cloud))->id();
        }
        if ($single)
            return $single;
        return $cloud_array;
    }
}
