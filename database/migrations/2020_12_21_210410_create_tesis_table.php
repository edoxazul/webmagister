<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTesisTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('teses', function (Blueprint $table) {
            $table->id();
            $table->string('titulo')->require;
            $table->string('autor')->require;
            $table->string('tutor')->require;
            $table->date('anio_aprobacion')->nullable();
            $table->string('anteproyecto_path')->require;
            $table->longText('resumentesis_path')->require;
            $table->enum('estatus',['En Formulacion','Aprobado','Rechazado','Eliminado'])->default('Aprobado');
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
        Schema::dropIfExists('teses');
    }
}
