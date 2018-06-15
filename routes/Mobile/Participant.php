<?php
/**
 * Created by PhpStorm.
 * User: gilsonmello
 * Date: 5/26/18
 * Time: 1:39 AM
 */
Route::resource('participants', 'ParticipantController', [
    'names' => [
        'index' => 'mobile.participants.index',
        'create' => 'mobile.participants.create',
        'store' => 'mobile.participants.store',
        'edit' => 'mobile.participants.edit',
        'update' => 'mobile.participants.update',
        'destroy' => 'mobile.participants.destroy',
        'show' => 'mobile.participants.show'
    ]
]);

Route::match([
    'get',
    'post'
], 'participants/instalments/{box_id}/{participant_id}', 'ParticipantController@instalments')
    ->name('mobile.participants.instalments');