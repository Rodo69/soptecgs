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
        Schema::create('sucursales', function (Blueprint $table) {
            $table->id();
            $table->string('nombre');
            $table->string('direccion');
            $table->string('ingeniero_zona');
            $table->string('telefono_ing');
            $table->string('gerente_tienda');
            $table->string('telefono_gerente');
            $table->string('imagen');
            $table->timestamps();
            
            $table->unsignedBigInteger('banco_azteca');
            $table->unsignedBigInteger('presta_prenda');
            $table->unsignedBigInteger('comercio');

            $table->foreign('banco_azteca')->references('id')->on('categoria')->onDelete('cascade');
            $table->foreign('presta_prenda')->references('id')->on('categoria')->onDelete('cascade');
            $table->foreign('comercio')->references('id')->on('categoria')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('sucursales');
    }
};