<?php

use Illuminate\Http\Request;

Route::group(['prefix' => 'auth'], function () {
    Route::post('login', 'Api\AuthController@login');
    Route::post('logout', 'Api\AuthController@logout');
    Route::post('me', 'Api\AuthController@me');
});

Route::group(['prefix' => 'role'], function ($router) {
    Route::get('', 'Api\RoleController@index');
    Route::get('single/{role}', 'Api\RoleController@single');
});

Route::group(['prefix' => 'group'], function ($router) {
    Route::get('', 'Api\GroupController@index');
    Route::get('school/{school}', 'Api\GroupController@school');
    Route::get('single/{group}', 'Api\GroupController@school');
});

Route::group(['prefix' => 'school'], function ($router) {
    Route::get('', 'Api\SchoolController@index');
    Route::get('single/{school}', 'Api\SchoolController@single');
    Route::get('group/{school}', 'Api\SchoolController@group');

});

Route::group(['prefix' => 'user'], function () {
    Route::post('create', 'Api\UserController@create');
    Route::get('group/{group}', 'Api\UserController@group');
    Route::post('delete/{user}', 'Api\UserController@delete');    
});