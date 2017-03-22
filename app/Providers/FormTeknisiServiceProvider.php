<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\View;
use App\Http\Model\Teknisi;

class FormTeknisiServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap the application services.
     *
     * @return void
     */

   

    public function boot()
    {
        View::composer('teknisi.form', function ($view) {
            $view->with('teknisi_list',  $this->teknisi->all()->sortBy('nit'));
        });
    }

    /**
     * Register the application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }
}
