@extends('layouts.admin')

@section('content')

@can('est') 

<div class="site">
		@include('layouts.menu')
    
        <div class="base-geral">
			<div class="caixa">
				<h2 class="titulo"><span class="case"><i class="ico duvida"></i>Meus Cursos</span> Lista de Cursos</h2>
			</div>
		<div class="base-home"> 


        <div class="rows cursos py-3">
 @forelse ($compras as $pedido)

@foreach ($pedido->pedido_cursos_itens as $pedido_curso)
                <div class="col-3">
                        <div class="caixa">
                                <img src="http://localhost:/nossafrica/storage/app/public/{{ $pedido_curso->curso->curso_img }}">
                                <div class="del-curso">
                                        <p>{{$pedido_curso->curso->curso_nome}}</p>
                                        <small>Desempenho <b>50%</b></small>
                                        <progress value="4" max="7"></progress>
                                        <a href="/cursoestudante/{{$pedido_curso->curso->id}}" class="btn">Ir para o curso</a>
                                </div> 
                        </div>
                </div>
 @endforeach

                    @empty
                    @if ($cancelados->count() > 0)
                        Neste momento não há nenhuma compra valida.
                    @else
                        Você ainda não fez nenhuma compra.
                    @endif
                    @endforelse


        </div>
</div>
                    
		
		</div>
	</div>


@endcan

@endsection