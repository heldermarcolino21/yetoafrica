@extends('layouts.admin')

@section('content')
<div class="site">
		@include('layouts.menu')
		<div class="base-geral">
        <div class="caixa">
			<h2 class="titulo"><span class="case"></i>Meus Alunos</span></h2>
        </div>

<pagina tamanho="12">
    <painel>

        <servicos
         v-bind:titulos="['#','Nome','Descricao','icone','Data']"
       
         v-bind:itens="{{json_encode($listaServ)}}"
       

 
     editar="/servicos/"
     deletar="/servicos/"  
     criar="#criar" 
     sms="{{Session::get('sms')}}"
 modal="sim" token="{{ csrf_token() }}"
 ordem="desc" ordemcol="0"
>
         
</servicos> 
      <div align="center">
      {{$listaServ}}
      </div>
      </painel>
</pagina>
<modal nome="adicionar">
<formulario css="" action="{{route('servicos.store')}}" method="post" enctype="multipart/form-data" token="{{ csrf_token() }}">  
    {{ csrf_field() }}

<div class="row">
    <div class="col col-md-6">
            <div class="form-group">
                <label for="specialidade" class="control-label">Nome da Categoria: </label> 
                <input type="text" class="form-control has-feedback-left" id="inputSuccess2" placeholder="Design" id="serv_nome" name="serv_nome"  >
               
            </div>
    </div>

    <div class="col col-md-6">
            <div class="form-group">
                <label for="specialidade" class="control-label">Icone: </label> 
                <input type="text" class="form-control has-feedback-left" id="inputSuccess2" placeholder="Design" id="serv_icone" name="serv_icone"  >
               
            </div>
    </div>
</div>

    
    <div class="row">
     <div class="col col-lg-12">
            <div class="form-group"> 
                <label for="email" class="control-label">Descricao</label>
                <ckeditor   name="serv_descricao"  id="serv_desc" v-bind:config="{
                    toolbar: [
                      [ 'Bold', 'Italic', 'Underline', 'Strike', 'Subscript', 'Superscript' ]
                    ],
                    height: 200
                  }" ></ckeditor>
               
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
    <formulario id="formEditar" v-bind:action="'/servicos/' + $store.state.item.id" method="put" enctype="multipart/form-data" token="{{ csrf_token() }}">
       {{ csrf_field() }}
  
<div class="row">
    <div class="col col-md-6">
            <div class="form-group">
                <label for="specialidade" class="control-label">Nome do Serviço: </label> 
                <input type="text" class="form-control has-feedback-left" id="inputSuccess2" placeholder="Design" id="serv_nome" name="serv_nome" v-model="$store.state.item.serv_nome" >
               
            </div>
    </div>

    <div class="col col-md-6">
            <div class="form-group">
                <label for="specialidade" class="control-label">Icone: </label> 
                <input type="text" class="form-control has-feedback-left" id="inputSuccess2" placeholder="Design" id="serv_icone" name="serv_icone" v-model="$store.state.item.serv_icone" >
            </div>
    </div>
</div>

    
    <div class="row">
     <div class="col col-lg-12">
            <div class="form-group"> 
                <label for="email" class="control-label">Descricao</label>
                <ckeditor  name="serv_descricao"  id="serv_desc1" v-model="$store.state.item.serv_descricao"  v-bind:config="{
                    toolbar: [
                      [ 'Bold', 'Italic', 'Underline', 'Strike', 'Subscript', 'Superscript' ]
                    ],
                    height: 200
                  }" ></ckeditor>
               
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
