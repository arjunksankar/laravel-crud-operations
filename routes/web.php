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


Route::get('ice-cream/create','IceCreamController@create')->name('ice-cream.create');
Route::post('ice-cream/store','IceCreamController@store')->name('ice-cream.store');
Route::get('/','IceCreamController@index')->name('ice-creams.list');
Route::get('ice-cream/{ice_cream}/edit','IceCreamController@edit')->name('ice-cream.edit');
Route::put('ice-cream/{ice_cream}/update','IceCreamController@update')->name('ice-cream.update');
Route::get('ice-cream/{ice_cream}/show','IceCreamController@show')->name('ice-cream.show');
Route::delete('ice-cream/destroy/{ice_cream}','IceCreamController@destroy')->name('ice-cream.destroy');

