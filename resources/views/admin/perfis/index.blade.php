@extends('layouts.admin')
@section('content')
<pagina tamanho="12">
    <painel titulo="Perfis">

     
<lista_utilizador
         v-bind:titulos="['#','Imagem','Nome','Função','Bilhete','Email']"
       
    v-bind:itens="{{json_encode($listausers)}}"
       

     editar="/perfis/"
     deletar="/perfis/"  
     detalhe="/perfis/"   
     criar="#criar" 
 
 modal="sim" token="{{ csrf_token() }}"
 ordem="desc" ordemcol="0"
>
         
</lista_utilizador> 
    <div align="center">
         {{$listausers}}
    </div>
</painel>
</pagina>
<modal nome="adicionar" titulo="Adicionar">
<formulario css="" action="{{route('utilizador.store')}}" method="post" enctype="multipart/form-data" token="{{ csrf_token() }}">  
    {{ csrf_field() }}

    <div class="row">
        <div class="col col-md-6">
            <div class="form-group">
                <label for="name" class="control-label">Nome: </label> 
                <input type="text" class="form-control has-feedback-left" id="inputSuccess2" placeholder="Joao" name="nome"  required>
            
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
                <label for="name" class="control-label">foto:</label> 
                <input type="file" class="form-control has-feedback-left" id="inputSuccess2" placeholder="Joao" name="foto"  required>
            </div>
        </div>

        <div class="col col-md-6">
            <div class="form-group"> 
                <label for="email" class="control-label">bilhete</label>
                <input type="text" class="form-control has-feedback-left" id="inputSuccess4" placeholder="bilhete" name="bilhete"  required>
            </div>
        </div>
</div>

<div class="row">
        <div class="col col-md-6">
            <div class="form-group">
                <label for="name" class="control-label">Facebook: </label> 
                <input type="text" class="form-control has-feedback-left" id="inputSuccess2" placeholder="Joao" name="facebook"  required>
            
            </div>
        </div>

        <div class="col col-md-6">
            <div class="form-group"> 
                <label for="email" class="control-label">Instagram</label>
                <input type="text" class="form-control has-feedback-left" id="inputSuccess4" placeholder="Insta" name="instagram"  required>
               
            </div>
 </div>
 </div>

 <div class="row">
 <div class="col col-md-6">
            <div class="form-group">
                <label for="titulo" class="control-label">Formador</label>
            <select  name="tipo" class="form-control">
                 <option value="formador">Formador</option>	
                 <option value="aluno">Aluno</option>						
			</select>
        </div>        
</div>

        <div class="col col-md-6">
            <div class="form-group"> 
                <label for="email" class="control-label">País</label>
                <input type="text" class="form-control has-feedback-left" id="inputSuccess4" placeholder="" name="pais"  required>
               
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
    <formulario id="formEditar" v-bind:action="'/utilizador/'+ $store.state.item.id" method="put" enctype="multipart/form-data" token="{{ csrf_token() }}">
       {{ csrf_field() }}
    
       <div class="row">
        <div class="col col-md-6">
            <div class="form-group">
                <label for="name" class="control-label">Nome: </label> 
                <input type="text" class="form-control has-feedback-left" id="inputSuccess2" placeholder="Joao" name="nome" v-model="$store.state.item.nome"  required>
            
            </div>
        </div>

        <div class="col col-md-6">
            <div class="form-group"> 
                <label for="email" class="control-label">email</label>
                <input type="email" class="form-control has-feedback-left" id="inputSuccess4" placeholder="joaomoraisandrecarlos@exemplo.com" v-model="$store.state.item.email" name="email"  required>
               
            </div>
        </div>
        </div>
        <div class="row">
        <div class="col col-md-6">
            <div class="form-group">
                <label for="name" class="control-label">foto:</label> 
                <input type="file" class="form-control has-feedback-left" id="inputSuccess2" placeholder="Joao" name="foto"  required>
            </div>
        </div>

        <div class="col col-md-6">
            <div class="form-group"> 
                <label for="email" class="control-label">bilhete</label>
                <input type="text" class="form-control has-feedback-left" id="inputSuccess4" placeholder="bilhete" name="bilhete" v-model="$store.state.item.bilhete"  required>
            </div>
        </div>
</div>

<div class="row">
        <div class="col col-md-6">
            <div class="form-group">
                <label for="name" class="control-label">Facebook: </label> 
                <input type="text" class="form-control has-feedback-left" id="inputSuccess2" placeholder="Joao" name="facebook"  required>
            
            </div>
        </div>

        <div class="col col-md-6">
            <div class="form-group"> 
                <label for="email" class="control-label">Instagram</label>
                <input type="text" class="form-control has-feedback-left" id="inputSuccess4" placeholder="Insta" name="instagram"  required>
               
            </div>
 </div>
 </div>

 <div class="row">
 <div class="col col-md-6">
            <div class="form-group">
                <label for="titulo" class="control-label">Formador</label>
            <select  name="tipo" class="form-control">
                 <option value="formador">Formador</option>	
                 <option value="aluno">Aluno</option>						
			</select>
        </div>        
</div>

        <div class="col col-md-6">
            <div class="form-group"> 
                <label for="email" class="control-label">País</label>
                <input type="text" class="form-control has-feedback-left" id="inputSuccess4" placeholder="" name="pais"  required>
               
            </div>
        </div>
</div>
    </formulario>
    <span slot="botoes">
      <button form="formEditar" class="btn btn-info">Atualizar</button>
    </span>
  </modal>

@endsection