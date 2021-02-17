@extends('layouts.admin')

@section('content')

@can('eAdmin')

<div class="site">
		@include('layouts.menu')
		<div class="base-geral">
			
                        <div class="caixa">
                                <div class="col">                               
                                
                                 <a href="url"> Meu Aprendizado</a>                            
                                

                                </div>                               
                        </div>           
                      
                </div>

@endcan          

@can('est')

<div class="site">
		@include('layouts.menu')
		<div class="base-geral">
			
        <div class="caixa">
			<h2 class="titulo"><span class="case"><i class="ico duvida"></i>Home</span> Seja Bem Vindo</h2>
		</div>

<div class="base-home">
        <div class="rows detalhes py-3">
			<div class="col-6">
			
				<figure class="caixa">
					<div class="thumb"><a href="/perfil"><img src="http://localhost:/nossafrica/storage/app/public/{{auth()->user()->foto}}">	</a></div>
					<figcaption>
					<a href="/perfil"><strong>{{auth()->user()->name}}</strong></a>
							<a href="/perfil"><small><b>Meu Perfil</b></small></a>
							<a href="/perfil"><small>{{auth()->user()->email}}</small></a>
					</figcaption>
				</figure>
			
			</div>
			
			<div class="col-6">
				<div class="caixa" >
				<center>
				<a href="/carrinho/compras">	<i class="ico video"></i></a>
				<a href="/carrinho/compras">	        <small>Meus Cursos</small></a>
					<h3>{{$contac}}</h3>
				</div>
				</center>
			</div>
		
        </div>
    <!--
<div class="rows listagem">
                <div class="col-6 matriculados d-flex mb-3">
                    <div class="caixa">
                        <span class="titulo2">CURSOS MATRICULADOS</span>
						<div class="rolagem">
                           <div class="lista"> 
						   <table cellpadding="0" cellspacing="0" border="0" width="100%">
								<thead>
									<tr>
										<th align="left">CURSOS</th>
									</tr>
								</thead>
								<tbody>
									
									<tr>
									@foreach($cursos as $curso)
									<td><a href="/cursoestudante/{{$curso->id}}">{{$curso->curso_nome}}</a></td></tr>                   
								    @endforeach	
								</tr> 		
								</tbody>
							</table>
							</div>
						</div> -->
						<!--
						<div class="naoativo">
							<img src="img/nao-matriculado.png"><h2>Nenhum curso matriculado</h2>
						</div>
						-->
           <!--         </div>
                </div> -->
          <!--      <div class="col-6 assistidos d-flex mb-3">						
                        <div class="caixa">						
                           <span class="titulo2">ÚLTIMAS AULAS ASSISITIDAS</span>
								<div class="rolagem mb-3">
                                <div class="lista">
                                        <table cellpadding="0" cellspacing="0" border="0">
                                                <thead>
                                                    <tr>
                                                       <th align="left">CURSO</th>
                                                       <th>DATA</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                        <tr>
                                                                <td><i></i> Lógica de programaçao com PHP</td>
                                                                <td align="center">12/05/2018</td>
                                                        </tr>
                                                        <tr>
                                                                <td><i></i> Lógica de programaçao com PHP</td>
                                                                <td align="center">12/05/2018</td>
                                                        </tr>
                                                        <tr>
                                                                <td><i></i> Lógica de programaçao com PHP</td>
                                                                <td align="center">12/05/2018</td>
                                                        </tr>
                                                        <tr>
                                                                <td><i></i> Lógica de programaçao com PHP</td>
                                                                <td align="center">12/05/2018</td>
                                                        </tr>
                                                        <tr>
                                                                <td><i></i> Lógica de programaçao com PHP</td>
                                                                <td align="center">12/05/2018</td>
                                                        </tr>
                                                        <tr>
                                                                <td><i></i> Lógica de programaçao com PHP</td>
                                                                <td align="center">12/05/2018</td>
                                                        </tr>
                                                        <tr>
                                                                <td><i></i> Lógica de programaçao com PHP</td>
                                                                <td align="center">12/05/2018</td>
                                                        </tr>
                                                        <tr>
                                                                <td><i></i> Lógica de programaçao com PHP</td>
                                                                <td align="center">12/05/2018</td>
                                                        </tr>
                                                        <tr>
                                                                <td><i></i> Lógica de programaçao com PHP</td>
                                                                <td align="center">12/05/2018</td>
                                                        </tr>
                                                        <tr>
                                                                <td><i></i> Lógica de programaçao com PHP</td>
                                                                <td align="center">12/05/2018</td>
                                                        </tr>
                                                </tbody>
                                        </table>
                                </div>
                                </div>
                                <a href="meus_cursos.html" class="btn btn-curso d-table">VER MEUS CURSOS</a>
								-->
					<!--	<div class="naoativo">
							<img src="img/nao-matriculado.png"><h2>Nenhuma aula assistida</h2>
						</div>
						-->
              <!--
			            </div>
                </div> -->
        </div>
	</div>        

	
		
		</div>
    </div>

@endcan


@can('form')

<div class="site">
		@include('layouts.menu')
		<div class="base-geral">
                   <button class="btn success">Novo Curso</button>
                        <div class="container">
                                {{$listMeuscursos}}                  
                                @foreach ($listMeuscursos as $curso)
                                 
                                 <img src="http://localhost:/nossafrica/storage/app/public/{{$curso->curso_img}}" alt="" style="max-width:100%;width:190px; height: 160px; object-fit: cover;">{{$curso->curso_nome}}<br>
                                 <span>{{$curso->curso_preco}} kz</span>                

                                <a id="mu-abtus-video" href="{{$curso->curso_link}}" target="mutube-video">vídeo</a>
                                                                           
                                @endforeach                             
                        </div>
                </div>
</div>

@endcan

@can('acad')

<div class="site">
		@include('layouts.menu')
		<div class="base-geral">
			
        <div class="caixa">
		
		</div>
 </div>
        </div>
  		</div>
    </div>
@endcan          


@endsection