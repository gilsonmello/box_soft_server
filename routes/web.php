<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::group(['namespace' => 'Mobile'], function() {

    //Rota para login administrativo
    Route::group(['prefix' => 'mobile', 'middleware' => 'guest'], function() {
        require __DIR__ . '/Mobile/Auth.php';
    });


    Route::group(['prefix' => 'mobile', 'middleware' => 'has.permission'], function() {

        Route::get('/', function() {
            return redirect()->route('mobile.home');
        });
        Route::get('/home', 'HomeController@index')->name('mobile.home');
        require __DIR__ . '/Mobile/User.php';
        require __DIR__ . '/Mobile/Participant.php';
        require __DIR__ . '/Mobile/Award.php';
        require __DIR__ . '/Mobile/Box.php';
        require __DIR__ . '/Mobile/Instalment.php';
        require __DIR__ . '/Mobile/Profile.php';
    });
});
