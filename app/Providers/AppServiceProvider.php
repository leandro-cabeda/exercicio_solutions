<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;

/*
    Esse schem é caso de limitação de caracters dentro
    das migrations quando criar as colunas com strings,
    ai nisso ocorre erro, então coloca-se esse "use"
    e depois na função "boot" ali embaixo
    coloca-se também a configuração
    para ele aceitar e não correr mais erro
*/
use Illuminate\Support\Facades\Schema;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        Schema::defaultStringLength(191);
    }
}
