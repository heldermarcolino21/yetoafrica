<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Categorias;
use App\Models\Cursos;
use App\Models\Formador;
use App\Models\Modulos;
use App\Models\Aulas;
use App\Models\Pedido;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;

class CursoController extends Controller
{

    private $cursos;

    public function __construct(Cursos $cursos){
              $this->cursos=$cursos;
    }

  
    public function index()
    {
        $listaMigalhas=json_encode([
            ["titulo"=>"Home","url"=>route('admin')],
            ["titulo"=>"Cursos","url"=>route('cursos.index')]
        ]);
        $listaCursos=Cursos::listaCursos();
        $listaFormador=Formador::listarFormador();         
        $listaCategoria=Categorias::all();
        return view('admin.cursos.index',compact('listaMigalhas','listaCursos','listaFormador','listaCategoria'));  
    }
  
    public function store(Request $request)
    {
        
    $dados=new Cursos;
    $img=$request->file('curso_img');
    if($request->file('curso_img')->isValid()){
          $img=$request->file('curso_img')->store('curso');
   }
    
    /*$dados->*/$curso_nome=$request->input('curso_nome');
    /*$dados->*/$curso_status=false;
    /*$dados->*/$curso_descricao=$request->input('curso_descricao');
    /*$dados->*/$curso_preco=$request->input('curso_preco');
    /*$dados->*/$curso_duracao=$request->input('curso_duracao');
    /*$dados->*/$curso_data=date('Y-m-d');
    /*$dados->*/$curso_img=$img;
    /*$dados->*/$id_formador=$request->input('id_formador');
    /*$dados->*/$id_categoria=$request->input('categoria_id');
                $curso_link = null;
                $created = null;
                $updated = null;

    //inserir na tabela Curso
    if(DB::table('cursos')->insert(
        ['curso_nome'=>$curso_nome,'curso_preco'=>$curso_preco,'curso_img'=>$curso_img,'curso_descricao'=>$curso_descricao,'curso_data'=>$curso_data,'curso_status'=>$curso_status,'curso_duracao'=>$curso_duracao,'curso_link'=>$curso_link,'id_formador'=>$id_formador,'created_at'=>$created,'updated_at'=>$updated,'id_categoria'=>$id_categoria]))
        {
            Session::flash('sms', 'Inserido com sucesso');
            return redirect()->back();
        }
        else
        {
            echo"error";
        }







    //inserir na tabela perfil 
 
 /*if($dados->save()){
    Session::flash('sms','Inserido com sucesso');
    return redirect()->back();
    }
  else{
      echo "Error";
  }  */

    }

    public function show($id)
    {
       return Cursos::find($id);
    }
  
    public function update(Request $request, $id)
    {
        $id1 = base64_decode($id);
        $img=$request->file('curso_img');

    if($img!=null){    
        if($request->file('curso_img')->isValid()){
              $img=$request->file('curso_img')->store('curso');
       }
        if(DB::table('cursos')          
        ->where('id','=',$id1)
        ->update(['curso_nome'=>$request->curso_nome,'curso_preco'=>$request->curso_preco,'curso_descricao'=>$request->curso_descricao,'curso_data'=>date('Y/m/d'),'curso_duracao'=>$request->curso_duracao,'id_categoria'=>$request->categoria_id,'curso_img'=>$img]))
    {
        Session::flash('sms','Actualizado com sucesso');
        return redirect()->back();
    }      
    }

    if(DB::table('cursos')          
    ->where('id','=',$id1)
    ->update(['curso_nome'=>$request->curso_nome,'curso_preco'=>$request->curso_preco,'curso_descricao'=>$request->curso_descricao,'curso_data'=>date('Y/m/d'),'curso_duracao'=>$request->curso_duracao,'id_categoria'=>$request->categoria_id]))
{
    Session::flash('sms','Actualizado com sucesso');
    return redirect()->back();
}      
}

    public function destroy($id)
    {
        Cursos::find($id)->delete();
        Session::flash('sms','O curso foi eliminado com sucesso');
        return redirect()->back();
    }
  
    
    //funções de não administrativas

    public function detalhes($id)
    {
        $id1 = base64_decode($id);
        $listaCurso=Cursos::find($id1);
        $listaCategorias=Categorias::all();
        $curso="active";
        $recebe="";
        //////////////////////////////////

        
        
        //dd($listaCurso); 
        $modulos=Modulos::listaModul($id1);
        $listAulas=Aulas::listaAulaCurso($id1);
        
        
       //dd($listaCurso);
       foreach($listaCategorias as $lista){
             if($lista->id==$listaCurso->id_categoria)
                $recebe=$lista->cat_nome;
       }


       if(isset(auth()->user()->id)){
        $listaPedido=Pedido::cursoPr(auth()->user()->id);
        return view('admin.cursos.detalhes',compact('listaCurso','recebe','curso','modulos','listaPedido','listAulas','listAula'));  
    }else{
        return view('admin.cursos.detalhes',compact('listaCurso','recebe','curso','modulos','listAulas'));  
    }
    }
 
 
//Lista cursos no frontend
    public function cursos()
    {
        $listaCursos=Cursos::listaCursos();
        $listaCategorias=Categorias::all();
        $curso="active";
        if(isset(auth()->user()->id)){
            $listaPedido=Pedido::cursoPr(auth()->user()->id);
        return view('admin.cursos.cursos',compact('listaCursos','listaCategorias','curso','listaPedido'));  
    }else{
        return view('admin.cursos.cursos',compact('listaCursos','listaCategorias','curso'));  
    }

    }

    public function cursoCategorias($id){
        $id1 = base64_decode($id);
        $listaCursosCat=Cursos::listaCursoCat($id1);
        $listaCategorias=Categorias::all();
        $curso="active";
        if(isset(auth()->user()->id)){
            $listaPedido=Pedido::cursoPr(auth()->user()->id);
        return view('admin.cursos.cursoscat',compact('listaCursosCat','listaCategorias','curso','listaPedido'));  
        }else{
            return view('admin.cursos.cursoscat',compact('listaCursosCat','listaCategorias','curso'));
        }
    }

    
    public function busca(Request $request){
        //dd($request);
        $filters=$request->except('_token');
        $listaCategorias=Categorias::all();
        $listaCursos=$this->cursos->searche($request->search);
        $curso="active";
        if(isset(auth()->user()->id)){
            $listaPedido=Pedido::cursoPr(auth()->user()->id);
        return view('admin.cursos.buscacurso',compact('listaCursos','listaCategorias','curso','listaPedido','filters'));  
        }else{
            return view('admin.cursos.buscacurso',compact('listaCursos','listaCategorias','curso','filters'));
        }

    }

    
}
