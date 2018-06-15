<?php
/**
 * Created by PhpStorm.
 * User: gilsonmello
 * Date: 5/26/18
 * Time: 1:39 AM
 */
Route::resource('profile', 'ProfileController', [
    'names' => [
        'index' => 'mobile.profile.index',
        'create' => 'mobile.profile.create',
        'store' => 'mobile.profile.store',
        'edit' => 'mobile.profile.edit',
        'update' => 'mobile.profile.update',
        'destroy' => 'mobile.profile.destroy'
    ],
    'except' => [
        'show'
    ]
]);