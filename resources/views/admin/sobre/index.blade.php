@extends('layouts.admin')

@section('content')
<div class="site">
		@include('layouts.menu')
		<div class="base-geral">
        <div class="caixa">
			<h2 class="titulo"><span class="case"><i class="ico duvida"></i>Sobre Nós</span></h2>
        </div>
<pagina tamanho="12">
    <painel>

 <sobre
         v-bind:titulos="['#','Img','Descricao','Título','Data']"
       
         v-bind:itens="{{json_encode($listaSobre)}}"
       

     editar="/sobre/"
     deletar="/sobre/"  
     criar="#criar" 
     sms="{{Session::get('sms')}}"
    v-bind:erros="{{json_encode($errors->all())}}"
    
     
 modal="sim" token="{{ csrf_token() }}"
 ordem="desc" ordemcol="0"

         
</sobre> 
      <div align="center">
      {{$listaSobre}}
      </div>
      </painel>
</pagina>
<modal nome="adicionar">
<formulario css="" action="{{route('sobre.store')}}" method="post" enctype="multipart/form-data" token="{{ csrf_token() }}">  
    {{ csrf_field() }}

<div class="row">
    <div class="col col-md-12">
            <div class="form-group">
                <label for="specialidade" class="control-label">Fotografia: </label> 
                <input type="file" class="form-control has-feedback-left" id="inputSuccess2" placeholder="Design" id="about-us_img" name="sobre_img"  >
               
            </div>
    </div>

</div>

<div class="row">
    <div class="col col-md-6">
            <div class="form-group">
                <label for="specialidade" class="control-label">Link: </label> 
                <input type="text" class="form-control has-feedback-left" id="inputSuccess2" placeholder="link do video" id="sobre_video" name="sobre_video"  >
               
            </div>
    </div>

    <div class="col col-md-6">
    
            <div class="form-group">
                <label for="specialidade" class="control-label">Título</label> 
                <input type="text" class="form-control has-feedback-left" id="inputSuccess2" placeholder="Título" id="sobre_titulo" name="sobre_titulo"  >
               
            </div>
    </div>

</div>

    
    <div class="row">
     <div class="col col-lg-12">
            <div class="form-group"> 
                <label for="email" class="control-label">Descricao</label>
            
                <ckeditor   name="sobre_descricao"  id="sobre_descricao" v-model=" $store.state.item.sobre_descricao"  v-bind:config="{
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
    <input type="submit" value="Enviar" class="btn btn-success" name="Cadastrar">
    </div>
    </div>
    
</formulario>
</modal>

<modal nome="editar">
<formulario id="formEditar" v-bind:action="'/sobre/' + $store.state.item.id" method="put" enctype="multipart/form-data" token="{{ csrf_token() }}">
       {{ csrf_field() }}
    
<div class="row">
    <div class="col col-md-12">
            <div class="form-group">
                <label for="specialidade" class="control-label">Fotografia: </label> 
                <input type="file" class="form-control has-feedback-left" id="inputSuccess2" placeholder="Design" id="sobre_img" name="sobre_img"  >
               
            </div>
    </div>

</div>


<div class="row">
    <div class="col col-md-6">
            <div class="form-group">
                <label for="specialidade" class="control-label">Link: </label> 
                <input type="text" class="form-control has-feedback-left" id="inputSuccess2" placeholder="link do video" id="sobre_video1" name="sobre_video" v-model="$store.state.item.sobre_video"  >
               
            </div>
    </div>

    <div class="col col-md-6">
            <div class="form-group">
                <label for="specialidade" class="control-label">Título</label> 
                <input type="text" class="form-control has-feedback-left" id="inputSuccess2" placeholder="Título" id="sobre_titulo" name="sobre_titulo" v-model="$store.state.item.sobre_titulo" >
               
            </div>
    </div>

</div>
    
    <div class="row">
     <div class="col col-lg-12">
            <div class="form-group"> 
                <label for="email" class="control-label">Descricao</label>
            
                <ckeditor   name="sobre_descricao"  id="sobre_descri" v-model=" $store.state.item.sobre_descricao"  v-bind:config="{
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
