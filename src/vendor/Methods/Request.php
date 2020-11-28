<?php
namespace iLaravel\iAWC\Vendor\Methods;

use GuzzleHttp\Client;

trait Request
{
    private function request($params = [])
    {
        $params = count($params) > 0 ? array_merge($this->params, $params) : $this->params;
        $params['format'] = "xml";
        unset($params['page']);
        unset($params['per_page']);
        try {
            $client = new Client(['verify' => false]);
            $result = $client->get($this->service_url, [
                'query' => $params
            ]);
            $content = $result->getBody()->getContents();
            $statuscode = $result->getStatusCode();
            if (200 !== $statuscode)
                throw new \Exception("Unable to retrieve weather data, http code " . $statuscode);
        } catch (\Exception $e) {
            throw new \Exception($e);
        }
        return $content;
    }
}
