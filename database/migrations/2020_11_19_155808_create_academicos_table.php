<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAcademicosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('academicos', function (Blueprint $table) {
            $table->id();
            $table->string('nombre_academico');
            $table->string('rut_academico')->unique();
            $table->date('fecha_nacimiento');
            $table->enum('grado_academico', ['Bachiller', 'Licenciado','Magíster','Doctor'])->default('Magíster');
            $table->string('correo', 128)->unique();
            $table->string('proyecto')->nullable();
            $table->string('publicaciones')->nullable();
            $table->enum('estatus', ['Claustro', 'Colaborador','Visitante','Eliminado'])->default('Claustro');
            $table->string('razon_eliminacion')->nullable();
            $table->foreignId('user_id')->nullable()->index();
            $table->string('profile_photo_path')->nullable();
            // $table->foreignId('user_id')->constrained()->cascadeOnDelete()->cascadeOnUpdate();
            //$table->foreignId('alumno_id')->constrained()->cascadeOnDelete()->cascadeOnUpdate();
            $table->string('linkedin')->nullable();
            $table->string('trabajo_tesis_supervisado')->nullable();
            // $table->softDeletes();
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
        Schema::dropIfExists('academicos');
    }
}
