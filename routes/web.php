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
    return view('layouts.mainlayout');
});
Route::get('/testing123', function () {
    return view('layouts.app');
});
Auth::routes();

// Route::get('/home', 'HomeController@index')->name('home');

Route::group(['prefix'=>'backend','middleware'=>'auth','namespace'=>'admin'],function (){

    Route::get('/dashboard', 'DashboardController@index')->name('admin.dashboard');
    

});