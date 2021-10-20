<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateEmpresasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('empresas', function (Blueprint $table) {
            $table->id();
            $table->string('epigrafe', 12);
            $table->string('nombre_epigrafe', 70);
            $table->string('nombre', 70);
            $table->string('nif', 10)->unique();
            $table->string('direccion', 80);
            $table->string('categoria_grupo', 70);
            $table->tinyInteger('grupo');
            $table->tinyInteger('categoria_electoral');
            $table->string('categoria_electoral_nombre', 70);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('empresas');
    }
}
