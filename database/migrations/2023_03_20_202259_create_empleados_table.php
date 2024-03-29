<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('empleados', function (Blueprint $table) {
            $table->id();
            $table->string('nombre_colaborador');
            $table->string('apellido_p');
            $table->string('apellido_m');
            $table->string('telefono'); 
            $table->string('numero_colaborador');
            $table->unsignedBigInteger('sucursal_asignada');
            $table->unsignedBigInteger('unidad_asignada'); 
            $table->string('puesto');                     
            $table->timestamps();

            $table->foreign('sucursal_asignada')->references('id')->on('sucursales')->onDelete('cascade');
            $table->foreign('unidad_asignada')->references('id')->on('categorias')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('empleados');
    }
};
