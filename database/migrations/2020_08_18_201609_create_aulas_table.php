<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAulasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('aulas', function (Blueprint $table) {
            $table->increments('id');
            $table->string('aula_titulo');
            $table->text('aula_descricao');
            $table->string('aula_duracao');
            $table->string('aula_link');
            $table->string('aula_conteudo');
            $table->boolean('aula_status');
            $table->Integer('modulo_id')->unsigned();
            $table->foreign('modulo_id')->references('id')->on('modulo')->onDelete('cascade');
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
        Schema::dropIfExists('aulas');
    }
}
