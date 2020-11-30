<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateInfomagisterTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('infomagister', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->string('proposito_magister')->require;
            $table->string('objetivo_magister')->require;
            $table->string('descripcion_magister')->require;
            $table->string('perfil_entrada_magister')->require;
            $table->string('regimen_magister')->require;
            $table->string('contacto_magister')->require;
            $table->string('costo_magister')->require;
            $table->string('metodos_pagos_magister')->require;
            $table->string('beneficios_magister')->require;
            $table->string('arancel_magister')->require;
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('infomagister');
    }
}
