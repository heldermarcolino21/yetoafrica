<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePedidosCursosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pedidos_cursos', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('pedido_id')->unsigned(); // unsigned: somente inteiros positivos
            $table->integer('curso_id')->unsigned();  // unsigned: somente inteiros positivos
            $table->enum('status', ['RE', 'PA', 'CA']); // Reservado, Pago, Cancelado
            $table->double('valor')->default(0);
            $table->timestamps();
            $table->foreign('pedido_id')->references('id')->on('pedidos');
            $table->foreign('curso_id')->references('id')->on('cursos');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('pedidos_cursos');
    }
}
