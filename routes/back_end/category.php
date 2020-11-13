<?php
use Illuminate\Support\Facades\Route;

Route::prefix('admin')->group(function () {
    Route::get('/', [
        'as' => 'admin.index',
        'uses' => 'AdminController@index',
    ]);
    Route::prefix('categories')->group(function () {
        Route::get('/', [
            'as' => 'categories.index',
            'uses' => 'CategoryController@index',
        ]);
    });
});

