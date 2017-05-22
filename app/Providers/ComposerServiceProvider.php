<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;

class ComposerServiceProvider extends ServiceProvider
{
    /**
     * Регистрация привязок в контейнере.
     *
     * @return void
     */
    public function boot()
    {
        // Использование построителей на основе класса...
        view()->composer(
            'content_right_column_home', 'App\Http\ViewComposers\NotificationsComposer'
        );
    }

    /**
     * Регистрация сервис-провайдера.
     *
     * @return void
     */
    /*public function register()
    {
        //
    }*/
}