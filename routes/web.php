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


Route::get('/musicos' , 'App\Http\Controllers\MusicosController@index')->name('musicos.index');

Route::get('/musicas' , 'App\Http\Controllers\MusicasController@index')->name('musicas.index');

Route::get('/albuns' , 'App\Http\Controllers\AlbunsController@index')->name('albuns.index');

Route::get('/generos' , 'App\Http\Controllers\GenerosController@index')->name('generos.index');

Route::get('/musicos/{id}/show' , 'App\Http\Controllers\MusicosController@show')->name('musicos.show');

Route::get('/musicas/{id}/show' , 'App\Http\Controllers\MusicasController@show')->name('musicas.show');

Route::get('/albuns/{id}/show' , 'App\Http\Controllers\AlbunsController@show')->name('albuns.show');

Route::get('/generos/{id}/show' , 'App\Http\Controllers\GenerosController@show')->name('generos.show');