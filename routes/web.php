<?php

use Illuminate\Support\Facades\Route;


Route::get('/admin', function () {
    return view('layouts.admin');
});
Route::get('/', 'FrontEndController@index');
Route::post('get-districts-by-provinces/{id}', 'FrontEndController@getDistrict');
Route::post('get-wards-by-districts/{id}', 'FrontEndController@getWard');
Route::prefix('/quan-ly')->group(function () {
    Route::prefix('/dang-tin-moi')->group(function () {
        Route::get('/index', 'PostController@index');
    });
});
Route::get('/search', 'PostController@searchPost');

Route::get('/temp', 'PostController@temp');
Route::prefix('post')->group(function () {
    Route::get('/temp', 'PostController@temp');

    Route::prefix('my-post')->group(function () {
        Route::get('', 'PostController@myPost');

        Route::get('/update', 'PostController@myPost');
        Route::get('/update-status', 'PostController@changeStatusPost');
    });
    /*
     * Delete must is post method
    */
    Route::get('/delete', 'PostController@delete');
    Route::resource('/', 'PostController');
});
Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
