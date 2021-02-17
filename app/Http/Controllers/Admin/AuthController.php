<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Aulas;
use App\Models\Banner;
use App\Models\Blog;
use App\Models\Categorias;
use App\Models\Cursos;
use App\Models\Formador;
use App\Models\Modulos;
use App\Models\Pedido;
use App\Models\Sobre;
use App\Models\AcademiaFormador;
use App\Models\Academia;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    
    public function dashboard(){
        if(Auth::check()===true){
        if(auth()->user()->tipo=="formador"){
            //    $listaPessoa=Formador::listarFormadorlogado(auth()->user()->id);
                 //$listMeuscursos=Cursos::listaCursosForm(auth()->user()->id);
                 $listMeuscursos=Cursos::listaCursosForm(auth()->user()->id);
                 $conta=$listMeuscursos->count();
                 $buscarFormador=Formador::listarFormadorlogado(auth()->user()->id);   
                 
                              
                                                 
                 
                $saldo=Formador::formadorfinancas($buscarFormador[0]->id);
                $saldoTotal=$saldo[0]->valor*0.7;

                 $listaMigalhas = \json_encode([["titulo"=>"Home","url"=>route('admin')],
                                        ["titulo"=>"Cursos","url"=>route('cursos.index')]]);                                            

                return view('admin.home.index',compact('listaMigalhas','listMeuscursos','buscarFormador'));
           
       
             }else{
                 if(auth()->user()->tipo=="aluno"){
                    $cursos=Cursos::listaCursosAl(auth()->user()->id);
                    $contac=$cursos->count();
                    return view('admin.home.index',compact('cursos','contac'));
                       
                 }else{
     
                     if(auth()->user()->tipo=="admin"){
                         $contaCat=Categorias::count();
                         $contaSob=Sobre::count();
                         $contaBan=Banner::count();
                         $contaBlog=Blog::count();
                         $contaAula=Aulas::count();
                         $contaModulo=Modulos::count();
                         $contaCursos=Cursos::count();
                        // dd($contaCat);
                         return view('admin.home.index',compact('contaCat','contaSob','contaBan','contaBlog','contaAula','contaModulo','contaCursos'));
                     }else{
                         if(auth()->user()->tipo=="academia"){
                            $idAcademia=Academia::idAcademia(auth()->user()->id);
                            $contaForm=AcademiaFormador::formadorAcademia($idAcademia[0]->id)->count();
                           // dd($listausers);
                             return view('admin.home.index',compact('contaForm'));
                     }
                 }
             }
             
           
         }
     }

     return redirect()->route('admin.login');
    }

    public function showLoginForm(){
        return view('admin.home.loginform');
    }


    public function login(Request $request){
        if(!filter_var($request->email, FILTER_VALIDATE_EMAIL)){
           // return redirect()->back()->withInput()->withErrors(['O email informado não é válido']);
            $login['success']=false;
            $login['message']='O email informado não é válido';
                echo json_encode($login);
                return;
        }
                $credencias=[
                        'email' => $request->email,
                        'password' => $request->password
                ]   ;     
               
                if(Auth::attempt($credencias)){
                    $login['success']=true;
                    //$login['message']='O email informado não é válido';
                        echo json_encode($login);
                        return;
               // return redirect()->route('admin');
               }

               // return redirect()->back()->withInput()->withErrors(['Os dados informados não conferem']);
               $login['success']=false;
               $login['message']='Os dados informados não conferem';
                 echo json_encode($login);
                 return;
                
    }


    public function logout(){
        Auth::logout();
        return redirect()->route('admin');
    }


 }