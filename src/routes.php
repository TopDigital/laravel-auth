<?php

Route::group([
    'namespace' => 'TopDigital\Auth\Http\Controllers',
    'middleware' => ['api', 'cors'],
    'prefix' => 'api',
], function () {
    Route::options('{all}', function(){})->where('all', '.*');

    Route::middleware('oauth.check-client')->post('/login', 'AuthController@login');

    Route::middleware(['auth:api'])->group(function () {

        Route::get('/user', 'AuthController@view');
        Route::get('/user/logout', 'AuthController@logout');
        Route::put('/user/change-password', 'AuthController@changePassword');

    });
});
