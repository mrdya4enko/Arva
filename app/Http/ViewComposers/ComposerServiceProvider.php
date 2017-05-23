<?php
/**
 * Created by PhpStorm.
 * User: ydy
 * Date: 5/22/17
 * Time: 12:34 PM
 */

namespace App\Http\ViewComposers;

use Illuminate\Support\Facades\View;
use Illuminate\Support\ServiceProvider;

class ComposerServiceProvider extends ServiceProvider
{
    /**
     * Register bindings in the container.
     *
     * @return void
     */
    public function boot()
    {

        // Using class based composers...
        View::composer(
            'home.content_right_column_home', 'App\Http\ViewComposers\ProfileComposer'
        );
        View::composer(
            'home.content_left_column_home', 'App\Http\ViewComposers\LeftColumnComposer'
        );

    }

    /**
     * Register the service provider.
     *
     * @return void
     */
    public function register()
    {
        //
    }
}