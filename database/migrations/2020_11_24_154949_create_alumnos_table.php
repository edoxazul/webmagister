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
            $table->string('rut_alumno')->unique();
            $table->string('pasaporte')->unique()->nullable();
            $table->string('carrera_alumno');
            $table->string('contacto_alumno',128)->unique();
            $table->enum('estado_alumno', ['Regular', 'Graduado','Egresado','Retiro Voluntario','Eliminado'])->default('Regular');
            $table->string('razon_eliminacion')->nullable();
            $table->date('anio_ingreso');
            $table->date('anio_graduacion')->nullable();
            $table->string('trabajo_anteproyecto')->nullable();
            $table->string('linkedin')->nullable();
            $table->string('profile_photo_path')->nullable();
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
