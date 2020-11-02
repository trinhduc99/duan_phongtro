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
});

