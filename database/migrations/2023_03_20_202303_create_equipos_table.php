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
        Schema::create('equipos', function (Blueprint $table) {
            $table->id();
            $table->string('tipo');
            $table->string('marca');
            $table->string('modelo');
            $table->string('serie');
            $table->string('placa');
            $table->unsignedBigInteger('empleado_asig');
            $table->unsignedBigInteger('sucursal_asig'); 
            $table->unsignedBigInteger('unidad_asig');
            $table->string('nombre_equipo');           
            $table->timestamps();

            $table->foreign('empleado_asig')->references('id')->on('empleados')->onDelete('cascade');
            $table->foreign('sucursal_asig')->references('id')->on('sucursales')->onDelete('cascade');
            $table->foreign('unidad_asig')->references('id')->on('categoria')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('equipos');
    }
};
