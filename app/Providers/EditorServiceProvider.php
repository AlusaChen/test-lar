<?php

namespace App\Providers;

use App\Libraries\Editor;
use Illuminate\Support\ServiceProvider;

class EditorServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }

    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->singleton('Editor', function ($app) {
            $editor = $app['config']['editor.driver'];
            return new Editor($editor);
        });
    }
}
