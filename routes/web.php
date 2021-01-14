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


//Routes Musicos
Route::get('/musicos' , 'App\Http\Controllers\MusicosController@index')
    ->name('musicos.index');

Route::get('/musicos/{id}/show' , 'App\Http\Controllers\MusicosController@show')
    ->name('musicos.show');

Route::get('/musicos/create', 'App\Http\Controllers\MusicosController@create')
    ->name('musicos.create');

Route::post('/musicos/store','App\Http\Controllers\MusicosController@store')
    ->name('musicos.store');

Route::get('/musicos/{id}/edit', 'App\Http\Controllers\MusicosController@edit')
    ->name('musicos.edit');

Route::patch('/musicos/{id}', 'App\Http\Controllers\MusicosController@update')
    ->name('musicos.update');

Route::get('/musicos/{id}/delete', 'App\Http\Controllers\MusicosController@delete')
    ->name('musicos.delete');

Route::delete('/musicos', 'App\Http\Controllers\MusicosController@destroy')
    ->name('musicos.destroy');







//Routes Musicas
Route::get('/musicas' , 'App\Http\Controllers\MusicasController@index')
    ->name('musicas.index');

Route::get('/musicas/{id}/show' , 'App\Http\Controllers\MusicasController@show')
    ->name('musicas.show');

Route::get('/musicas/create', 'App\Http\Controllers\MusicasController@create')
    ->name('musicas.create');

Route::post('/musicas/store','App\Http\Controllers\MusicasController@store')
    ->name('musicas.store');

Route::get('/musicas/{id}/edit', 'App\Http\Controllers\MusicasController@edit')
    ->name('musicas.edit');

Route::patch('/musicas/{id}', 'App\Http\Controllers\MusicasController@update')
    ->name('musicas.update');

Route::get('/musicas/{id}/delete', 'App\Http\Controllers\MusicasController@delete')
    ->name('musicas.delete');

Route::delete('/musicas', 'App\Http\Controllers\MusicasController@destroy')
    ->name('musicas.destroy');





//Routes Albuns
Route::get('/albuns' , 'App\Http\Controllers\AlbunsController@index')
    ->name('albuns.index');

Route::get('/albuns/{id}/show' , 'App\Http\Controllers\AlbunsController@show')
    ->name('albuns.show');

Route::get('/albuns/create', 'App\Http\Controllers\AlbunsController@create')
    ->name('albuns.create');

Route::post('/albuns/store','App\Http\Controllers\AlbunsController@store')
    ->name('albuns.store');

Route::get('/albuns/{id}/edit', 'App\Http\Controllers\AlbunsController@edit')
    ->name('albuns.edit');

Route::patch('/albuns/{id}', 'App\Http\Controllers\AlbunsController@update')
    ->name('albuns.update');

Route::get('/albuns/{id}/delete', 'App\Http\Controllers\AlbunsController@delete')
    ->name('albuns.delete');

Route::delete('/albuns', 'App\Http\Controllers\AlbunsController@destroy')
    ->name('albuns.destroy');






//Routes generos
Route::get('/generos' , 'App\Http\Controllers\GenerosController@index')
    ->name('generos.index');

Route::get('/generos/{id}/show' , 'App\Http\Controllers\GenerosController@show')
    ->name('generos.show');

Route::get('/generos/create', 'App\Http\Controllers\GenerosController@create')
    ->name('generos.create');

Route::post('/generos/store','App\Http\Controllers\GenerosController@store')
    ->name('generos.store');


Route::get('/generos/{id}/edit', 'App\Http\Controllers\GenerosController@edit')
    ->name('generos.edit');

Route::patch('/generos/{id}', 'App\Http\Controllers\GenerosController@update')
    ->name('generos.update');


Route::get('/generos/{id}/delete', 'App\Http\Controllers\GenerosController@delete')
    ->name('generos.delete');

Route::delete('/generos', 'App\Http\Controllers\GenerosController@destroy')
    ->name('generos.destroy');


