<?php
use Illuminate\Support\Facades\Route;

Route::prefix('admin')->group(function () {
    Route::prefix('categories')->group(function () {
        Route::get('/', [
            'as' => 'categories.index',
            'uses' => 'CategoryController@index',
        ]);
    });
    Route::prefix('post')->group(function () {
        Route::get('search', 'PostController@searchPost');
        Route::resource('/post', 'PostController');
    });


});

