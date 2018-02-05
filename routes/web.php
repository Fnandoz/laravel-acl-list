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

/*
* Rotas para CRUD da lista
*/
Route::get('/home/lista', 'ListaController@index');
Route::match(['get', 'post'], '/home/lista/new', 'ListaController@novo')->middleware('can:create,view');
Route::get('/home/lista/{id}', 'ListaController@item');
Route::match(['get', 'post'], '/home/lista/{id}/atualizar', 'ListaController@atualizar');
Route::post('/home/lista/apaga', 'ListaController@apaga');
