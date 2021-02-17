<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Notifications\RegistUsuario;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Mail;
use App\Mail\UserRegisterEmail;
use App\Models\User;

class RegistarController extends Controller
{
    public function index(){
        return view('admin.utilizador.registar');
    }

    
    public function store(Request $request)
    {    
       $user=new User;
       $data = $request->all();
       $validacao = \Validator::make($data,[
         'name' => 'required|string|max:255',
         'email' => 'required|string|email|max:255|unique:users',
         'password' => 'required|string|min:6',
         'telefone' => 'required|string|max:14|min:9',
         'tipo'     =>'required'
       ],[
        //Mensagens de validação de erros
        'name.required'=>'Por favor, informe o nome',
        'email.required'=>'Por favor, informe o email',
        'email.unique'=>'O email já foi associado a outra conta',
        'telefone.required'=>'Por favor, informe o contacto',
        'telefone.min'=>'Por favor, informe um contacto válido',
        'telefone.max'=>'Por favor, informe um contacto válido',
        'password.min'=>'Por favor, informe uma senha com 6 caracteres no mínimo',
        'password.required'=>'Por favor, informe uma senha',
        'tipo.required'    =>'Erro de cadastro!..Por favor, informe uma categoria'
    ]);
 
       if($validacao->fails()){
         return redirect()->back()->withErrors($validacao)->withInput();
       }
 
       //Mail::to('beallinda@gmail.com')->send(new UserRegisterEmail($user));
      Mail::to("{$request->email}")->send(new UserRegisterEmail($user));
    $idUser = DB::table('users')->insertGetId(
        ['email' => $request->email,'name' => $request->name,'telefone' => $request->telefone,'tipo' =>$request->tipo,'password' =>Hash::make($request->password)]
    );
 
    if($request->tipo=="formador"){

       if(DB::table('formador')->insert(['id_user' => $idUser])){
       Session::flash('sms',' ');
      
       return redirect()->back();  
      /*  $login['success']=true;
        $login['message']= 'Confirma a sua inscrição no email';
        echo json_decode($login);
        return;*/

 }

}else{
    if($request->tipo=="academia" || $request->tipo=="admin" ){
    
 
   if(DB::table('academia')->insert(['id_user' => $idUser])){
    Session::flash('sms',' ');
   
    return redirect()->back(); 

}

}

else{
    if($request->tipo=="aluno"){
       
       
      if(DB::table('aluno')->insert(['id_user' => $idUser])){
        Session::flash('sms',' ');
      
        return redirect()->back(); 
        

}

 }
    }
}
  
}

}
