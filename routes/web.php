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

Route::get('/', 'AppController@index')
    ->name('index');

Route::get('/task/{task}', 'AppController@show')
    ->name('show');

Route::get('/create', 'AppController@create')
    ->name('create');

Route::post('/', 'AppController@store')
    ->name('store');

Route::get('/edit-task/{task}', 'AppController@edit')
    ->name('edit');

Route::patch('/update/{task}', 'AppController@update')
    ->name('update');

Route::delete('delete/{task}', 'AppController@destroy')
    ->name('destroy');
