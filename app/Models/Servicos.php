<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Servicos extends Model
{
    protected $table="servicos";

    public static function listaServ(){
        $listaFormador=DB::table('servicos')
        ->select('servicos.id','servicos.serv_nome','servicos.serv_descricao','servicos.serv_data','servicos.serv_icone')
        ->orderBy('id','desc')
         ->paginate(10);
        return $listaFormador;
    }
}
