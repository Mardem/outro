<?php

namespace App\Providers;

use App\Models\Gerenciamento;
use App\Models\Image;
use App\Models\Socio;
use App\Observers\AtualizarDesignacao;
use App\Observers\DeleteImageRelation;
use App\Observers\NovaNotificacao;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\ServiceProvider;

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
        Image::observe(DeleteImageRelation::class);

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
