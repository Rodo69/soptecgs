<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
   
    public function up(): void
    {
        Schema::create('equiposbajas', function (Blueprint $table) {
            $table->id();
            $table->string('tipo');
            $table->string('modelo');  
            $table->string('marca');  
            $table->string('placa');
            $table->string('serie');
            $table->string('descripcion');
            $table->date('fecha_registro');
            $table->string('foto_obsoleto');
            $table->timestamps();
        });
    }
    public function down(): void
    {
        Schema::dropIfExists('equiposbajas');
    }
};
