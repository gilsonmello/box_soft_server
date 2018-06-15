<?php
/**
 * Created by PhpStorm.
 * User: gilsonmello
 * Date: 6/1/18
 * Time: 4:06 AM
 */

Route::resource('auth', 'AuthController', [
    'names' => [
        'index' => 'mobile.auth.index',
        'create' => 'mobile.auth.create',
        'store' => 'mobile.auth.store',
        'edit' => 'mobile.auth.edit',
        'update' => 'mobile.auth.update',
        'destroy' => 'mobile.auth.destroy',
    ],
    'except' => [
        'show'
    ]
]);

Route::post('auth/login', 'AuthController@login')->name('mobile.auth.login');
Route::get('auth/logout', 'AuthController@logout')->name('mobile.auth.logout');