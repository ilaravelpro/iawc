<?php

Route::namespace('v1')->prefix('v1/awx')/*->middleware('auth:api')*/->group(function () {
    Route::get('handel/{service?}', function ($service = null) {
        return (new \iLaravel\iAWC\Vendor\AviationWeather($service, request()->all()))->get();
    });
    Route::apiResource('metars', 'AWCMetarController', ['as' => 'api.iawc.metars','except' => ['store','update','destroy']]);
    Route::apiResource('tafs', 'AWCTafController', ['as' => 'api.iawc.tafs','except' => ['store','update','destroy']]);
});
