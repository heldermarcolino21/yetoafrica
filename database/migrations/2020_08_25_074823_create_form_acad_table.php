<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateFormAcadTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('form_acad', function (Blueprint $table) {
            $table->increments('id');
            $table->Integer('id_formador')->unsigned();
            $table->foreign('id_formador')->references('id')->on('formador')->onDelete('cascade');
            $table->Integer('id_academia')->unsigned();
            $table->foreign('id_academia')->references('id')->on('academia')->onDelete('cascade');
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
        Schema::dropIfExists('form_acad');
    }
}
