<?php
/**
 * Created by PhpStorm.
 * User: gilsonmello
 * Date: 5/26/18
 * Time: 1:39 AM
 */
Route::resource('users', 'UserController', [
    'names' => [
        'index' => 'mobile.users.index',
        'create' => 'mobile.users.create',
        'store' => 'mobile.users.store',
        'edit' => 'mobile.users.edit',
        'update' => 'mobile.users.update',
        'destroy' => 'mobile.users.destroy'
    ],
    'except' => [
        'show'
    ]
]);