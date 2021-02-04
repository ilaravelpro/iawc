<?php

namespace iLaravel\iAWC\iApp\Http\Controllers\API\v1;

use iLaravel\Core\iApp\Http\Controllers\API\Controller;
use iLaravel\Core\iApp\Http\Controllers\API\Methods\Controller\Index;
use iLaravel\Core\iApp\Http\Controllers\API\Methods\Controller\Show;


class AWCMetarController extends Controller
{
    use Index,
        Show,
        AWCMetar\Rules,
        AWCMetar\RequestData,
        AWCMetar\FilterWithSTED,
        AWCMetar\Filters;
}
