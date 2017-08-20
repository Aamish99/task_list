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


Route::get('/tasks', 'HomeController@tasks')->name('tasks');
Route::post('/tasks', 'HomeController@store');
Route::post('/task/delete/{id}', 'HomeController@delete');
Route::get('/task/edit/{id}', 'HomeController@edit');
Route::post('/tasks/update', 'HomeController@update');
