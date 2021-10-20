<?php

namespace Database\Factories;

use App\Models\Empresa;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

class EmpresaFactory extends Factory
{
    protected $model = Empresa::class;

    public function definition()
    {
        return
        [ 
            'epigrafe'   =>$this->faker->lastName(20),
            'nombre'     =>$this->faker->name(40),
            'nif'        =>$this->faker->phoneNumber(12),
            'direccion'  =>$this->faker->name(70),
            'grupo'      =>$this->faker->name(35),
        ];
    }
}