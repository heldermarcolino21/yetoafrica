@extends('layouts.admin')

@section('content')
<div class="site">
		@include('layouts.menu') 
		<div class="base-geral">
		
		<div class="caixa">
			<h2 class="titulo"><span class="case"><i class="ico duvida"></i>Curso</span> Curso de {{$curso->curso_nome}}</h2>
		</div>
		
		<div class="base-home">
			<div class="rows base-cursos py-3">
				<div class="col-12">
						<div class="caixa">
							<div class="base-caixa-curso rows">
								<div class="col-4">
									<div class="thumb"><img src="http://localhost:/nossafrica/storage/app/public/{{$curso->curso_img}}"></div>
								</div>
								<div class="col-8">
									<span class="titulo">FORMAÇÃO DE {{$curso->curso_nome}}</span>
									<ul>
										<li><i class="ico data"></i><small>DATA DE PUBLICAÇÃO:</small><span>{{$curso->curso_data}}</span></li>
										<li><i class="ico exercicio"></i><small>quantidade:</small> <span>{{$contMod}} módulos</span></li>
										<li><i class="ico qtd"></i><small>Quantidade:</small> <span>{{$contAula}} Aulas</span></li>
									</ul>
								</div>	
							</div>
				        </div>
							
						 
						
	<div class="lista">
						<div class="caixa">
						<span class="titulo2">Módulos</span>
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
	<table cellpadding="0" cellspacing="0" border="0">
								
							<tbody>						 
								@foreach($listAulas as $aulas)	
								@if($aulas->modulo_id==$modulo->id)
								<tr>
										<td align="left"><a href="/aulaestudante/{{$aulas->id}}"><i class="ico ititulo"></i>{{$aulas->aula_titulo}}</a></td>
										<td align="left"><i class="ico iduracao"></i>{{$aulas->aula_duracao}}</td>
										<td align="left"><i class="ico iassistido"></i>visto</td>
										<td align="left"><i class="ico iaula"></i>Aula</td>
								</tr>	
								@endif
								@endforeach				 
											
								</tbody>
							</table>
						</div>
						</div>
					</div>
				<!--sidebar									
			
	</div>
  </div>

</div>
<!-- Accordion card -->
@endforeach
<!-- Accordion card -->

</div>



			</div>


		


@endsection