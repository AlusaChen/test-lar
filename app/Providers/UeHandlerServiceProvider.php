<?php namespace App\Providers;

use App\Libraries\UeHandler;
use Illuminate\Support\ServiceProvider;


class UeHandlerServiceProvider extends ServiceProvider
{
    public function register()
    {
        $this->app->bind('UeHandler', function ($app) {
            return new UeHandler();
        });
    }
}