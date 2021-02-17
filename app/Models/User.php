<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Support\Facades\DB;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name','email', 'password','tipo','foto'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

     public function publicacao(){
         return $this->hasMany(Publicacao::class);
     }

     public function blog(){
        return $this->hasMany(Blog::class);
    }

     public function comentario(){
         return $this->hasMany(Comentario::class);
     }

     public function comentarioblog(){
        return $this->hasMany(Comentablog::class);
    }



    public static function listaDados($id){
        return DB::table('users')
        ->join('perfil', 'perfil.id_user','=','users.id')
        ->select('perfil.nome','perfil.pais','perfil.bilhete','users.email','users.name','users.tipo')
        ->where('users.id',$id)
        ->get();
    }

    public static function listarFormador(){
        return DB::table('formador')
                    ->join('users', 'users.id', '=', 'formador.id_user')
                    ->join('perfil', 'perfil.id_user', '=', 'users.id')
                    ->select('users.tipo','perfil.pais','perfil.bilhete','users.email','formador.id','users.name','users.foto')
                    ->paginate(10);
    }

    public static function listarAluno(){
        return DB::table('aluno')
                    ->join('users', 'users.id', '=', 'aluno.id_user')
                    ->join('perfil', 'perfil.id_user', '=', 'users.id')
                    ->select('users.tipo','perfil.pais','perfil.bilhete','users.email','users.id','users.name')
                    ->paginate(10);
    
    }

public static function listarAcademia(){
   return DB::table('academia')
    ->join('users', 'users.id', '=', 'academia.id_user')
    ->join('perfil', 'perfil.id_user', '=', 'users.id')
    ->join('form_acad', 'form_acad.id_academia', '=', 'academia.id')
    ->join('formador', 'formador.id', '=', 'form_acad.id_formador')
    ->select('perfil.pais','perfil.bilhete','users.email','users.id','users.name','users.tipo')
    ->paginate(10);
    
    }
    
    //Função que retorna os formadores
   public static function formadorAcademia($id){
    return DB::table('academia')
                ->join('form_acad', 'form_acad.id_academia', '=', 'academia.id')
                ->join('formador', 'formador.id', '=', 'form_acad.id_formador')             
                ->join('users', 'users.id', '=', 'formador.id_user')
                ->select('users.email','users.name')
                ->where('users.id',$id)
             
                ->paginate(10);
}


}
