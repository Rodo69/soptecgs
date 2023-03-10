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
        Schema::create('equiposbaja', function (Blueprint $table) {
            $table->id();
            $table->string('tipo');
            $table->string('placa');
            $table->string('serie');
            $table->string('foto_equipo');
            $table->string('modelo');     
            $table->string('ing_cargo');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('equiposbaja');
    }
};
