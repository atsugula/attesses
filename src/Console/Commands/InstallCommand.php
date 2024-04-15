<?php

namespace Atsu\Attesses\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\Artisan;

class InstallCommand extends Command
{
    protected $signature = 'attesses:install';
    protected $description = 'Instala el paquete Atsu/Attesses';

    public function handle()
    {
        // Publicar archivo de configuración
        $this->publishConfig();

        // Crear migración
        $this->createMigration();
    }

    protected function publishConfig()
    {
        $this->call('vendor:publish', [
            '--provider' => 'Atsu\\Attesses\\AttessesServiceProvider',
            '--tag' => 'config'
        ]);
    }

    protected function createMigration()
    {
        $migrationFileName = date('Y_m_d_His') . '_create_attesses_table.php';
        $this->call('make:migration', [
            'name' => 'create_attesses_table',
            '--path' => 'database/migrations',
            '--create' => 'attesses'
        ]);
        $this->line("Migration created: {$migrationFileName}");
    }
}