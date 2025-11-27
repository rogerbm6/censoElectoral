<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Empresa;

class EmpresaComponent extends Component
{
    public $buscar = '';
    public $empresa = null;          // Datos principales
    public $epigrafes = [];          // Lista múltiples
    public $nombre_epigrafes = [];   // Lista múltiples
    public $categorias_grupo = [];   // Lista múltiples

    public function updatedBuscar()
    {
        // Limitar a 10 caracteres
        $this->buscar = substr($this->buscar, 0, 10);

        // Hasta que no haya 8 → no buscar
        if (strlen($this->buscar) < 8) {
            $this->empresa = null;
            $this->epigrafes = [];
            $this->nombre_epigrafes = [];
            $this->categorias_grupo = [];
            return;
        }

        // Todas las filas del mismo NIF
        $registros = Empresa::where('nif', trim($this->buscar))->get();

        if ($registros->isEmpty()) {
            $this->empresa = null;
            return;
        }

        // Primer registro como datos principales
        $this->empresa = $registros->first();

        // Listas únicas
        $this->epigrafes = $registros->pluck('epigrafe')->unique()->values()->toArray();
        $this->nombre_epigrafes = $registros->pluck('nombre_epigrafe')->unique()->values()->toArray();
        $this->categorias_grupo = $registros->pluck('categoria_grupo')->unique()->values()->toArray();
    }

    public function render()
    {
        return view('livewire.empresa-component');
    }
}
