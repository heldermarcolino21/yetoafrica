@extends('layouts.admin')

@section('content')
<div class="site">
		@include('layouts.menu')
		<div class="base-geral">
        <div class="caixa">
			<h2 class="titulo"><span class="case"><i class="ico duvida"></i>Meus Alunos</span></h2>
        </div>

<pagina tamanho="12">
    <painel>

        <newslater
         v-bind:titulos="['#','Nome']"
       
         v-bind:itens="{{json_encode($listaNewslater)}}"
       

 
     editar="/newslater/"
     deletar="/newslater/"  
     criar="#criar" 
     sms="{{Session::get('sms')}}"
 modal="sim" token="{{ csrf_token() }}"
 ordem="desc" ordemcol="0"
>
         
</newslater> 
      <div align="center">
      {{$listaNewslater}}
      </div>
      </painel>
</pagina>
<modal nome="adicionar">
<formulario css="" action="{{route('newslater.store')}}" method="post" enctype="multipart/form-data" token="{{ csrf_token() }}">  
    {{ csrf_field() }}

<div class="row">
    <div class="col col-md-12">
            <div class="form-group">
                <label for="specialidade" class="control-label">Email: </label> 
                <input type="text" class="form-control has-feedback-left" id="inputSuccess2" placeholder="Design" id="serv_nome" name="email"  >
               
            </div>
    </div>
    
    </div>

    <div class="row">
  
    <div class="col-lg-12">
    <input type="submit" value="Enviar" class="btn btn-success" name="Cadatrar">
    </div>
    </div>
    
</formulario>
</modal>

<modal nome="editar">
    <formulario id="formEditar" v-bind:action="'/newslater/' + $store.state.item.id" method="put" enctype="multipart/form-data" token="{{ csrf_token() }}">
       {{ csrf_field() }}
  
<div class="row">
    <div class="col col-md-12">
            <div class="form-group">
                <label for="specialidade" class="control-label">Nome do Serviço: </label> 
                <input type="text" class="form-control has-feedback-left" id="inputSuccess2" placeholder="Design" id="email" name="email" v-model="$store.state.item.email" >
               
            </div>
    </div>

     </div>
  </formulario>
    <span slot="botoes">
      <button form="formEditar" class="btn btn-info">Atualizar</button>
    </span>
  </modal>
                </div>
                </div>
@endsection
