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

Route::get('recetas/prueba', 'RecetaController@prueba')->name('recetas.prueba');

//Route::get('/', function () {
//    return view('welcome');
//});

Route::resource('recetas', 'RecetaController');
Route::get('recetas/{receta}/order', 'RecetaController@order')->name('recetas.order');
Route::get('recetas/{receta}/process', 'RecetaController@process')->name('recetas.process');
Route::get('recetas/{receta}/volume', 'RecetaController@volume')->name('recetas.volume');
Route::get('recetas/{receta}/lotes/{lote?}', 'RecetaController@lotes')->name('recetas.lotes');
Route::get('recetas/{receta}/calculos/{lote?}', 'RecetaController@calculos')->name('recetas.calculos');

Route::resource('lotes', 'RecetaController');

