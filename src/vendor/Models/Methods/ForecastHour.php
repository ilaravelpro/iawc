<?php
/**
 * Author: Amir Hossein Jahani | iAmir.net
 * Last modified: 11/28/20, 10:40 AM
 * Copyright (c) 2021. Powered by iamir.net
 */

namespace iLaravel\iAWC\Vendor\Models\Methods;


trait ForecastHour
{
    public function forecast_hour()
    {
        return (int)$this->record->roughly_the_number_of_hours_between_the_issue_time_and_the_valid_time;
    }
}
