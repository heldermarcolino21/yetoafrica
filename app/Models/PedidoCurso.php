<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class PedidoCurso extends Model
{
    protected $table="pedidos_cursos";
    protected $fillable = [
        'pedido_id',
        'curso_id',
        'status',
        'valor'
    ];
    
    public function curso()
    {
        return $this->belongsTo('App\Models\Cursos', 'curso_id', 'id');
    }

   
}
