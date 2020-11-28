<?php


namespace iLaravel\iAWC\Vendor\Models\Methods;


trait FlightType
{
    public function flight_type() {
        $type = 'OTHER';
        $re = '/\/FL[A-Z]*\/T|FL[A-Z]* T/';
        preg_match($re, $this->text(), $matches, PREG_OFFSET_CAPTURE, 0);
        if (count($matches) > 0){
            $type = ltrim(str_replace(['/','T'], '',$matches[0][0]), '/FL|F/');
        }
        return $type;
    }
}
