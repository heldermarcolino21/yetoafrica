<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Sobre extends Model
{
    protected $table = 'sobre';

    public static function listaSobre(){
        $listaFormador=DB::table('sobre')
        ->select('sobre.id','sobre.sobre_descricao','sobre.sobre_data','sobre.sobre_img','sobre.sobre_titulo')
        ->orderBy('id','desc')
        ->paginate(10);
        return $listaFormador;
    
    }
}
