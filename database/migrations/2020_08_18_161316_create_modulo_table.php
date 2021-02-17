<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateModuloTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('modulo', function (Blueprint $table) {
            $table->increments('id');
            $table->string('modulo_titulo');
            $table->text('modulo_descricao');
            $table->integer('modulo_status');
            $table->Integer('id_curso')->unsigned();
            $table->foreign('id_curso')->references('id')->on('cursos')->onDelete('cascade');
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
        Schema::dropIfExists('modulo');
    }
}
