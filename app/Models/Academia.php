<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Academia extends Model
{
    protected $table = 'academia';
    //Função que retorna o id da academia logada
    public static function idAcademia($id){
       return DB::table('academia')
                   ->join('users', 'users.id', '=', 'academia.id_user')
                   ->select('academia.id')
                   ->where('users.id',$id)
                   ->get();
   }

   //Função que retorna a academia logada no momento
   public static function listarAcademialogado($id){
      return DB::table('academia')
                  ->join('users', 'users.id', '=', 'academia.id_user')
                  ->select('users.tipo','users.email','academia.id','users.name')
                  ->where('users.id',$id)
                  ->paginate(10);
  }
  
//Função que retorna a academia logada no momento
public static function listarAcademia(){
   return DB::table('academia')
               ->join('users', 'users.id', '=', 'academia.id_user')
               ->select('users.email','academia.id','users.name','users.foto')
               ->where('users.tipo','academia')
               ->paginate(10);
}
  
public static function academiaFinancas($id){
   return DB::table('pedidos_cursos')
   ->join('pedidos', 'pedidos.id', '=', 'pedidos_cursos.pedido_id')
   ->join('users', 'users.id', '=', 'pedidos.user_id')             
   ->join('cursos', 'cursos.id', '=', 'pedidos_cursos.curso_id')
   ->join('formador', 'formador.id', '=', 'cursos.id_formador')
   ->join('academia', 'academia.id', '=', 'form_acad.id_formador')
   ->join('users', 'users.id', '=', 'academia.id_user')
   ->select(DB::raw('sum(pedidos_cursos.valor) as valor'))
   ->where('formador.id',$id)
   ->where('pedidos_cursos.status','PA')
   ->get();
 }
 

   
}
