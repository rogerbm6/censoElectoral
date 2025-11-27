<?php

namespace App\Imports;

use App\Models\Empresa;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;

class EmpresaImport implements ToModel, WithHeadingRow
{
    /**
     * @param array $row
     *
     * @return \Illuminate\Database\Eloquent\Model|null
     */

    protected $advance;

    public function __construct(callable $advance)
    {
        $this->advance = $advance;
    }


    public function model(array $row)
    {

        // avanza la barra desde el import
        ($this->advance)();

        return new Empresa([
            'grupo' => $row["grupo"],
            'nif' => $row["nif"],
            'nombre' => $row["nombre"],
            'ejercicio' => $row["ejercicio"],
            'categoria_grupo' => $row["numreferencia"],
            'inicio_actividad' => $row["inicio_actividad"],
            'epigrafe' => $row["codigoepigrafe"],
            'nombre_epigrafe' => $row["nombre_epigrafe"],
            'direccion' => $row["direccion"],
            'codigo_municipio_fiscal' => $row["codmunicipiofiscal"],
            'municipio_fiscal' => $row["municipio_fiscal"],
            'municipio_actual' => $row["municipio_actual"],
            'municipio' => $row["municipio"],
            'categoria_electoral_nombre' => $row["categoria"],
        ]);
    }
}