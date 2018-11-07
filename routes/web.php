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
    return redirect()->route('login');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::group(['middleware' => ['auth'],'prefix' => 'admin', 'namespace' => 'Admin'], function () {
    Route::get('/home', 'AdminController@index')->name('admin');

    # Pesquisas
    Route::post('/pesquisa', 'PesquisasController@search')->name('search');

    # Retornos Json
    Route::get('/users-json', 'PesquisasController@user')->name('jsonUsers');
    Route::get('/socios-json', 'PesquisasController@socio')->name('jsonSocios');

    Route::resource('/controle/usuario', 'UsuariosController');
    Route::resource('/controle/socios', 'SociosController');

    Route::resource('/gerenciamento/ocorrencia', 'GerenciamentosController');
    Route::resource('gerenciamento/mensagem', 'Partials\MessagersController');
    Route::resource('/gerenciamento/relatorio', 'RelatorioController');

    Route::post('/gerenciamento/relatorio', 'PesquisasController@searchRelatorio')->name('searchRelatorio');

    Route::resource('/contato/email', 'EmailController');
});