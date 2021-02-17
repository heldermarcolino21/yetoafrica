@extends('layouts.admin')
@section('content')
<div class="site">
		@include('layouts.menu')
		<div class="base-geral">
        <div class="caixa">
			<h2 class="titulo"><span class="case"><i class="ico duvida"></i>Nossos Formadores</span></h2>
        </div>

<pagina tamanho="12">
    <painel titulo="Formador">

     
<formador
         v-bind:titulos="['#','Nome','Email']"
       
    v-bind:itens="{{json_encode($listausers)}}"
    

     editar="/formador/"
     deletar="/formador/"  
     perfil="/formador/"   
     criar="#criar" 
 
 modal="sim" token="{{ csrf_token() }}"
 ordem="desc" ordemcol="0"
>
         
</formador> 
    <div align="center">
         {{$listausers}}
    </div>
</painel>
</pagina>
<modal nome="adicionar" titulo="Adicionar">
<formulario css="" action="{{route('formador.store')}}" method="post" enctype="multipart/form-data" token="{{ csrf_token() }}">  
    {{ csrf_field() }}
    <input type="hidden" id="custId" name="idAcademia" value="{{$idAcademia}}">
    <div class="row">
        <div class="col col-md-12">
            <div class="form-group">
                <label for="name" class="control-label">Nome: </label> 
                <input type="text" class="form-control has-feedback-left" id="inputSuccess2" placeholder="Joao" name="name"  required>
            
            </div>
        </div>
        </div>
 <div class="row"> 
        <div class="col col-md-12">
            <div class="form-group"> 
                <label for="email" class="control-label">email</label>
                <input type="email" class="form-control has-feedback-left" id="inputSuccess4" placeholder="joaomoraisandrecarlos@exemplo.com" name="email"  required>
               
            </div>
        </div>
        </div>

<div class="row"> 
<div class="col col-md-6">
<div class="form-group">
    <select  name="tipo" class="form-control">
    <option value="formador">Formador</option>						
    </select>

</div>
</div> 
</div>

   
<div class="col col-md-6">
            <div class="form-group"> 
            <label for="titulo" class="control-label">Nome Completo</label>
                <label for="email" class="control-label"></label>
                <input type="text" class="form-control has-feedback-left" id="inputSuccess4" placeholder="ex:Agostinho Xavier" name="nome"  required>
               
            </div>
        </div>
</div>

<div class="row">
        <div class="col col-md-6">
            <div class="form-group">
                <label for="name" class="control-label">País </label> 
                <input type="text" class="form-control has-feedback-left" id="inputSuccess2" placeholder="nome de utilizador" name="pais"  required>
            </div>
        </div>
     
        <div class="col col-md-6">
            <div class="form-group"> 
                <label for="email" class="control-label">Foto</label>
                <input type="file" class="form-control has-feedback-left" id="inputSuccess4" placeholder="joaomoraisandrecarlos@exemplo.com" name="foto"  required>
               
            </div>
        </div>
        </div>

        <div class="row">
        <div class="col col-md-6">
            <div class="form-group">
                <label for="name" class="control-label">Bilhete </label> 
                <input type="text" class="form-control has-feedback-left" id="inputSuccess2" placeholder="nome de utilizador" name="bilhete"  required>
            </div>
        </div>
     
        <div class="col col-md-6">
            <div class="form-group"> 
                <label for="email" class="control-label">Facebook</label>
                <input type="text" class="form-control has-feedback-left" id="inputSuccess4" placeholder="facebook" name="facebook"  required>
               
            </div>
        </div>
        </div>

        <div class="row">
        <div class="col col-md-6">
            <div class="form-group">
                <label for="name" class="control-label">Instagram</label> 
                <input type="text" class="form-control has-feedback-left" id="inputSuccess2" placeholder="instagram" name="instagram"  required>
            </div>
        </div>
     
        <div class="col col-md-6">
            <div class="form-group"> 
                <label for="email" class="control-label">Telefone</label>
                <input type="text" class="form-control has-feedback-left" id="inputSuccess4" placeholder="ex:931000802" name="telefone"  required>
               
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

<modal nome="editar" titulo="Editar Formador">
    <formulario id="formEditar" v-bind:action="'/formador/'+ $store.state.item.id" method="put" enctype="multipart/form-data" token="{{ csrf_token() }}">
       {{ csrf_field() }}
    
       <div class="row">
        <div class="col col-md-12">
            <div class="form-group">
                <label for="name" class="control-label">Nome: </label> 
                <input type="text" class="form-control has-feedback-left" id="inputSuccess2" placeholder="Joao" name="name" v-model="$store.state.item.name"  required>
            
            </div>
        </div>
        </div>
    <div class="row">
        <div class="col col-md-12">
            <div class="form-group"> 
                <label for="email" class="control-label">email</label>
                <input type="email" class="form-control has-feedback-left" id="inputSuccess4" placeholder="joaomoraisandrecarlos@exemplo.com" v-model="$store.state.item.email" name="email"  required>
               
            </div>
        </div>
    </div>

    <div class="row"> 
        <div class="col col-md-12">
<div class="form-group">
    <label for="titulo" class="control-label">Tipo</label>
    <select  name="tipo" class="form-control">
    <option value="formador">Formador</option>					
    </select>

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
