@extends('layouts.admin')
@section('content')
<div class="site">
		@include('layouts.menu')
		<div class="base-geral">
        <div class="caixa">
			<h2 class="titulo"><span class="case"><i class="ico duvida"></i>Publicações</span></h2>
        </div>
@forelse($pub as $publicacao)
<a href="{{route('publicacao.show',$publicacao->id)}}">Detalhes</a>
{{$publicacao->titulo}} ({{$publicacao->comentarios->count()}})
<hr>
@empty
<p>Nenhuma publicacao foi feita</p>
@endforelse

{!!$pub->links()!!}

</div>
</div>
@endsection