<?php

use Illuminate\Support\Facades\Route;

Route::prefix('quan-ly')->group(function () {

    Route::get('/', [
        'as' => 'profile.index',
        'uses' => 'ProfileController@index',
    ]);
    Route::get('/dang-tin-moi', [
        'as' => 'profile.create',
        'uses' => 'ProfileController@create',
    ]);
    Route::post('/get-districts-by-provinces/{id}', [
        'as' => 'profile.create.get-districts-by-provinces',
        'uses' => 'ProfileController@getDistrict',
    ]);
    Route::post('/get-wards-by-districts/{id}/{id2}', [
        'as' => 'profile.create.get-wards-by-districts',
        'uses' => 'ProfileController@getWard',
    ]);
    Route::post('/get-streets/{id}/{id2}', [
        'as' => 'profile.create.get-streets',
        'uses' => 'ProfileController@getStreet',
    ]);

});
