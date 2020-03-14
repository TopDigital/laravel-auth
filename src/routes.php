<?php

Route::group([
    'namespace' => 'TopDigital\Auth\Http\Controllers',
    'middleware' => ['api'],
    'prefix' => 'api'
], function () {
    Route::options('{all}', function(){})->where('all', '.*');

    Route::middleware('oauth.check-client')->post('/login', 'AuthController@login');
});

Route::group([
    'namespace' => 'TopDigital\Auth\Http\Controllers',
    'middleware' => ['api', 'auth:api'],
    'prefix' => 'api'
], function () {

    Route::get('/user', 'AuthController@view');
    Route::get('/user/logout', 'AuthController@logout');
    Route::put('/user/change-password', 'AuthController@changePassword');

    Route::resource('users', 'UsersController')->only(['index', 'store', 'update', 'destroy']);
});
