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


Route::get('/cv_template', function(){
    return view('cvBuilder.index');
});
Route::get('/', function(){
    return view('cvBuilder.data_entry');
});
Route::post('/cv-store', 'CVBuilderController@store')->name('cv.store');
Route::get('/cv-download/{id}', 'CVBuilderController@show')->name('cv.download');
