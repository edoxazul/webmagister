<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateNoticiasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('noticias', function (Blueprint $table) {
            $table->id();
            //Título de la noticia
            $table->string('titulo_noticia')->require();
            //Descripción de la noticia
            $table->string('descripcion_noticia')->require();
            //Autor de la noticia. No es obligatorio
            $table->string('autor_noticia');
            //Enlace a una noticia externa, si existe.
            $table->string('enlace_noticia');
            //Foto de la noticia
            $table->string('noticia_photo_path')->nullable();
            //Estado de la noticia. Para fines de eliminación. Al eliminar una noticia se cambia el estatus
            // a "no visible"
            $table->enum('estatus',['Visible','No visible'])->default('Visible');
            //Fecha y hora en que se publica la noticia
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
        Schema::dropIfExists('noticias');
    }
}
