<?php
/**
 * Created by PhpStorm.
 * User: gilsonmello
 * Date: 5/26/18
 * Time: 1:39 AM
 */
Route::resource('boxes', 'BoxController', [
    'names' => [
        'index' => 'mobile.boxes.index',
        'create' => 'mobile.boxes.create',
        'store' => 'mobile.boxes.store',
        'edit' => 'mobile.boxes.edit',
        'update' => 'mobile.boxes.update',
        'destroy' => 'mobile.boxes.destroy',
    ],
    'except' => [
        'show'
    ]
]);

Route::match(['get', 'post'], 'boxes/participants/{id}', 'BoxController@participants')->name('mobile.boxes.participants');
Route::match(['get', 'post'], 'boxes/awards/{id}', 'BoxController@awards')
    ->name('mobile.boxes.awards');
Route::match(['get', 'post'], 'boxes/winner_of_month/{id}', 'BoxController@winnerOfMonth')
    ->name('mobile.boxes.winner_of_month');
Route::get('boxes/all_instalments_month/{id}', 'BoxController@allInstalmentsMonth')
    ->name('mobile.boxes.all_instalments_month');
