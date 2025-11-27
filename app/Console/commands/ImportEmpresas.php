<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Services\EmpresaService;
use Maatwebsite\Excel\Facades\Excel;
use App\Imports\EmpresaImport;

class ImportEmpresas extends Command
{
    protected $signature = 'import:empresas {file}';
    protected $description = 'Importar empresas con barra de progreso';

    public function handle()
    {
        $file = $this->argument('file');

        $this->info("Importando empresas…");

        // creamos una progress bar para fila/desconocida
        $bar = $this->output->createProgressBar();
        $bar->start();

        // callback que ejecuta una vez por fila
        $advance = function () use ($bar) {
            $bar->advance();
        };

        Excel::import(new EmpresaImport($advance), $file);

        $bar->finish();
        $this->info("\nImportación completada.");
    }

}
