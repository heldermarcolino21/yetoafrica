@extends('layouts.admin')
@section('content')
<div class="site">
		@include('layouts.menu')
		<div class="base-geral">
        <div class="caixa">
			<h2 class="titulo"><span class="case"><i class="ico duvida"></i>Nossos Cursos</span></h2>
        </div>
<pagina tamanho="12">
    <painel>

     
<lista_utilizador
         v-bind:titulos="['#','Foto','Nome','Email']"
       
    v-bind:itens="{{json_encode($listausers)}}"
    

     deletar="/utilizadores/"  
     sms="{{Session::get('sms')}}"
 
 modal="sim" token="{{ csrf_token() }}"
 ordem="desc" ordemcol="0"
>
         
</lista_utilizador> 
    <div align="center">
         {{$listausers}}
    </div>
</painel>
</pagina>
<modal nome="adicionar">
<formulario css="" action="{{route('utilizadores.store')}}" method="post" enctype="multipart/form-data" token="{{ csrf_token() }}">  
    {{ csrf_field() }}

    <div class="row">
    <div class="col col-md-12">
            <div class="form-group"> 
                <label for="email" class="control-label">Foto</label>
                <input type="file" class="form-control has-feedback-left" id="inputSuccess4" placeholder="joaomoraisandrecarlos@exemplo.com" name="img"  required>
               
            </div>
        </div>
       
       
        </div>

    <div class="row"> 
    <div class="col col-md-6">
            <div class="form-group">
                <label for="name" class="control-label">Nome de utilizador: </label> 
                <input type="text" class="form-control has-feedback-left" id="inputSuccess2" placeholder="ex: agosxaves" name="name"  required>
            </div>
        </div>

        <div class="col col-md-6">
            <div class="form-group"> 
                <label for="email" class="control-label">email</label>
                <input type="email" class="form-control has-feedback-left" id="inputSuccess4" placeholder="joaomoraisandrecarlos@exemplo.com" name="email"  required>
               
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
    <label for="titulo" class="control-label">Tipo</label>
    <select  name="tipo" class="form-control">
    <option value="admin">Admin</option>	
    <option value="academia">Academia</option>	
    <option value="formador">Formador</option>	
    <option value="aluno">Aluno</option>						
    </select>
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
    <input type="submit" value="Enviar" class="btn btn-success" name="Cadastrar">
</div>
    </div>
    
</formulario>
</modal>

<modal nome="editar" titulo="Editar Usuários">
    <formulario id="formEditar" v-bind:action="'/utilizadores/'+ $store.state.item.id" method="put" enctype="multipart/form-data" token="{{ csrf_token() }}">
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
    <option value="admin">Admin</option>	
    <option value="academia">Academia</option>	
    <option value="formador">Formador</option>	
    <option value="aluno">Aluno</option>						
    </select>

</div>
</div>
    
</div>
      
    </formulario>
    <span slot="botoes">
      <button form="formEditar" class="btn btn-info">Atualizar</button>
    </span>
  </modal>

  <modal nome="perfil" v-bind:titulo="$store.state.item.titulo">
    <p>@{{$store.state.item.name}}</p>
    <p>@{{$store.state.item.email}}</p>
  </modal>

</div>
</div>
@endsection
