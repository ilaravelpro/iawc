<?php
/**
 * Author: Amir Hossein Jahani | iAmir.net
 * Last modified: 2/4/21, 11:26 PM
 * Copyright (c) 2021. Powered by iamir.net
 */

Route::namespace('v1')->prefix('v1/awx')->middleware('auth:api')->group(function () {
    /*Route::get('handel/{service?}', function ($service = null) {
        return (new \iLaravel\iAWC\Vendor\AviationWeather($service, request()->all()))->get();
    });*/
    Route::apiResource('metars', 'AWCMetarController', ['as' => 'api.awx.metars','except' => ['store','update','destroy']]);
    Route::apiResource('tafs', 'AWCTafController', ['as' => 'api.awx.tafs','except' => ['store','update','destroy']]);
});
