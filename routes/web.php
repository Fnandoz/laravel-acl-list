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

Auth::routes();
Route::get('/home', 'HomeController@index')->name('home');

/**
  * Rotas para CRUD da lista
  */
Route::get('/home/lista', 'ListaController@index');
Route::post('/home/lista/novo', 'ListaController@novo')->middleware('can:create-list');
Route::get('/home/lista/{id}', 'ListaController@item')->middleware('can:read-list');
Route::get('/home/lista/{id}/atualizar', 'ListaController@atualizar')->middleware('can:update-list');
Route::post('/home/lista/atualizar', 'ListaController@atualizarItem')->middleware('can:update-list');
Route::post('/home/lista/apaga', 'ListaController@apaga')->middleware('can:delete-list');

/**
 * Rotas para CRUD de usuários
 */
Route::get('/home/usuario', 'UserController@index');
Route::get('/home/usuario/novo', 'UserController@novo');
Route::post('/home/usuario/salva', 'UserController@novoUsuario');
Route::get('/home/usuario/{id}', 'UserController@usuario');
Route::get('/home/usuario/{id}/atualizar', 'UserController@atualizar');
Route::post('/home/usuario/atualizar', 'UserController@atualizarUsuario');
Route::post('/home/usuario/apaga', 'UserController@apaga');
