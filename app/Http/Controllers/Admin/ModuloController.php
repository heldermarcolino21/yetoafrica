<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Aulas;
use App\Models\Cursos;
use App\Models\Modulos;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;

class ModuloController extends Controller
{
    public function index()
    {
        $listaModulos=Modulos::listaModulo();
        $listaCursos=Cursos::listaCursos();

        return view('admin.modulo.index',compact('listaModulos','listaCursos'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $dados=new Modulos;
        $dados->modulo_titulo=$request->input('modulo_titulo');
        $dados->modulo_descricao=$request->input('modulo_descricao');
        $dados->modulo_status=false;
        $dados->id_curso=$request->input('id_curso');
     //inserir modulo no curso
     if($dados->save()){
        Session::flash('sms','O módulo foi inserido com sucesso');
        return redirect()->back();
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        return Modulos::find($id);
    }

    public function update(Request $request, $id)
    {
        if(DB::table('modulo')          
        ->where('id','=',$id)
        ->update(['modulo_titulo'=>$request->modulo_titulo,'modulo_descricao'=>$request->modulo_descricao]))
    {
        Session::flash('sms','O módulo foi editada com sucesso');
        return redirect()->back();
    }      
    }

    
    public function destroy($id)
    {
        Modulos::find($id)->delete();
        Session::flash('sms','O módulo foi eliminado com sucesso');
        return redirect()->back();
    }


    public function aulasModulo($id)
    {
        $listAulas=Aulas::listaAulaModulo($id);
        $modulo=Modulos::find($id);	
        return view('negocio.formador.aulas',compact('listAulas','modulo'));
    }

}
