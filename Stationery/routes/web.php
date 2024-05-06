<?php

use Illuminate\Support\Facades\Route;

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


Route::get('/Stationeries','App\Http\Controllers\StationeryController@index')->name('Stationeries.index');

Route::get('/Stationeries/create','App\Http\Controllers\StationeryController@create')->name('Stationeries.create');

Route::post('/Stationeries/store','App\Http\Controllers\StationeryController@store')->name('Stationeries.store');

Route::get('/Stationeries/edit/{stationery}','App\Http\Controllers\StationeryController@edit')->name('Stationeries.edit');

Route::put('/Stationeries/edit/{stationery}','App\Http\Controllers\StationeryController@update')->name('Stationeries.update');

Route::get('/Stationeries/show/{stationery}','App\Http\Controllers\StationeryController@show')->name('Stationeries.show');


Route::delete('/Stationeries/{stationery}','App\Http\Controllers\StationeryController@destroy')->name('Stationeries.destroy');