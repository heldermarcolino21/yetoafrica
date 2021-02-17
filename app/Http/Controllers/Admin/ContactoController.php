<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Categorias;
use App\Models\Contacto;
use App\Models\Contactos;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Mail;
use App\Mail\ContactosEmail;
use App\Mail\ContactossEmail;
use Illuminate\Support\Facades\Session;

class ContactoController extends Controller
{
    public function contacto(){
        $listaCategorias=Categorias::all();
        $contacto='active';
        return view('admin.contacto.contacto',compact('listaCategorias','contacto'));
    }

   public function index()
   {
       $listaContactos=Contactos::paginate(10);
       return view('admin.contacto.index',compact('listaContactos'));
   }

   
   public function store(Request $request)
   {
       $dados=new Contactos;
       $dados->contacto_nome=$request->input('contacto_nome');
       $dados->contacto_email=$request->input('contacto_email');
       $dados->contacto_assunto=$request->input('contacto_assunto');
       $dados->contacto_descricao=$request->input('contacto_descricao');
       Mail::to("agosxaves@gmail.com")->send(new ContactosEmail($dados));
       Mail::to("{$dados->contacto_email}")->send(new ContactossEmail($dados));
       
    //inserir modulo no curso
    if($dados->save()){
       Session::flash('sms','Obrigado por enviar email para nós');
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
       return Contactos::find($id);
   }

   

   public function update(Request $request, $id)
   {
 
         if(DB::table('contactos')          
         ->where('id','=',$id)
         ->update(['contacto_nome'=>$request->contacto_nome,'contacto_email'=>$request->contacto_email,'contacto_assunto'=>$request->assunto,'contacto_descricao'=>$request->contacto_descricao]))
     {
         Session::flash('sms','A pergunta foi actualizada com sucesso');
         return redirect()->back();
     }      
   }

   /**
    * Remove the specified resource from storage.
    *
    * @param  int  $id
    * @return \Illuminate\Http\Response
    */
   public function destroy($id)
   {
       Contactos::find($id)->delete();
       Session::flash('sms','Eliminado com sucesso');
       return redirect()->back();
   }
}
