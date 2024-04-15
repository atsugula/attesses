<?php

namespace Atsu\Atesses;

use Illuminate\Support\ServiceProvider;

class AttessesServiceProvider extends ServiceProvider
{
    public function boot()
    {
        if ($this->app->runningInConsole()) {
            $this->commands([
                \Atsu\Attesses\Console\Commands\InstallCommand::class,
            ]);
        }
        // Publicar el archivo atesses.php en la carpeta config
        // $this->publishes([
        //     __DIR__.'/config/atesses.php' => config_path('atesses.php'),
        // ], 'config');
    }

    public function register()
    {
        // Fusionar la configuración predeterminada con la publicada
        $this->mergeConfigFrom(
            __DIR__ . '/config/config.php', 'atesses'
        );
    }
}