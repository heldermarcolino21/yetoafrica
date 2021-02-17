@extends('layouts.admin')

@section('content')
<div class="site">
		@include('layouts.menu')
    
		<div class="base-geral">			
            <div class="caixa">
				<h2 class="titulo"><span class="case"><i class="ico user"></i>Meu perfil</span> Editar e alterar dados do perfil</h2>
			</div>
			<div class="base-home">
				<div class="rows base-perfil py-3">
				<div class="col-12">
				<div class="caixa">
                    <form action="/editarperfil/{{auth()->user()->id}}" method="post" enctype="multipart/form-data">
                    {{ csrf_field() }}
					<fieldset class="mt-1">
				
					<div class="rows">
						<div class="col-6">
							
							<div class="thumb">
                            @if(@isset(Auth()->user()->foto))
                                <img src="http://localhost:/nossafrica/storage/app/public/{{auth()->user()->foto}}">
                                @else
				                  <img src="/backend/img/foto01.png">
                                  @endif
								<input type="file" name="foto">
							</div>
							<small class="text-center d-block"></small>
						</div>
						
						<div class="col-6">
							<div class="py-1">
								<label>Nome</label>
							  <input type="text" placeholder="Digita o nome" name="name" value="{{auth()->user()->name}}">
							</div>
							<div class="py-1">
								<label>Email</label>
								<input type="email" placeholder="Digita o email" name="email" value="{{auth()->user()->email}}">
							</div>
							<div class="py-1">
								<label>Senha</label>
								<input type="password" name="password" placeholder="Senha">
							</div>
						</div>
					</div>
					</fieldset>
					<fieldset>
					<legend>Dados pessoais</legend>
					<div class="rows">
						<div class="col-3 mb-3">
							<label>BI</label>
							<input type="text" placeholder="005902675LA044" name="bilhete">
						</div>
						<div class="col-3 mb-3">
							<label>Data de nascimento</label>
							<input type="date" name="data_nasc" placeholder="Data">
						</div>
						<div class="col-3 mb-3">
							<label>Telefone</label>
							<input type="text" name="telefone" placeholder="Telefone">
						</div>
						<div class="col-3 mb-3">
							<label>Profissão</label>
							<input type="text" name="profissao" placeholder="Profissão">
						</div>
					</div>
					</fieldset>
					
					<fieldset>
					<legend>Endereço</legend>
					<div class="rows">
						<div class="col-4 mb-3">
							<label>Bairro</label>
							<input type="text" name="bairro" placeholder="Bairro">
						</div>
						<div class="col-4 mb-3">
							<label>Município</label>
							<input type="text" name="municipio" placeholder="Município">
						</div>
						<div class="col-4 mb-3">
							<label>Província</label>
							<input type="text" name="provincia" placeholder="Endereço">
						</div>
					</div>
				
					</fieldset>
					
					<input type="submit" value="Atualizar perfil" class="btn btn-success d-table m-auto px-5 width-auto">
					</form>
				</div>
				</div>
				</div>
		
		
		
		</div>        
		
		</div>
	</div>

@endsection