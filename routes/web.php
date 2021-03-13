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

// root
Route::get('/',function(){
    return view('index');
});

Route:: get   ('crud','App\Http\Controllers\CrudController@index')         ->name('crud');
Route:: get   ('crud/tambah','App\Http\Controllers\CrudController@tambah') ->name('crud.tambah');
Route:: post  ('crud','App\Http\Controllers\CrudController@simpan')        ->name('crud.simpan');  
Route:: delete('crud/{id}','App\Http\Controllers\CrudController@delete')  ->name('crud.delete');
Route:: get   ('crud/{id}/edit','App\Http\Controllers\CrudController@edit')->name('crud.edit');
Route:: patch ('crud/{id}','App\Http\Controllers\CrudController@update')   ->name('crud.update');


    



