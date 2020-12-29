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
            //Títular de la noticia
            $table->string('titular_noticia')->require();
            //Cuerpo de la noticia
            $table->longText('cuerpo_noticia')->require();
            //Autor de la noticia. No es obligatorio
            $table->string('autor_noticia');
            //Enlace a una noticia externa, si existe.
            // $table->string('enlace_noticia');
            //Foto de la noticia
            $table->string('noticia_photo_path')->nullable();
            $table->string('caption_foto_noticia')->nullable();
            //Estado de la noticia. Para fines de eliminación. Al eliminar una noticia se cambia el estatus
            // a "no visible"
            $table->enum('estado_noticia',['Visible','No visible'])->default('Visible');
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
