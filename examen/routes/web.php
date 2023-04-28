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

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');


Route::resource('tipos', TipoController::class);

//ruta para añadir nuevo producto
Route::post('/home', 'HomeController@create')->name('home');
//ruta para modificar nuevo producto
Route::post("/home", "HomeController@update")-> name('home');
//ruta para eliminar para un producto
Route::post("/home-{id}", "HomeController@destroy")-> name('home');
