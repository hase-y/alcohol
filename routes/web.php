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

Route::group(['prefix' => 'admin', 'middleware' => 'auth'], function() {
    Route::get('liquor/create', 'Admin\LiquorController@add');
    Route::post('liquor/create', 'Admin\LiquorController@create');
    Route::get('liquor', 'Admin\LiquorController@index');
    Route::get('liquor/edit', 'Admin\LiquorController@edit'); 
    Route::post('liquor/edit', 'Admin\LiquorController@update'); 
    Route::get('liquor/delete', 'Admin\LiquorController@delete');
    Route::get('liquor/beer', 'Admin\LiquorController@beer');
    Route::get('liquor/wine', 'Admin\LiquorController@wine');
    Route::get('liquor/whiskey', 'Admin\LiquorController@whiskey');
    Route::get('liquor/shochu', 'Admin\LiquorController@shochu');
    Route::get('liquor/sake', 'Admin\LiquorController@sake');
    Route::get('liquor/sour', 'Admin\LiquorController@sour');
    Route::get('liquor/highball', 'Admin\LiquorController@highball');
    Route::get('liquor/others', 'Admin\LiquorController@others');
    Route::get('liquor/detail', 'Admin\LiquorController@detail');
    Route::get('knob/create', 'Admin\KnobController@add');
    Route::post('knob/create', 'Admin\KnobController@create');
    Route::get('knob', 'Admin\KnobController@index');
    Route::get('izakaya/create', 'Admin\IzakayaController@add');
    Route::post('izakaya/create', 'Admin\IzakayaController@create');
    Route::get('izakaya', 'Admin\IzakayaController@index');
    Route::get('izakaya/edit', 'Admin\IzakayaController@edit'); 
    Route::post('izakaya/edit', 'Admin\IzakayaController@update'); 
    Route::get('izakaya/delete', 'Admin\IzakayaController@delete');
    Route::get('izakaya/alone', 'Admin\IzakayaController@alone');
    Route::get('izakaya/others', 'Admin\IzakayaController@others');
    Route::get('izakaya/detail', 'Admin\IzakayaController@detail');
    
});
Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
// Route::get('/register', 'RegisterController@create');
Route::get('/liquor', 'LiquorController@index');
Route::get('liquor/beer', 'LiquorController@beer');
Route::get('liquor/wine', 'LiquorController@wine');
Route::get('liquor/whiskey', 'LiquorController@whiskey');
Route::get('liquor/shochu', 'LiquorController@shochu');
Route::get('liquor/sake', 'LiquorController@sake');
Route::get('liquor/sour', 'LiquorController@sour');
Route::get('liquor/highball', 'LiquorController@highball');
Route::get('liquor/others', 'LiquorController@others');
Route::get('liquor/detail', 'LiquorController@detail');
Route::get('/izakaya', 'IzakayaController@index');
Route::get('izakaya/alone', 'IzakayaController@alone');
Route::get('izakaya/others', 'IzakayaController@others');
Route::get('izakaya/detail', 'IzakayaController@detail');