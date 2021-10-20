<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Empresa extends Model
{
    use HasFactory;
    
    protected $fillable = [
        'epigrafe',
        'nombre_epigrafe',
        'nombre',
        'nif',
        'direccion',
        'grupo',
        'categoria_grupo',
        'categoria_electoral',
        'categoria_electoral_nombre'
    ];
}