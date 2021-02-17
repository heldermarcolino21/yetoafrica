<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ComentablogController extends Controller
{
    public function store(Request $request){
        // dd($request->all());
         $coment=$request->user()->comentarioblog()->create($request->all());
        // $author=$coment->blog->user;
         //$author->notify(new PulicacaoBlogComent($coment));
 
         return redirect()
         ->route('blogfront.show',$coment->blog->id)
         ->withSuccess('Comentário Realizado com sucesso');
     }
}
