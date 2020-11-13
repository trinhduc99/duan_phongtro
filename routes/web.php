<?php

use Illuminate\Support\Facades\Route;

Auth::routes();

Route::get('/admin', function () {
    return view('layouts.admin');
});
Route::get('/', 'FrontEndController@index');
Route::post('get-districts-by-provinces/{id}', 'FrontEndController@getDistrict');
Route::post('get-wards-by-districts/{id}', 'FrontEndController@getWard');
