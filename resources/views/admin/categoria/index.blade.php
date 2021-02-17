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

        <categoria
         v-bind:titulos="['#','Nome','Descricao','Data']"
       
         v-bind:itens="{{json_encode($listaCat)}}"
       

 
     editar="/categoria/"
     deletar="/categoria/"  
     criar="#criar" 
     sms="{{Session::get('sms')}}"
 modal="sim" token="{{ csrf_token() }}"
 ordem="desc" ordemcol="0"
>
         
</categoria> 
      <div align="center">
      {{$listaCat}}
      </div>
      </painel>
</pagina>
<modal nome="adicionar">
<formulario css="" action="{{route('categoria.store')}}" method="post" enctype="multipart/form-data" token="{{ csrf_token() }}">  
    {{ csrf_field() }}

<div class="row">
    <div class="col col-md-12">
            <div class="form-group">
                <label for="specialidade" class="control-label">Nome da Categoria: </label> 
                <input type="text" class="form-control has-feedback-left" id="inputSuccess2" placeholder="Design" id="cat_nome" name="cat_nome"  >
               
            </div>
    </div>
</div>

    
    <div class="row">
     <div class="col col-lg-12">
            <div class="form-group"> 
                <label for="email" class="control-label">Descricao</label>
                <ckeditor   name="cat_descricao"  id="cat_desc" v-model=" $store.state.item.blog_descricao"  v-bind:config="{
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

<modal nome="editar" titulo="Categorias">
    <formulario id="formEditar" v-bind:action="'/categoria/' + $store.state.item.id" method="put" enctype="multipart/form-data" token="{{ csrf_token() }}">
       {{ csrf_field() }}
  
<div class="row">
    <div class="col col-md-12">
            <div class="form-group">
                <label for="specialidade" class="control-label">Nome da Categoria: </label> 
                <input type="text" class="form-control has-feedback-left" id="inputSuccess2" placeholder="Design" id="cat_nome" name="cat_nome" v-model="$store.state.item.cat_nome" >
               
            </div>
    </div>
</div>

    
    <div class="row">
     <div class="col col-lg-12">
            <div class="form-group"> 
                <label for="email" class="control-label">Descricao</label>
                <ckeditor  name="cat_descricao"  id="cat_desc1" v-model="$store.state.item.cat_descricao"  v-bind:config="{
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
