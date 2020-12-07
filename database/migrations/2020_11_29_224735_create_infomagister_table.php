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
        // Schema::create('info_magisters', function (Blueprint $table) {
        //     $table->id();
        //     $table->string('proposito_magister')->require;
        //     $table->string('objetivo_magister')->require;
        //     $table->string('descripcion_magister')->require;
        //     $table->string('perfil_entrada_magister')->require;
        //     $table->string('regimen_magister')->require;
        //     $table->string('contacto_magister')->require;
        //     $table->string('costo_magister')->require;
        //     $table->string('metodos_pagos_magister')->require;
        //     $table->string('beneficios_magister')->require;
        //     $table->string('arancel_magister')->require;
        //     $table->timestamps();
        // });

        Schema::create('info_magisters', function (Blueprint $table) {
            $table->id();
            $table->longText('proposito_magister')->require;
            $table->longText('objetivo_magister')->require;
            $table->longText('descripcion_magister')->require;
            $table->longText('perfil_entrada_magister')->require;
            $table->string('regimen_magister')->require;
            $table->longText('contacto_magister')->require;
            $table->longText('costo_magister')->require;
            $table->longText('metodos_pagos_magister')->require;
            $table->longText('beneficios_magister')->require;
            $table->longText('arancel_magister')->require;
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
        Schema::dropIfExists('infomagister');
    }
}
