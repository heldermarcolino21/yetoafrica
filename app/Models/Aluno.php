<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Aluno extends Model
{
    protected $table = 'aluno';
 
 
 //Função que retorna os alunos
public static function listarAluno(){
    return DB::table('aluno')
                ->join('users', 'users.id', '=', 'aluno.id_user')
                ->join('perfil', 'perfil.id_user', '=', 'users.id')
                ->where('users.tipo','aluno')
                ->select('perfil.pais','perfil.bilhete','users.email','aluno.id','users.name')
                ->paginate(10);
}

 //Função que retorna o aluno logado
 public static function listarAlunologado($id){
    return DB::table('aluno')
                ->join('users', 'users.id', '=', 'aluno.id_user')
                ->join('perfil', 'perfil.id_user', '=', 'users.id')
                ->join('contacto','contacto.id_perfil','perfil.id')
                ->select('users.tipo','perfil.pais','perfil.bilhete','users.email','aluno.id','users.name','contacto.telefone')
                ->where('users.id',$id)
                ->paginate(10);
}



}
