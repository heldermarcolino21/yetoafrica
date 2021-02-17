<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Academia;
use App\Models\AcademiaFormador;
use App\Models\Categorias;
use App\Models\Cursos;
use App\Models\Formador;
use App\Models\Modulos;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class FormadorController extends Controller
{
    public function index()
    {
        $idAcademia=Academia::idAcademia(auth()->user()->id);
        $listausers=AcademiaFormador::formadorAcademia($idAcademia[0]->id);
       //dd($listausers);
        return view('admin.formador.index',compact('listausers'));
    }

   
    public function store(Request $request)
    {
            
 $id_academia=Academia::idAcademia(auth()->user()->id);
        //Regista o user e retorna o    ID gerado
    $idUser = DB::table('users')->insertGetId(
    ['name' => $request->name,'email' => $request->email,'tipo' => $request->tipo,'password' =>Hash::make(654321)]
 );
 
      $img=$request->file('foto');
 
       if($request->file('foto')->isValid()){
       $img=$request->file('foto')->store('aluno');
 
 }  
 
 //inserir na tabela perfil 
      DB::table('perfil')->insert(
      ['id_user' => $idUser,'nome' => $request->nome,'pais' => $request->pais,'bilhete' => $request->bilhete,'descricao' => $request->descricao,'facebook' => $request->facebook,'instagram' => $request->instagram,'foto'=>$img,'status' =>false]
 );
 
 $idform = DB::table('formador')->insertGetId(
    ['id_user' => $idUser]
 );

 if(DB::table('form_acad')->insert(
      ['id_formador' =>$idform,'id_academia' =>$id_academia[0]->id])){
    return redirect()->back();
 }
 
 }

 
    public function show($id)
    {
        return User::find($id);
    }

  
    public function destroy($id)
    {
        User::find($id)->delete();
        
        return redirect()->back();
    }

    public function formadores(){
        $listarFormador=Formador::listarFormador();
        //dd($listarFormador);
        $formador="active";
        return view('admin.formador.formadores',compact('formador','listarFormador'));
    }

    public function registar(){
        $listaCategorias=Categorias::all();
        return view('admin.formador.registar',compact('listaCategorias'));
    }  

    public function meusCursos()
    {
        $listMeuscursos=Cursos::listaCursosForm(auth()->user()->id);
        $listaFormador=Formador::listarFormadorlogado(auth()->user()->id);
        $listaCategoria=Categorias::all();  

        $listaModulos = Modulos::listaModulo();
        //$listaModulos=Modulos::listaModul($listMeuscursos[0]->id);//modulos de um unico curso

       
        
        
                    
        return view('negocio.formador.cursos',compact('listMeuscursos','listaCategoria','listaFormador','listaModulos'));
    }

    public function meusModulos($id)
    {
        $listaModulos=Modulos::listaModul($id);
        $listaCursos=Cursos::find($id);	
        return view('negocio.formador.modulos',compact('listaModulos','listaCursos'));
    }

    public function meusCursosAcademia()
    {
        $idAcademia=Academia::idAcademia(auth()->user()->id);
        $listaFormadores=AcademiaFormador::formadorAcademia($idAcademia[0]->id);
        $listMeuscursos=Cursos::listaCursosAcademia(auth()->user()->id);
        $listaFormador=Academia::listarAcademialogado(auth()->user()->id);
        $listaCategoria=Categorias::all();
        return view('admin.academia.cursosacademia',compact('listMeuscursos','listaCategoria','listaFormador','listaFormadores'));
    }


    public function alunosCurso($id){
    $buscarFormador=Formador::listarFormadorlogado(auth()->user()->id);
    $alunosCurso=Formador::alunosCurso($buscarFormador[0]->id,$id);
    $totalSaldos=0;
    foreach($alunosCurso as $lista){
    $totalSaldos=$totalSaldos+$lista->valor;
    }

    $totalSaldo=$totalSaldos*0.70;
    return view('admin.formador.alunos',compact('alunosCurso','totalSaldo'));

    }

    public function alunosCursos(){

        $buscarFormador=Formador::listarFormadorlogado(auth()->user()->id);
        $alunosCurso=Formador::alunosCursos($buscarFormador[0]->id);
        $totalSaldos=0;
        foreach($alunosCurso as $lista){
            $totalSaldos=$totalSaldos+$lista->valor;
        }
        $totalSaldo=$totalSaldos*0.70;
                return view('admin.formador.alunosCursos',compact('alunosCurso','totalSaldo'));
       
            }
}
