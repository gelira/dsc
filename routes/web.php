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

#Route::get('/', function () {
#    return view('welcome');
#});

Route::get('/', function(){
    return view('home.login');
})->name('home');

Route::get('/registrar', function(){
    return view('home.registro');
})->name('registrar');

Route::post('/criar', 'UsuarioController@criar')->name('criar');

Route::post('/entrar', 'UsuarioController@entrar')->name('entrar');

Route::get('/sair', 'UsuarioController@sair')->name('sair');

Route::get('/listar', 'ItemController@listar')->name('listar');