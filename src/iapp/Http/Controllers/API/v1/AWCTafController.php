<?php

namespace iLaravel\iAWC\iApp\Http\Controllers\API\v1;

use iLaravel\Core\iApp\Http\Controllers\API\Controller;
use iLaravel\Core\iApp\Http\Controllers\API\Methods\Controller\Index;
use iLaravel\Core\iApp\Http\Controllers\API\Methods\Controller\Show;


class AWCTafController extends Controller
{
    use Index,
        Show,
        AWCMetar\Rules,
        AWCMetar\RequestData,
        AWCTaf\FilterWithSTED,
        AWCMetar\Filters;
}
