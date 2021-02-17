<hr>
@if(auth()->check())
@if(session('success'))
<div class="alert alert-sucess">
         {{session('success')}}
</div>
@endif

@if($errors->any())
<div class="alert alert-danger">
       <ul>
           @foreach($errors->all() as $error)
                   <li>{{$error}}</li>
           @endforeach
       </ul>
</div>
@endif
<form action="{{route('comentario.store')}}" method="post" class="form">
    @csrf
    <input type="hidden" name="publicacao_id" value="{{$publicacao->id}}">
<div class="form-group">
      <input type="text" name="titulo" placeholder="Título" class="form-control">
</div>

<div class="form-group">
      <textarea name="conteudo" cols="30" rows="10" placeholder="Comentário" class="form-control"></textarea>
</div>

<div class="form-group">
      <button type="submit" class="btn btn-primary">Enviar</button>
</div>
</form>
@else
<p>Precisa estar logado para fazer os comentários.</p><a href="{{route('login')}}"></a>
@endif


<hr>
<h3>Comentários({{$publicacao->comentarios->count()}})</h3>
@forelse($publicacao->comentarios as $comentario)
  <p>       
<b>{{$comentario->user->name}} comentou:</b>
{{$comentario->titulo}} - {!!$comentario->conteudo!!}
 </p>
@empty
<p>Nenhum comentário ainda foi feito</p>
@endforelse