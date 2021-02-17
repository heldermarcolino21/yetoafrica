<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class AcademiaFormador extends Model
{
    protected $table = 'form_acad';

     //Função que retorna o id da academia logada
 public static function idAcademia($id){
        return DB::table('form_acad')
        ->join('academia', 'academia.id', '=', 'form_acad.id_academia')
        ->join('formador', 'formador.id', '=', 'form_acad.id_formador')
        ->join('users', 'users.id', '=', 'academia.id_user')
        ->select('academia.id')
        ->where('users.id',$id)
        ->get();
    }

     //Função que retorna os formadores da academia logada no momento
     public static function formadorAcademia($id){
        return DB::table('form_acad')
        ->join('academia', 'academia.id', '=', 'form_acad.id_academia')
        ->join('formador', 'formador.id', '=', 'form_acad.id_formador')
        ->join('users', 'users.id', '=', 'formador.id_user')
        ->select('users.tipo','users.foto','users.email','users.id','users.name')
        ->where('academia.id',$id)
        ->paginate(10);
    }
}
