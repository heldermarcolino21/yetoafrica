@extends('layouts.admin')
@section('content')
<div class="site">
		@include('layouts.menu')
		<div class="base-geral">
        <div class="caixa">
			<h2 class="titulo"><span class="case"><i class="ico duvida"></i>Formadores da Academia {{auth()->user()->name}}</span></h2>
        </div>

<pagina tamanho="12">
    <painel>

     
<formador
         v-bind:titulos="['#','foto','Nome','Email']"
       
    v-bind:itens="{{json_encode($listausers)}}"
    

     editar="/academia/"
     deletar="/academia/"    
     criar="#criar" 
     sms="{{Session::get('sms')}}"
 
 modal="sim" token="{{ csrf_token() }}"
 ordem="desc" ordemcol="0"
>
         
</formador> 
    <div align="center">
         {{$listausers}}
    </div>
</painel>
</pagina>
<modal nome="adicionar">
<formulario css="" action="{{route('academia.store')}}" method="post" enctype="multipart/form-data" token="{{ csrf_token() }}">  
    {{ csrf_field() }}
    <div class="row">
        <div class="col col-md-12">
            <div class="form-group">
                <label for="name" class="control-label">Foto: </label> 
                <input type="file" class="form-control has-feedback-left" id="inputSuccess2" placeholder="" name="foto"  required>
            
            </div>
        </div>
     
</div>
    <div class="row">
        <div class="col col-md-6">
            <div class="form-group">
                <label for="name" class="control-label">Nome: </label> 
                <input type="text" class="form-control has-feedback-left" id="inputSuccess2" placeholder="" name="name"  required>
            
            </div>
        </div>
    
        <div class="col col-md-6">
            <div class="form-group"> 
                <label for="email" class="control-label">email</label>
                <input type="email" class="form-control has-feedback-left" id="inputSuccess4" placeholder="" name="email"  required>
               
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
    <formulario id="formEditar" v-bind:action="'/academia/'+ $store.state.item.id" method="put" enctype="multipart/form-data" token="{{ csrf_token() }}">
       {{ csrf_field() }}
    
       <div class="row">
        <div class="col col-md-12">
            <div class="form-group">
                <label for="name" class="control-label">Foto: </label> 
                <input type="file" class="form-control has-feedback-left" id="inputSuccess2" placeholder="Joao" name="foto"  required>
            
            </div>
        </div>
     
</div>
    <div class="row">
        <div class="col col-md-6">
            <div class="form-group">
                <label for="name" class="control-label">Nome: </label> 
                <input type="text" class="form-control has-feedback-left" id="inputSuccess2" placeholder="Joao" name="name"  v-model="$store.state.item.name">
            
            </div>
        </div>
    
        <div class="col col-md-6">
            <div class="form-group"> 
                <label for="email" class="control-label">email</label>
                <input type="email" class="form-control has-feedback-left" id="inputSuccess4" placeholder="" name="email" v-model="$store.state.item.email">
               
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
