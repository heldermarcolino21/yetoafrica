@extends('layouts.admin')

@section('content')
<div class="site">
		@include('layouts.menu')
		<div class="base-geral">
        <div class="caixa">
			<h2 class="titulo"><span class="case"><i class="ico duvida"></i>Módulos</span></h2>
        </div>

<pagina tamanho="12">
    <painel titulo="Lista Aula">

        <aula
         v-bind:titulos="['#','Título','Duração','Modulo']"
       
         v-bind:itens="{{json_encode($listAulas)}}"
       


     editar="/aula/"
     deletar="/aula/"    
     criar="#criar" 
     sms="{{Session::get('sms')}}"
     
 modal="sim" token="{{ csrf_token() }}"
 ordem="desc" ordemcol="0"
>
         
        </aula> 
      <div align="center">
      {{$listAulas}}
      </div>
      </painel>
</pagina>
<modal nome="adicionar">
<formulario css="" action="{{route('aula.store')}}" method="post" enctype="multipart/form-data" token="{{ csrf_token() }}">  
    {{ csrf_field() }}
    <div class="row">
    <div class="col col-md-6">
            <div class="form-group">
                <label for="specialidade" class="control-label">Título: </label> 
                <input type="text" class="form-control has-feedback-left" id="inputSuccess2" placeholder="Título" id="aula_titulo" name="aula_titulo">
            </div>
    </div>

    <div class="col col-md-6">
            <div class="form-group">
                <label for="specialidade" class="control-label">Vídeo: </label> 
                <input type="text" class="form-control has-feedback-left" id="inputSuccess2" placeholder="Vídeo" id="aula_link" name="aula_link">
            </div>
    </div>
    </div>
  
    <div class="row">
    <div class="col col-md-6">
            <div class="form-group">
                <label for="specialidade" class="control-label">Duração: </label> 
                <input type="text" class="form-control has-feedback-left" id="inputSuccess2" placeholder="Duração" id="aula_duracao" name="aula_duracao"  >
            </div>
    </div>


  <div class="col col-md-6">
    <div class="form-group">
    <label for="titulo" class="control-label">Módulo</label>
  <select  name="modulo_id" class="form-control">
  <option value="{{$modulo->id}}">{{$modulo->modulo_titulo}}</option>	
  					
  </select>
</div>  
</div>
</div>

<div class="row">
     <div class="col col-lg-12">
            <div class="form-group"> 
                <label for="email" class="control-label">Descricao</label>
                <ckeditor  name="aula_descricao"  id="aula_desci"  v-bind:config="{
                    toolbar: [
                      [ 'Bold', 'Italic', 'Underline', 'Strike', 'Subscript', 'Superscript' ]
                    ],
                    height: 200
                  }"></ckeditor>
            </div>
        </div>
  </div>

  <div class="row">
    <div class="col col-md-12">
            <div class="form-group">
                <label for="specialidade" class="control-label">Conteúdo Complementar: </label> 
                <input type="file" class="form-control has-feedback-left" id="inputSuccess2" placeholder="Design" id="aula_conteudo" name="aula_conteudo">
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
    <formulario id="formEditar" v-bind:action="'/aula/' + $store.state.item.id" method="put" enctype="multipart/form-data" token="{{ csrf_token() }}">
       {{ csrf_field() }}
       <div class="row">
    <div class="col col-md-6">
            <div class="form-group">
                <label for="specialidade" class="control-label">Título: </label> 
                <input type="text" class="form-control has-feedback-left" id="inputSuccess2" placeholder="Título" id="aula_titulo" name="aula_titulo" v-model="$store.state.item.aula_titulo">
            </div>
    </div>

    <div class="col col-md-6">
            <div class="form-group">
                <label for="specialidade" class="control-label">Vídeo: </label> 
                <input type="text" class="form-control has-feedback-left" id="inputSuccess2" placeholder="Vídeo" id="aula_link" v-model="$store.state.item.aula_link" name="aula_link">
            </div>
    </div>
    </div>
  
    <div class="row">
    <div class="col col-md-6">
            <div class="form-group">
                <label for="specialidade" class="control-label">Duração: </label> 
                <input type="text" class="form-control has-feedback-left" id="inputSuccess2" placeholder="Duração" v-model="$store.state.item.aula_duracao" id="aula_duracao" name="aula_duracao"  >
            </div>
    </div>


  <div class="col col-md-6">
    <div class="form-group">
    <label for="titulo" class="control-label">Módulo</label>
  <select  name="modulo_id" class="form-control">	
  <option value="{{$modulo->id}}">{{$modulo->modulo_titulo}}</option>							
  </select>
</div>  
</div>
</div>

<div class="row">
     <div class="col col-lg-12">
            <div class="form-group"> 
                <label for="email" class="control-label">Descricao</label>
                <ckeditor  name="aula_descricao"  id="aula_descir" v-model="$store.state.item.aula_descricao" v-bind:config="{
                    toolbar: [
                      [ 'Bold', 'Italic', 'Underline', 'Strike', 'Subscript', 'Superscript' ]
                    ],
                    height: 200
                  }"></ckeditor>
            </div>
        </div>
  </div>

  <div class="row">
    <div class="col col-md-12">
            <div class="form-group">
                <label for="specialidade" class="control-label">Conteúdo Complementar: </label> 
                <input type="file" class="form-control has-feedback-left" id="inputSuccess2" placeholder="Design" id="aula_conteudo1" name="aula_conteudo">
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
