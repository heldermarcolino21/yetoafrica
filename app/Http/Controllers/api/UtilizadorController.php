<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;


class UtilizadorController extends Controller
{
    private $user;

    public function __construct(User $user)
    {
        $this->user=$user;
    }
   
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
      
    /* $listaMigalhas=json_encode([
        ["titulo"=>"Home","url"=>route('home')],
        ["titulo"=>"Utilizador","url"=>route('utilizadores.index')]
    ]); */
       
    $listausers=User::select('id','name','email')->paginate(10);
    return response()->json($listausers);  
 
    }

  
    public function store(Request $request)
    {
             
 
    if($request->tipo=="formador"){
    $img=$request->file('img');
  
           if($request->file('img')->isValid()){
    $img=$request->file('img')->store('formador');
   
 }
 
  //Regista o user e retorna o ID gerado
  $idUser = DB::table('users')->insertGetId(
    ['email' => $request->email,'name' => $request->name,'tipo' =>$request->tipo,'img'=>$img,'password' =>Hash::make(654321)]
);
 
     //inserir na tabela perfil 
     $idperfil=DB::table('perfil')->insertGetId(
        ['id_user' => $idUser,'pais' => $request->pais,'bilhete' => $request->bilhete,'facebook' => $request->facebook,'instagram' => $request->instagram,'status' =>false]
       );
       
       DB::table('contacto')->insert(
          ['id_perfil' => $idperfil,'telefone' => $request->telefone]
         );
      

       if(DB::table('formador')->insert(['id_user' => $idUser])){
        return response()->json('success','Inserido com sucesso');  
 }

}else{
    if($request->tipo=="academia" || $request->tipo=="admin" ){
     $img=$request->file('img');
  
     if($request->file('img')->isValid()){
 $img=$request->file('img')->store('academia');
 
 }  

  //Regista o user e retorna o ID gerado
  $idUser = DB::table('users')->insertGetId(
    ['email' => $request->email,'name' => $request->name,'tipo' =>$request->tipo,'img'=>$img,'password' =>Hash::make(654321)]
);
 
 
 //inserir na tabela perfil 
 $idperfil=DB::table('perfil')->insertGetId(
  ['id_user' => $idUser,'pais' => $request->pais,'bilhete' => $request->bilhete,'facebook' => $request->facebook,'instagram' => $request->instagram,'status' =>false]
 );
 
 DB::table('contacto')->insert(
    ['id_perfil' => $idperfil,'telefone' => $request->telefone]
   );

   if(DB::table('academia')->insert(['id_user' => $idUser])){
    return response()->json('success','Inserido com sucesso');  
}

}

else{
    if($request->tipo=="aluno"){
     
     
        if($request->file('img')->isValid()){
    $img=$request->file('img')->store('aluno');
    
    }  

     //Regista o user e retorna o ID gerado
  $idUser = DB::table('users')->insertGetId(
    ['email' => $request->email,'name' => $request->name,'tipo' =>$request->tipo,'img'=>$img,'password' =>Hash::make(654321)]
);
    
    //inserir na tabela perfil 
    $idperfil=DB::table('perfil')->insertGetId(
     ['id_user' => $idUser,'pais' => $request->pais,'bilhete' => $request->bilhete,'facebook' => $request->facebook,'instagram' => $request->instagram,'status' =>false]
    );
    
    DB::table('contacto')->insert(
       ['id_perfil' => $idperfil,'telefone' => $request->telefone]
      );
   
      if(DB::table('aluno')->insert(['id_user' => $idUser])){
        return response()->json('success','Inserido com sucesso');  
    }

}

 }
    }
}
    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public  function show($id)
    {
        return User::find($id);   
    }

   
    public function update(Request $request, $id)
    {
        if(DB::table('users')          
        ->where('id','=',$id)
        ->update(['name'=>$request->name,'email'=>$request->email]))
    {
        return redirect()->back();
    }      
    }

   
    public function destroy($id)
    {
        User::find($id)->delete();
        return response()->json('success','Eliminado com sucesso');  
    }

    public function perfil()
    {
        return view('admin.perfis.editarPerfil');
    }

    public function editarPerfil(Request $request, $id)
    {     
            if($request->file('img')->isValid()){
        $img=$request->file('img')->store('utilizadores');
    }
         
        if(empty($request->password)){
            DB::table('users')->where('id','=',$id)->update(['name'=>$request->name,'email'=>$request->email,'img'=>$img]);
        }else{
            DB::table('users')->where('id','=',$id)->update(['name'=>$request->name,'img'=>$img,'email'=>$request->email,'password'=>Hash::make($request->password)]);
        }
       
        if(DB::table('perfil')          
        ->where('id','=',$id)
        ->update(['pais'=>$request->pais,'bilhete'=>$request->bilhete,'facebook'=>$request->facebook,'instagram'=>$request->instagram,'descricao'=>$request->descricao]))
    {
        return response()->json('success','Actualizado com sucesso');      }  
}
}

