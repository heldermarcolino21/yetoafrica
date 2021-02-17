<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Comentario extends Model
{
    protected $fillable=['user_id','publicacao_id','titulo','conteudo'];
     public function publicacao()
    {
             return $this->belongsTo(Publicacao::class);
    }

    public function user(){
        return $this->belongsTo(User::class);
    }
}
