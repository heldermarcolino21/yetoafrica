<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Blog;
use App\Models\CatBlog;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;

class BlogController extends Controller
{

    private $blog;

    public function __construct(Blog $blog){
              $this->blog=$blog;
    }

    public function index()
    {
        $listaMigalhas=json_encode([
            ["titulo"=>"Home","url"=>route('admin')],
            ["titulo"=>"Blog","url"=>route('blog.index')]
        ]);
        $listaBlog=Blog::listaBlog();
        $listaCategorias=CatBlog::all();
        return view('admin.blog.index',compact('listaMigalhas','listaBlog','listaCategorias')); 
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
        $dados=new Blog;
        $img=$request->file('blog_foto');
        if($request->file('blog_foto')->isValid()){
              $img=$request->file('blog_foto')->store('blog');
       }
       $dados->blog_titulo=$request->input('blog_titulo');
        $dados->blog_descricao=$request->input('blog_descricao');
        $dados->blog_data=date('Y-m-d');
        $dados->blog_foto=$img;
        $dados->categ_id=$request->input('categ_id');
      //inserir na tabela perfil 
     if($dados->save()){
        Session::flash('sms','Inserido com sucesso');
        return redirect()->back();
        }
    }

    public function show($id)
    {
        return Blog::find($id);
    }

    public function update(Request $request,$id)
    {
        $id1 = base64_decode($id);
        $img=$request->file('blog_foto');

    if($img!=null){          
        if($request->file('blog_foto')->isValid()){
              $img=$request->file('blog_foto')->store('blog');
       }

        if(DB::table('blog')          
            ->where('id','=',$id1)
            ->update(['blog_titulo'=>$request->blog_titulo,'blog_descricao'=>$request->blog_descricao,'blog_data'=>date('Y-m-d'),'blog_foto'=>$img,'categ_id'=>$request->categ_id]))
        {
            Session::flash('sms','Actualizado com sucesso');
            return redirect()->back();
        } 
        
    }

    if(DB::table('blog')          
    ->where('id','=',$id1)
    ->update(['blog_titulo'=>$request->blog_titulo,'blog_descricao'=>$request->blog_descricao,'blog_data'=>date('Y-m-d'),'categ_id'=>$request->categ_id]))
{
    Session::flash('sms','Actualizado com sucesso');
    return redirect()->back();
} 

    }
       

    public function destroy($id)
    {
        Blog::find($id)->delete();
        Session::flash('sms','A publicação foi eliminado com sucesso');
        return redirect()->back();
    }

    public function blog(){
        $listaPublicacao=Blog::listaBlog();
        $blog="active";
        $listaUltimas=Blog::listaBlog();
        $listaCategorias=CatBlog::all();
        return view('admin.blog.blog',compact('listaPublicacao','blog','listaUltimas','listaCategorias'));
    }

    public function blogsingle($id){
        $id1 = base64_decode($id);
        $listaPublicacao=Blog::find($id1);
        $listaUltimas=Blog::listaBlog();
        $blog="active";
        $listaCategorias=CatBlog::all();
        return view('admin.blog.blog_single',compact('listaPublicacao','blog','listaCategorias','listaUltimas'));
    }

    public function listaBlogcateg($id){
        $id1 = base64_decode($id);
        $listaPublicacao=Blog::listaBlogcat($id1);
        $blog="active";
        $listaUltimas=Blog::listaBlog();
        $listaCategorias=CatBlog::all();
        return view('admin.blog.blogCat',compact('listaPublicacao','blog','listaUltimas','listaCategorias'));
    }

    public function search(Request $request){
        $filters=$request->except('_token');
        $listaPublicacao=$this->blog->searche($request->search);
        $blog="active";
        $listaUltimas=Blog::listaBlog();
        $listaCategorias=CatBlog::all();
        return view('admin.blog.blogCat',compact('listaPublicacao','blog','listaUltimas','listaCategorias','filters'));

    }

}
