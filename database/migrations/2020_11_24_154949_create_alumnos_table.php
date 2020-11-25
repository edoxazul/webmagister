<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAlumnosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('alumnos', function (Blueprint $table) {
            $table->id();
            $table->string('nombre_alumno');
            $table->integer('rut_alumno')->unique;
            $table->string('nombre_pregrado_alumno');
            $table->string('nombre_institucion_alumno');
            $table->string('contacto_alumno',128)->unique();
            $table->enum('estatus_alumno', ['Regular', 'Graduado','Egresado','Retiro Voluntario','Eliminado'])->default('Regular');
            $table->string('razon_eliminacion')->nullable();
            $table->date('anio_ingreso');
            $table->date('anio_graduacion');
            $table->string('trabajo_tesis');
            $table->string('linkedin');
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
        Schema::dropIfExists('alumnos');
    }
}
