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
    Route::get('liquor', 'Admin\LiquorController@index')->name('admin.liquor');
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
    Route::get('knob', 'Admin\KnobController@index')->name('admin.knob');
    Route::get('knob/shihan', 'Admin\KnobController@shihan');
    Route::get('knob/tezukuri', 'Admin\KnobController@tezukuri');
    Route::get('knob/edit', 'Admin\KnobController@edit'); 
    Route::post('knob/edit', 'Admin\KnobController@update'); 
    Route::get('knob/detail', 'Admin\KnobController@detail');
    Route::get('knob/delete', 'Admin\KnobController@delete');
    Route::get('izakaya/create', 'Admin\IzakayaController@add');
    Route::post('izakaya/create', 'Admin\IzakayaController@create');
    Route::get('izakaya', 'Admin\IzakayaController@index')->name('admin.izakaya');
    Route::get('izakaya/edit', 'Admin\IzakayaController@edit'); 
    Route::post('izakaya/edit', 'Admin\IzakayaController@update'); 
    Route::get('izakaya/delete', 'Admin\IzakayaController@delete');
    Route::get('izakaya/alone', 'Admin\IzakayaController@alone');
    Route::get('izakaya/others', 'Admin\IzakayaController@others');
    Route::get('izakaya/detail', 'Admin\IzakayaController@detail');
    // いいねボタン
    Route::get('liquor/detail/nice/{liquor}', 'Admin\NiceController@nice')->name('nice');
    Route::get('liquor/detail/unnice/{liquor}', 'Admin\NiceController@unnice')->name('unnice');
});
Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
Route::get('liquor', 'LiquorController@index')->name('liquor');
Route::get('liquor/beer', 'LiquorController@beer');
Route::get('liquor/wine', 'LiquorController@wine');
Route::get('liquor/whiskey', 'LiquorController@whiskey');
Route::get('liquor/shochu', 'LiquorController@shochu');
Route::get('liquor/sake', 'LiquorController@sake');
Route::get('liquor/sour', 'LiquorController@sour');
Route::get('liquor/highball', 'LiquorController@highball');
Route::get('liquor/others', 'LiquorController@others');
Route::get('liquor/detail', 'LiquorController@detail');
Route::get('izakaya', 'IzakayaController@index')->name('izakaya');
Route::get('izakaya/alone', 'IzakayaController@alone');
Route::get('izakaya/others', 'IzakayaController@others');
Route::get('izakaya/detail', 'IzakayaController@detail');
Route::get('knob', 'KnobController@index')->name('knob');
Route::get('knob/shihan', 'KnobController@shihan');
Route::get('knob/tezukuri', 'KnobController@tezukuri');
Route::get('knob/detail', 'KnobController@detail');
// いいねボタン
// Route::get('/liquor/nice/{liquor}', 'NiceController@nice')->name('nice');
// Route::get('/liquor/unnice/{liquor}', 'NiceController@unnice')->name('unnice');

