<?php

namespace App\Http\Controllers\Portal;

use App\Http\Controllers\Controller;
use App\Models\Aluno;
use Illuminate\Http\Request;
use App\Models\Banner;
use App\Models\Categorias;
use App\Models\Cursos;
use App\Models\Formador;
use App\Models\Sobre;
use App\Models\Blog;
use App\Models\Servicos;
use App\Models\Pedido;

class HomeController extends Controller
{
  

    public function index()
    {
        $listaBanner=Banner::all();
        $listaCurso=Cursos::listaCursos();
        $listaBlog=Blog::all();
        $contFormador=Formador::count();
        $contAluno=Aluno::count();
        $contCursos=Cursos::count();
        $home="active";
        $listaSobre=Sobre::all();
        $listaServicos=Servicos::all();
        if(isset(auth()->user()->id)){
        $listaPedido=Pedido::cursoPr(auth()->user()->id);
      // dd($listaPedido);
        return view('portal.home.index',compact('listaSobre','listaServicos','listaBanner','listaCurso','listaBlog','contFormador','contAluno','contCursos','home','listaPedido'));
    }else{
        return view('portal.home.index',compact('listaSobre','listaServicos','listaBanner','listaCurso','listaBlog','contFormador','contAluno','contCursos','home')); 
    }
    }
}
