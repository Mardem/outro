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

Route::group(['middleware' => ['auth'], 'prefix' => 'admin', 'namespace' => 'Admin'], function () {
    Route::get('/home', 'AdminController@index')->name('admin');
    Route::get('/token', 'AdminController@token')->name('token');
    Route::post('/update-token', 'AdminController@updateToken')->name('updateToken');

    # Pesquisas
    Route::post('/pesquisa', 'PesquisasController@search')->name('search');

    Route::group(['middleware' => ['can:admin']], function () {
        Route::resource('/controle/usuario', 'UsuariosController');
        Route::resource('/gerenciamento/relatorio', 'RelatorioController');
    });

    Route::resource('/controle/socios', 'SociosController');
    Route::post('/controle/socios/pesquisa', 'SociosController@searchPartner')->name('searchPartner');
    Route::put('/controle/socios/observacao/{socio}', 'SociosController@observation')->name('saveObservation');

    Route::resource('/gerenciamento/ocorrencia', 'GerenciamentosController');
    Route::resource('gerenciamento/mensagem', 'Partials\MessagersController');

    Route::post('/gerenciamento/relatorio', 'PesquisasController@searchRelatorio')->name('searchRelatorio');

    Route::resource('/contato/email', 'EmailController');
    Route::resource('/contato/sms', 'MessagesController');
});