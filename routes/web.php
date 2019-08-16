<?php
Route::get('/', 'HomeController@index')->name('index');

Auth::routes();

Route::group(['middleware' => ['auth']], function () {
    Route::group(['prefix' => 'admin', 'middleware' => 'admin'], function () {
        Route::get('', 'Admin\AdminController@index')->name('admin.index');

        Route::group(['prefix' => 'school'], function () {
            Route::get('', 'Admin\SchoolController@index')->name('admin.school.index');
            Route::get('single/{school}', 'Admin\SchoolController@single')->name('admin.school.single');

            Route::get('create', 'Admin\SchoolController@create')->name('admin.school.create');
            Route::post('create', 'Admin\SchoolController@store')->name('admin.school.create');

            Route::get('edit/{school}', 'Admin\SchoolController@edit')->name('admin.school.edit');
            Route::post('edit/{school}', 'Admin\SchoolController@update')->name('admin.school.edit');

            Route::post('delete/{school}', 'Admin\SchoolController@delete')->name('admin.school.delete');
        });

        Route::group(['prefix' => 'group'], function () {
            Route::get('single/{group}', 'Admin\GroupController@single')->name('admin.group.single');

            Route::get('create/{school}', 'Admin\GroupController@create')->name('admin.group.create');
            Route::post('create/{school}', 'Admin\GroupController@store')->name('admin.group.create');     
            
            Route::get('edit/{group}', 'Admin\GroupController@edit')->name('admin.group.edit');
            Route::post('edit/{group}', 'Admin\GroupController@update')->name('admin.group.edit');
        
            Route::post('delete/{group}', 'Admin\GroupController@delete')->name('admin.group.delete');
        });
    });
});