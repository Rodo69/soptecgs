<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('equipos', function (Blueprint $table) {
            $table->id();
            $table->string('tipo');
            $table->string('marca');
            $table->string('modelo');
            $table->string('serie');
            $table->string('placa');
            $table->string('empleado_asig');
            $table->string('sucursal_asig'); 
            $table->string('unidad_asig');
            $table->string('nombre_equipo');
            $table->string('foto_equipo');           
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
        Schema::dropIfExists('equipos');
    }
};
