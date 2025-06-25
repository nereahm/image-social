<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;

class FormatTimeServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     */
    public function register(): void
    {
        require_once app_path() . '/Helpers/FormatTime.php';//cargo el Helpers donde app_path seria la ruta el fichero fisico de la aplicacion y esto /Helpers/FormatTime.php seria la clase q necesito
    }

    /**
     * Bootstrap services.
     */
    public function boot(): void
    {
        //
    }
}
