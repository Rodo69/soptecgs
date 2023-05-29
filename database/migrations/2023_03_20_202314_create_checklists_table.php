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
           // $table->foreign('sucursal_name')->references('id')->on('sucursales')->onDelete('cascade');
            $table->string('nombre');  
            $table->date('fecha_registro');  
            $table->string('foto_fachada');    
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('checklists');
    }
};
