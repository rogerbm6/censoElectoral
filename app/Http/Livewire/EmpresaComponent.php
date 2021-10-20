<?php

namespace App\Http\Livewire;

use Livewire\Component;

class EmpresaComponent extends Component
{

    public $buscar;
    public $empresa;
    public $picked;

    public function mount()
    {
        $this->buscar   = "";
        $this->picked   = true;
    }

    public function updatedBuscar()
    {
        $this->picked = false;

        $this->validate([
            "buscar" => "required|min:8"
        ]);

        $this->empresa = \App\Models\Empresa::where("nif", trim($this->buscar))->first();
        //dd($this->empresa);
    }

    public function asignarEmpresa($nif)
    {
        $this->buscar = $nif;
        $this->picked = true;
    }

    public function asignarPrimero()
    {
        $empresa = \App\Models\Empresa::where('nif', '=', trim($this->buscar))->first();

        if ($empresa) {
            $this->buscar = $empresa->nif;
        }
        else $this->buscar = "...";
    }


    public function render()
    {
        return view('livewire.empresa-component');
    }
}
