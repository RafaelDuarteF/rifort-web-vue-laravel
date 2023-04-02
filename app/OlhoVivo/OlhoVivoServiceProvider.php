<?php

namespace App\OlhoVivo;

use Illuminate\Support\ServiceProvider;
use App\OlhoVivo\src\OlhoVivo;

class OlhoVivoServiceProvider extends ServiceProvider
{
    public function register()
    {
        $this->app->bind('olhovivo', function () {
            return new OlhoVivo();
        });
    }
}
