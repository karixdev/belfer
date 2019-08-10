<?php

use Illuminate\Http\Request;

Route::group(['prefix' => 'auth'], function () {
    Route::post('login', 'Api\AuthController@login');
    Route::post('logout', 'Api\AuthController@logout');
    Route::post('me', 'Api\AuthController@me');
    // Route::post('me', function () {
    //     return response()->json(['message' => 'hello world']);
    // });
});
