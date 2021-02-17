<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Pedido extends Model
{
    protected $fillable = [
        'user_id',
        'status'
    ];

    public function pedido_cursos()
    {
        return $this->hasMany('App\Models\PedidoCurso')
            ->select( DB::raw('curso_id, sum(valor) as valores, count(1) as qtd') )
            ->groupBy('curso_id')
            ->orderBy('curso_id', 'desc');
    }

    public function pedido_cursos_itens()
    {
        return $this->hasMany('App\Models\PedidoCurso');
    }

    public static function consultaId($where)
    {
        $pedido = self::where($where)->first(['id']);
        return !empty($pedido->id) ? $pedido->id : null;
    }

    public static function cursoPr($id){
   
        $listaFormador=DB::table('pedidos')
        ->join('users','users.id','=','pedidos.user_id')
        ->join('pedidos_cursos','pedidos_cursos.pedido_id','=','pedidos.id')
        ->join('cursos','cursos.id','=','pedidos_cursos.curso_id')
        ->select('pedidos.status','pedidos_cursos.curso_id')
        ->where('users.id',$id)
        ->orderBy('cursos.id','desc')
        ->paginate(10);
        return $listaFormador;
    }

}
