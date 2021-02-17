<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Academia;
use App\Models\AcademiaFormador;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class AcademiaController extends Controller
{
    public function index()
    {
        $idAcademia=Academia::idAcademia(auth()->user()->id);
        $listausers=AcademiaFormador::formadorAcademia($idAcademia[0]->id);
        return view('negocio.academia.index',compact('listausers'));
    }

    public function store(Request $request)
    {
        $idAcademia=Academia::listarAcademia(auth()->user()->id);
        //dd($idAcademia);
        //Regista o user e retorna o ID gerado
        $img=$request->file('foto');
     
           if($request->file('foto')->isValid()){
           $img=$request->file('foto')->store('formador');
     }  

    $idUser = DB::table('users')->insertGetId(
        ['name' => $request->name,'email' => $request->email,'tipo' =>'formador','foto' => $request->foto,'password' =>Hash::make(654321)]
     );     
     
      $idFormador = DB::table('formador')->insertGetId(['id_user' => $idUser]);
     
     if(DB::table('form_acad')->insert(['id_formador' => $idFormador,'id_academia'=>$idAcademia[0]->id])){
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

     public function academiasfront(){
        
        $listarAcademias=Academia::listarAcademia();
        //dd($listarAcademias);
        $academia="active";
        return view('admin.academia.academiasfront',compact('academia','listarAcademias'));
     }
 
    }
