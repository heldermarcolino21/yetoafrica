<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSobreTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('sobre', function (Blueprint $table) {
            $table->increments('id');
            $table->string('sobre_img');
            $table->string('sobre_descricao');
            $table->string('sobre_titulo');
            $table->date('sobre_data');
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
        Schema::dropIfExists('sobre');
    }
}
