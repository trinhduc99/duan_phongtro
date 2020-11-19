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


Route::prefix('admin')->group(function () {
    Route::prefix('posts')->group(function () {
       Route::get('/all-post', [
           'as' => 'admin.posts.all-post',
           'uses' => 'PostController@adminShowAllPost']);
       Route::get('/pending-post', [
           'as' => 'admin.posts.pending-post',
           'uses' => 'PostController@adminShowPendingPost'
       ]);
        Route::get('/approved-post', [
            'as' => 'admin.posts.approved-post',
            'uses' => 'PostController@adminShowApprovedPost'
        ]);
       Route::get('/denied-post', [
           'as' => 'admin.posts.denied-post',
           'uses' => 'PostController@adminShowDeniedPost'
       ]);
       Route::get('/violate-post', [
           'as' => 'admin.posts.violate-post',
           'uses' => 'PostController@adminShowViolatePost'
       ]);
    });
    Route::prefix('users')->group(function(){
        Route::get('/user',[
           'as' => 'admin.users.user',
           'uses' => 'UserController@adminGetAllUser'
        ]);
    });


});
Route::get('/post/{id}', 'PostController@getPost');