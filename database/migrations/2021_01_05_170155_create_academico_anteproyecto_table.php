<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAcademicoAnteproyectoTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('academico_anteproyecto', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('academico_id');
            $table->unsignedBigInteger('anteproyecto_id');
            $table->foreign('academico_id')->references('id')->on('academicos')->onDelete('cascade');
            $table->foreign('anteproyecto_id')->references('id')->on('teses')->onDelete('cascade');
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
        Schema::dropIfExists('academico_anteproyecto');
    }
}
