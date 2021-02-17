<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Publicacao extends Model
{
    protected $table="publicacao";
    protected $fillable=['user_id','titulo','descricao','data'];
    
    
    public function comentarios(){
        return $this->hasMany(Comentario::class);
    }

    public function user(){
        return $this->belongsTo(User::class);
    }
}
