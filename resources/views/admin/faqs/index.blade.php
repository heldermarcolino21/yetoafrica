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

 <perguntas
         v-bind:titulos="['#','Pergunta','Resposta']"
       
         v-bind:itens="{{json_encode($listaPerguntas)}}"
       

     editar="/faqs/"
     deletar="/faqs/"  
     criar="#criar" 
     sms="{{Session::get('sms')}}"
    v-bind:erros="{{json_encode($errors->all())}}"
    
     
 modal="sim" token="{{ csrf_token() }}"
 ordem="desc" ordemcol="0"
>
         
</perguntas> 
      <div align="center">
      {{$listaPerguntas}}
      </div>
      </painel>
</pagina>
<modal nome="adicionar">
<formulario css="" action="{{route('faqs.store')}}" method="post" enctype="multipart/form-data" token="{{ csrf_token() }}">  
    {{ csrf_field() }}
    
    <div class="row">
     <div class="col col-lg-12">
            <div class="form-group"> 
                <label for="email" class="control-label">Pergunta</label>
            
                <ckeditor   name="pergunta"  id="pergunta"  v-bind:config="{
                    toolbar: [
                      [ 'Bold', 'Italic', 'Underline', 'Strike', 'Subscript', 'Superscript' ]
                    ],
                    height: 200
                  }" ></ckeditor>
            </div>
        </div>
    </div>

    <div class="row">
     <div class="col col-lg-12">
            <div class="form-group"> 
                <label for="email" class="control-label">Resposta</label>
            
                <ckeditor   name="resposta"  id="resposta"  v-bind:config="{
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
<formulario id="formEditar" v-bind:action="'/faqs/' + $store.state.item.id" method="put" enctype="multipart/form-data" token="{{ csrf_token() }}">
       {{ csrf_field() }}
    
    <div class="row">
     <div class="col col-lg-12">
            <div class="form-group"> 
                <label for="email" class="control-label">Pergunta</label>
            
                <ckeditor   name="pergunta"  id="pergunta_edit" v-model="$store.state.item.pergunta"  v-bind:config="{
                    toolbar: [
                      [ 'Bold', 'Italic', 'Underline', 'Strike', 'Subscript', 'Superscript' ]
                    ],
                    height: 200
                  }" ></ckeditor>
            </div>
        </div>
    </div>

    <div class="row">
     <div class="col col-lg-12">
            <div class="form-group"> 
                <label for="email" class="control-label">Resposta</label>
            
                <ckeditor   name="resposta"  id="res"  v-bind:config="{
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
