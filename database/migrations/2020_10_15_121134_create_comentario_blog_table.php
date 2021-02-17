<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateComentarioBlogTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('comentario_blog', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('user_id');// usuário que fez o comentário
            $table->unsignedInteger('blog_id');// publicação que fez o comentário
            $table->string('nome');
            $table->string('email',191);
            $table->text('descricao');
            $table->timestamps();

            $table->foreign('user_id')
            ->references('id')
            ->on('users')
            ->onDelete('cascade');

            $table->foreign('blog_id')
            ->references('id')
            ->on('blog')
            ->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('comentario_blog');
    }
}
