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
        Schema::create('empleados', function (Blueprint $table) {
            $table->id();
            $table->string('nombre_colaborador');
            $table->string('apellido_p');
            $table->string('apellido_m');
            $table->string('telefono'); 
            $table->string('numero_colaborador');
            $table->string('sucursal_aaignada');
            $table->string('unidad_asignada'); 
            $table->string('puesto');                     
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
        Schema::dropIfExists('empleados');
    }
};
