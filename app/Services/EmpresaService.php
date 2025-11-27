<?php

namespace App\Services;

use Maatwebsite\Excel\Facades\Excel;
use App\Imports\EmpresaImport;

class EmpresaService
{
    public function importarEmpresas(string $ruta)
    {
        Excel::import(new EmpresaImport, $ruta);
    }
}
