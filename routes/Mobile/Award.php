<?php
/**
 * Created by PhpStorm.
 * User: gilsonmello
 * Date: 5/26/18
 * Time: 1:39 AM
 */
Route::resource('awards', 'AwardController', [
    'names' => [
        'index' => 'mobile.awards.index',
        'create' => 'mobile.awards.create',
        'store' => 'mobile.awards.store',
        'edit' => 'mobile.awards.edit',
        'update' => 'mobile.awards.update',
        'destroy' => 'mobile.awards.destroy',
        'show' => 'mobile.awards.show'
    ]
]);