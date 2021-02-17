<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Publicacao;
use Illuminate\Http\Request;

class PublicacaoController extends Controller
{
    private $publicacao;

    public function __construct(Publicacao $publicacao)
    {
         $this->publicacao=$publicacao;
    }

    public function index(){
           $pub=$this->publicacao->paginate(10);
           return view('admin.publicacao.index',compact('pub'));
    }

    public function show($id){
         $publicacao=$this->publicacao->with(['comentarios.user','user'])->find($id);
         return view('admin.publicacao.detalhes',compact('publicacao'));
    }
}
