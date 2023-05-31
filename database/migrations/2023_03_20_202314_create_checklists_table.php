<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
  
    public function up(): void
    {
        Schema::create('checklists', function (Blueprint $table) {
            $table->id();
            $table->date('fecha_registro');
            $table->string('foto_fachada');
      
            $table->unsignedBigInteger('sucursal_name');
            $table->timestamps();
            $table->foreign('sucursal_name')->references('id')->on('sucursales')->onDelete('cascade'); 
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('checklists');
    }
};
