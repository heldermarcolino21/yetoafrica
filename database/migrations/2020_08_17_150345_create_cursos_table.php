<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCursosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('cursos', function (Blueprint $table) {
            $table->increments('id');
            $table->string('curso_nome');
            $table->string('curso_sigla',10)->nullable();
            $table->float('curso_preco');
            $table->text('curso_img');
            $table->text('curso_descricao')->nullable();
            $table->date('curso_data');
            $table->date('curso_status');
            $table->string('curso_duracao')->nullable();
            $table->Integer('id_formador')->unsigned();
            $table->foreign('id_formador')->references('id')->on('formador')->onDelete('cascade');
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
        Schema::dropIfExists('cursos');
    }
}
