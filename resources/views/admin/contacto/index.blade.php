@extends('layouts.admin')

@section('content')
<div class="site">
		@include('layouts.menu')
		<div class="base-geral">
        <div class="caixa">
			<h2 class="titulo"><span class="case"></i>Contactos</span></h2>
        </div>

<pagina tamanho="12">
    <painel titulo="Contactos">

 <contacto
         v-bind:titulos="['#','Nome','Email','Assunto','Descrição']"
       
         v-bind:itens="{{json_encode($listaContactos)}}"
       

        deletar="/contactos/"  
     criar="#criar" 
     sms="{{Session::get('sms')}}"
    v-bind:erros="{{json_encode($errors->all())}}"
    
     
 modal="sim" token="{{ csrf_token() }}"
 ordem="desc" ordemcol="0"
>
         
</contacto> 
      <div align="center">
      {{$listaContactos}}
      </div>
      </painel>
</pagina>
<modal nome="adicionar" titulo="Contactos">
<formulario css="" action="{{route('contactos.store')}}" method="post" enctype="multipart/form-data" token="{{ csrf_token() }}">  
    {{ csrf_field() }}
    <div class="row">

<div class="col col-md-6">
        <div class="form-group">
            <label for="name" class="control-label">Nome: </label> 
            <input type="text" class="form-control has-feedback-left" id="inputSuccess2" placeholder="Nome" name="contacto_nome" v-model="$store.state.item.curso_nome" required>
        
        </div>
    </div> 
    <div class="col col-md-6">
        <div class="form-group">
            <label for="name" class="control-label">Email: </label> 
            <input type="text" class="form-control has-feedback-left" id="inputSuccess2" placeholder="Mecânica" name="contacto_email" v-model="$store.state.item.contacto_email" required>
        
        </div>
    </div>

</div>

<div class="col col-md-12">
        <div class="form-group">
            <label for="name" class="control-label">Assunto: </label> 
            <input type="text" class="form-control has-feedback-left" id="inputSuccess2" placeholder="Mecânica" name="contacto_assunto" v-model="$store.state.item.contacto_assunto" required>
        
        </div>
    </div> 

    <div class="row">
     <div class="col col-lg-12">
            <div class="form-group"> 
                <label for="email" class="control-label">Descrição</label>
            
                <ckeditor   name="contacto_descricao"  id="contacto_desc"  v-bind:config="{
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

<modal nome="editar" titulo="Contactos">
<formulario id="formEditar" v-bind:action="'/contactos/' + $store.state.item.id" method="put" enctype="multipart/form-data" token="{{ csrf_token() }}">
       {{ csrf_field() }}
<div class="row">

<div class="col col-md-6">
        <div class="form-group">
            <label for="name" class="control-label">Nome: </label> 
            <input type="text" class="form-control has-feedback-left" id="inputSuccess2" placeholder="Mecânica" name="curso_nome" v-model="$store.state.item.curso_nome" required>
        
        </div>
    </div> 
    <div class="col col-md-6">
        <div class="form-group">
            <label for="name" class="control-label">Email: </label> 
            <input type="text" class="form-control has-feedback-left" id="inputSuccess2" placeholder="Mecânica" name="contacto_email" v-model="$store.state.item.curso_duracao" required>
        
        </div>
    </div>

</div>

    <div class="row">
     <div class="col col-lg-12">
            <div class="form-group"> 
                <label for="email" class="control-label">Descrição</label>
            
                <ckeditor   name="contacto_assunto"  id="contacto_edit" v-model="$store.state.item.contacto"  v-bind:config="{
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
