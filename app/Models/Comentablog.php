<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Comentablog extends Model
{

    protected $fillable=['user_id','blog_id','nome','email','descricao'];
    protected $table='comentario_blog';
    public function publicacaoblog()
   {
            return $this->belongsTo(Publicacao::class);
   }

   public function user(){
       return $this->belongsTo(User::class);
   }

}
