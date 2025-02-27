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

Route::get('', function() {
    return redirect()->route('fruits.index');
});

Route::name('fruits.')->prefix("fruits")->group(function() {
    Route::get("", "FruitController@index")->name("index");
});

Route::get('welcome', function () {
    return view('welcome');
});