@extends('layouts.admin')

@section('content')
<div class="site">
		@include('layouts.menu')
    <div class="base-geral">
			<div class="caixa">
				<h2 class="titulo"><span class="case"><i class="ico curso"></i>{{$curso[0]->curso_nome}}</span>{{$curso[0]->modulo_titulo}} <i class="seta"></i>{{$curso[0]->aula_titulo}}</h2>
			</div>
			<div class="base-home">
			<div class="rows base-cursos ver_videos py-3">
				<div class="col-9 d-flex">
						<div class="caixa">
							<span class="titulo2">{{$listAula->aula_titulo}}</span>
							<div class="caixa-video">
								<div class="caixa-embed">
									<iframe src="{{$listAula->aula_link}}" class="embed-item" width="655" height="360" frameborder="0" allow="autoplay; encrypted-media" allowfullscreen></iframe>
								</div>
								<div class="controles">
									<a href="/aulaestudante/{{$listAula->id}}" class="btn anterior">Anterior</a>
									<a href="/aulaestudante/{{$listAula->id}}" class="btn proximo">Próximo</a>  
								</div>
							</div>
						</div>
							
				</div>
				<div class="col-3 d-flex">	
					<div class="caixa">					
					<div class="menu-sidebar">		
						<span class="titulo2">Lista de aulas</span>
						<div class="scroll-lista">
							<ul>
							<!--Accordion wrapper-->
<div class="accordion md-accordion" id="accordionEx1" role="tablist" aria-multiselectable="true">
@foreach($listamodulos as $modulo)
<!-- Accordion card -->
<div class="card">

  <!-- Card header -->
  <div class="card-header" role="tab" id="headingTwo{{$modulo->id}}">
	<a class="collapsed" data-toggle="collapse" data-parent="#accordionEx1" href="#collapseTwo{{$modulo->id}}"
	  aria-expanded="false" aria-controls="collapseTwo1">
	  <h5 class="mb-0">
	  {{$modulo->modulo_titulo}} <i class="fas fa-angle-down rotate-icon"></i>
	  </h5>
	</a>
  </div>

  <!-- Card body -->
  <div id="collapseTwo{{$modulo->id}}" class="collapse" role="tabpanel" aria-labelledby="headingTwo{{$modulo->id}}"
	data-parent="#accordionEx1">
	<div class="card-body">
<ul>
@foreach($listAulas as $aulas)	
								@if($aulas->modulo_id==$modulo->id)
								<tr>
										<li align="left"><a href="/aulaestudante/{{$aulas->id}}"><i class="marcado"></i>{{$aulas->aula_titulo}}</a></td>
										
								</tr>	
								@endif
								@endforeach		
</ul>					 
									 
											
							
						</div>
						</div>
						@endforeach		

					</div>

</div>
							</ul>
						</div>
					</div>	
					</div>	
				</div>
			</div>
			<div class="rows base-cursos ver_videos pb-3">
				<div class="col-9 mb-3">
					<div class="v-downloads">
					<div class="caixa">
						<span class="titulo2">ARQUIVOS DISPONÍVEÍS PARA DOWNLOADS</span>						
							<ul>
								<li><a href="http://localhost:/nossafrica/storage/app/public/{{$listAula->aula_conteudo}}" class="icon" target="_blank">Conteúdo complementar</a></li>	
								
							</ul>
					</div>
				</div>
				
				</div>
			</div>				
		
@endsection

