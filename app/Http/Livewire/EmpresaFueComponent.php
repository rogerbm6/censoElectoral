<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Empresa;

class EmpresaFueComponent extends EmpresaComponent
{
    public $buscar = '';
    public $empresa = null;          // Datos principales
    public $epigrafes = [];          // Lista múltiples
    public $nombre_epigrafes = [];   // Lista múltiples
    public $categorias_grupo = [];   // Lista múltiples

    public function render()
    {
        return view('livewire.empresa-fue-component');
    }
}
