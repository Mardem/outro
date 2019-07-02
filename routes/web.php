<?php
use App\Models\SociosCheque;

Route::get('/teste', function () {
    $socios = SociosCheque::all();

    foreach ($socios as $socio) {
        $socio->telefone = str_replace('(', ',(', $socio->telefone);
        $socio->save();
    }

    return $socios->telefone;
});

Route::get('/', 'HomeController@home');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::group(['middleware' => ['auth'], 'prefix' => 'admin', 'namespace' => 'Admin'], function () {
    Route::get('me', 'Api\AuthController@getAuth');

    Route::get('/recibos', 'ReceiptController@index')->name('receipt.index');
    Route::post('/recibos-insert-log', 'ReceiptController@insertLog')->name('receipt.insertLog');
    Route::get('/recibos/primeira-etapa', function () {
        return view('admin.recibos.primeira-etapa');
    });
    Route::get('/recibos/segunda-etapa', function () {
        return view('admin.recibos.segunda-etapa');
    });
    Route::get('/recibos/primeira-e-segunda-etapa', function () {
        return view('admin.recibos.primeira-e-segunda-etapa');
    });
    Route::get('/recibos/edital-de-vendas', function () {
        return view('admin.recibos.edital-de-vendas');
    });
    Route::get('/recibos/termo-de-cancelamento', function () {
        return view('admin.recibos.termo-de-cancelamento');
    });

    Route::get('/home', 'AdminController@index')->name('admin');
    Route::get('/token', 'AdminController@token')->name('token');
    Route::post('/update-token', 'AdminController@updateToken')->name('updateToken');

    # Pesquisas
    Route::post('/pesquisa', 'PesquisasController@search')->name('search');

    Route::group(['middleware' => ['can:admin']], function () {
        Route::resource('/controle/usuario', 'UsuariosController');
        Route::resource('/gerenciamento/relatorio', 'RelatorioController');
        Route::group(['prefix' => 'controle'], function () {
            Route::resource('/imagens', 'ImagesController');
            Route::get('/search-images', 'ImagesController@search')->name('imagens.search');
        });
    });

    Route::group(['prefix' => 'controle'], function () {
        Route::get('/socios/pesquisa', 'Search\PartnerController')->name('searchPartner');
        Route::resource('/socios', 'SociosController');
        Route::put('/socios/observacao/{socio}', 'SociosController@observation')->name('saveObservation');

        Route::get('/sociosCheque/pesquisa', 'Search\SocioChequeSearchController')->name('searchSocioCheque');
        Route::resource('/sociosCheque', 'SociosChequeController');
        Route::put('/sociosCheque/observacao/{socioCheque}', 'SociosChequeController@observation')->name('saveObservationCheque');
    });

    Route::group(['prefix' => 'gerenciamento'], function () {
        Route::resource('/ocorrencia', 'GerenciamentosController');
        Route::resource('mensagem', 'Partials\MessagersController');
        Route::post('/relatorio', 'PesquisasController@searchRelatorio')->name('searchRelatorio');
        Route::put('/update-notification/{notification}', 'GerenciamentosController@updateNotification')->name('updateNotification');
    });

    Route::namespace('Single')->name('direct.')->group(function () {
        Route::get('ocurrency-direct-create', 'OccurrencyDirectController')->name('occurrency.index');

        Route::namespace('Partner')->group(function () {
            Route::post('partner-change-status/{partner}', 'PartnerChangeStatusController')->name('partner-change-status');
        });
    });

    Route::group(['prefix' => 'contato'], function () {
        Route::resource('/email', 'EmailController');
        Route::resource('/sms', 'MessagesController');
    });
});
