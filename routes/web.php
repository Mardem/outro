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

Route::get('/', 'HomeController@home');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::group(['middleware' => ['auth'], 'prefix' => 'admin', 'namespace' => 'Admin'], function () {
    Route::get('me', 'Api\AuthController@getAuth');

    Route::get('/home', 'AdminController@index')->name('admin');
    Route::get('/token', 'AdminController@token')->name('token');
    Route::post('/update-token', 'AdminController@updateToken')->name('updateToken');

    # Pesquisas
    Route::post('/pesquisa', 'PesquisasController@search')->name('search');

    Route::group(['middleware' => ['can:admin']], function () {
        Route::resource('/controle/usuario', 'UsuariosController');
        Route::resource('/gerenciamento/relatorio', 'RelatorioController');
    });

    Route::group(['prefix' => 'controle'], function() {
        Route::resource('/socios', 'SociosController');
        Route::post('/socios/pesquisa', 'SociosController@searchPartner')->name('searchPartner');
        Route::put('/socios/observacao/{socio}', 'SociosController@observation')->name('saveObservation');
        Route::resource('/imagens', 'ImagesController');
        Route::get('/search-images', 'ImagesController@search')->name('imagens.search');
    });

    Route::group(['prefix' => 'gerenciamento'], function () {
        Route::resource('/ocorrencia', 'GerenciamentosController');
        Route::resource('mensagem', 'Partials\MessagersController');
        Route::post('/relatorio', 'PesquisasController@searchRelatorio')->name('searchRelatorio');
        Route::put('/update-notification/{notification}', 'GerenciamentosController@updateNotification')->name('updateNotification');
    });

    Route::group(['prefix' => 'contato'], function () {
        Route::resource('/email', 'EmailController');
        Route::resource('/sms', 'MessagesController');
    });
});