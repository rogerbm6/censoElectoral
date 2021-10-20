<?php

namespace App\Imports;

use App\Models\Empresa;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;

class EmpresasImport implements ToModel, WithHeadingRow
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
        return new Empresa([
            'epigrafe'                      => $row["epigrafe"],
            'nombre_epigrafe'               => $row["nombre_epigrafe"],
            'nombre'                        => $row["nombre"],
            'nif'                           => $row["nif"],
            'direccion'                     => $row["direccion"],
            'grupo'                         => $row["grupo"],
            'categoria_grupo'               => $row["categoria_grupo"],
            'categoria_electoral'           => $row["categoria_electoral"],
            'categoria_electoral_nombre'    => $row["nombre_categoria_electoral"],
        ]);
    }
}