<?php
/**
 * Created by PhpStorm.
 * User: gilsonmello
 * Date: 5/26/18
 * Time: 1:39 AM
 */
Route::resource('instalments', 'InstalmentController', [
    'names' => [
        'index' => 'mobile.instalments.index',
        'create' => 'mobile.instalments.create',
        'store' => 'mobile.instalments.store',
        'edit' => 'mobile.instalments.edit',
        'update' => 'mobile.instalments.update',
        'destroy' => 'mobile.instalments.destroy'
    ],
    'except' => [
        'show'
    ]
]);

Route::post('instalments/pay/{id}', 'InstalmentController@pay')
    ->name('mobile.instalments.pay');