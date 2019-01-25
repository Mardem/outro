<?php

namespace App\Providers;

use App\Models\Gerenciamento;
use App\Observers\AtualizarDesignacao;
use App\Observers\NovaNotificacao;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\ServiceProvider;
use App\Models\Socio;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        Socio::observe(AtualizarDesignacao::class);
        Gerenciamento::observe(NovaNotificacao::class);

        Schema::defaultStringLength(191);
    }

    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }
}
