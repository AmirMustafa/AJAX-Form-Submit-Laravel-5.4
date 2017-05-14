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

Route::get('/', function () {
    return view('welcome');
});
/*Route::get('/', 'PhotoController@index');*/
/*Route::get('/user', 'PhotoController@index');*/

Route::get('/user', [
    'uses' => 'PhotoController@index',
    'as' => '/user'
]);

Route::get('/create', 'PhotoController@create');
Route::get('store', 'PhotoController@store');
