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
        Schema::create('servidores', function (Blueprint $table) {
            $table->id();
            $table->string('nombre');
            $table->unsignedBigInteger('sucursalasig');
            $table->string('ip');
            $table->string('mascara');
            $table->string('gateway');
            $table->string('dns');
            $table->string('imagen');
            $table->string('status');
            $table->timestamps();

            $table->foreign('sucursalasig')->references('id')->on('sucursales')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('servidores');
    }
};
