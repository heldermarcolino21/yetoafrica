@extends('layouts.admin')

@section('content')
<div class="site">
		@include('layouts.menu')
		<div class="base-geral">
        <div class="caixa">
			<h2 class="titulo"><span class="case"><i class="ico duvida"></i>Meus Cursos</span></h2>
        </div>
      
<pagina tamanho="12">
        <cursos
         v-bind:titulos="['#','foto','Curso','Preço','Duração','Categoria']"
       
    v-bind:itens="{{json_encode($listMeuscursos)}}"
       


     editar="/cursos/"
     deletar="/cursos/"  
     modulo="/formanegocio/"
     alunos="/alunos/" 
     criar="#criar" 
     sms="{{Session::get('sms')}}"
   

 modal="sim" token="{{ csrf_token() }}"
 ordem="desc" ordemcol="0"
>
         
        </cursos> 
      <div align="center">
      {{$listMeuscursos}}
      </div>
    
</pagina>
<modal nome="adicionar">
<formulario css="" action="{{route('cursos.store')}}" method="post" enctype="multipart/form-data" token="{{ csrf_token() }}">  
    {{ csrf_field() }}
  
    <div class="row">
    <div class="col col-md-12">
            <div class="form-group">
                <label for="specialidade" class="control-label">Fotografia: </label> 
                <input type="file" class="form-control has-feedback-left" id="inputSuccess2" placeholder="Design" id="curso_img" name="curso_img"  >
               
            </div>
    </div>

   
    </div> 
    <div class="row">
  
   
        <div class="col col-md-6">
            <div class="form-group">
                <label for="name" class="control-label">Curso: </label> 
                <input type="text" class="form-control has-feedback-left" id="inputSuccess2" placeholder="Mecânica" name="curso_nome"  required>
            
            </div>
        </div>

        <div class="col col-md-6">
            <div class="form-group">
                <label for="titulo" class="control-label">Categoria</label>
                <select  name="categoria_id" class="form-control">
               
                @foreach($listaCategoria as $lista)
                 <option value="{{$lista->id}}">{{$lista->cat_nome}}</option>
                @endforeach						
				</select>
        
        </div>  
        </div>

    </div>
    <div class="row">
        <div class="col col-md-6">
            <div class="form-group">
                <label for="name" class="control-label">Preço: </label> 
                <input type="float" class="form-control has-feedback-left" id="inputSuccess2" placeholder="Preço" name="curso_preco"  required>
            
            </div>
        </div>

        <div class="col col-md-6">
            <div class="form-group">
                <label for="specialidade" class="control-label">Duração: </label> 
                <input type="text" class="form-control has-feedback-left" id="inputSuccess2" placeholder="2 meses" id="curso_duracao" name="curso_duracao"  >
               
            </div>
    </div> 
        </div>
   
    
    <div class="row">
     <div class="col col-lg-12">
            <div class="form-group"> 
                <label for="email" class="control-label">descricao</label>
                <ckeditor  name="curso_descricao"  id="curso_desci"  v-bind:config="{
                    toolbar: [
                      [ 'Bold', 'Italic', 'Underline', 'Strike', 'Subscript', 'Superscript' ]
                    ],
                    height: 200
                  }"></ckeditor>
    
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
    <formulario id="formEditar" v-bind:action="'/cursos/' + $store.state.item.id" method="put" enctype="multipart/form-data" token="{{ csrf_token() }}">
       {{ csrf_field() }}
           
    <div class="row">
    <div class="col col-md-12">
            <div class="form-group">
                <label for="specialidade" class="control-label">Fotografia: </label> 
                <input type="file" class="form-control has-feedback-left" id="inputSuccess2" placeholder="Design" id="curso_img" name="curso_img"  >
               
            </div>
 </div>
 
    </div>
    <div class="row">

    <div class="col col-md-6">
            <div class="form-group">
                <label for="name" class="control-label">Curso: </label> 
                <input type="text" class="form-control has-feedback-left" id="inputSuccess2" placeholder="Mecânica" name="curso_nome" v-model="$store.state.item.curso_nome" required>
            
            </div>
        </div> 

        <div class="col col-md-6">
            <div class="form-group">
                <label for="titulo" class="control-label">Categoria</label>
                <select  name="categoria_id" class="form-control">
               
                @foreach($listaCategoria as $lista)
                 <option value="{{$lista->id}}">{{$lista->cat_nome}}</option>
            
                @endforeach						
				</select>
        
        </div>  
        </div>
        
    </div>
    <div class="row">
        <div class="col col-md-6">
            <div class="form-group">
                <label for="name" class="control-label">Preço: </label> 
                <input type="float" class="form-control has-feedback-left" id="inputSuccess2" placeholder="Preço" name="curso_preco" v-model="$store.state.item.curso_preco"  required>
            
            </div>
        </div>

      
        <div class="col col-md-6">
            <div class="form-group">
                <label for="name" class="control-label">Duração: </label> 
                <input type="text" class="form-control has-feedback-left" id="inputSuccess2" placeholder="Mecânica" name="curso_duracao" v-model="$store.state.item.curso_duracao" required>
            
            </div>
        </div>
   
   
    </div>
    
    <div class="row">
     <div class="col col-lg-12">
            <div class="form-group"> 
                <label for="email" class="control-label">descricao</label>
                <ckeditor  name="curso_descricao"  id="curso_descr" v-model="$store.state.item.curso_descricao" v-bind:config="{
                    toolbar: [
                      [ 'Bold', 'Italic', 'Underline', 'Strike', 'Subscript', 'Superscript' ]
                    ],
                    height: 200
                  }"></ckeditor>
    
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
