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
     modulo="/cursoestudante/"
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

<form css="" action="{{route('cursos.store')}}" method="post" enctype="multipart/form-data" token="{{ csrf_token() }}">  
    {{ csrf_field() }}
    <input type="hidden" id="custId" name="id_formador" value="{{$listaFormador[0]->id}}">    
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
                <input type="text" class="form-control has-feedback-left" id="inputSuccess2" placeholder="Informática" name="curso_nome"  required>
            
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
    
</form>
<!--//////////////////////////////////Inicio//////////////////////////////////////////-->

<figcaption>Carregamento dos videos</figcaption>
<form css="" action="{{route('aula.store')}}" method="post" enctype="multipart/form-data" token="{{ csrf_token() }}">  
    {{ csrf_field() }}
    <input type="hidden" id="custId" name="id_formador" value="{{$listaFormador[0]->id}}">
    <input type="hidden" id="custId" name="id_formador" value="{{$listMeuscursos[0]->id}}"> 
    
    <div class="row">           
        <div class="col col-md-6">
            <div class="form-group">
                <label for="curso_id" class="control-label">Cursos</label>
                <select  name="curso_id" id="curso_id" class="form-control">               
                @foreach ($listMeuscursos as $curso)
                <option value="{{$curso->id}}">{{$curso->curso_nome}}</option>
                @endforeach						
				</select>
        
            </div>  
        </div>

        <div class="col col-md-6">
            <div class="form-group">
                <label for="modulo_id" class="control-label">Módulos</label>
                <select  name="modulo_id" id="modulo_id" class="form-control">                                         
                    @foreach ($listaModulos as $modulo)
                    <option value="{{$modulo->id}}">{{$modulo->modulo_titulo}}</option>
                   @endforeach	
				</select>
            </div>
        </div>
        
    </div>    
       
     <div class="row">          
        <div class="col col-md-6">
            <div class="form-group">
                <label for="aula_titulo" class="control-label">Título</label> 
                <input type="text" class="form-control has-feedback-left" id="inputSuccess2" placeholder="Título do Vídeo" id="aula_titulo" name="aula_titulo"  >
               
            </div>
        </div>
        <div class="col col-md-6">
            <div class="form-group">
                <label for="aula_titulo" class="control-label">Descrição</label>
                <textarea class="form-control has-feedback-left" id="inputSuccess2" placeholder="Descrição" id="desc_aula" name="aula_descricao"></textarea>               
               
            </div> 
        </div>
    </div>
    <div class="row">        
        <div class="col col-md-6">






            <div class="form-group">
                <label for="specialidade" class="control-label">Adicionar video </label> 
                <input type="text" class="form-control has-feedback-left" id="inputSuccess2" placeholder="Link do Vídeo" id="curso_link" name="aula_link">
               
            </div>
        </div>
        <div class="col col-md-2">
            <div class="form-group">
                <label for="name" class="control-label">Duração:</label> 
                <input type="float" class="form-control has-feedback-left" id="inputSuccess2" placeholder="Duração da Aula" name="aula_duracao"  required>
           </div>   
        </div>   

        <div class="col col-md-6">
            <div class="form-group">
                <label for="aula_conteudo" class="control-label">Arquivo complementar:</label> 
                <input type="file" class="form-control has-feedback-left" id="inputSuccess2" placeholder="" id="aula_conteudo" name="aula_conteudo"  >
               
            </div>
        </div>     
   
     </div>
    
    <div class="row">
  
    <div class="col-lg-12">
    <input type="submit" value="Enviar" class="btn btn-success" name="Cadatrar">
    </div>
    </div>
    
</form>



<!--/////////////////////////////////Fim///////////////////////////////////////////-->
  <modal nome="status" titulo="Editar Status">
  <formulario id="formEdit" v-bind:action="'/admin/users/' + $store.state.item.id" method="put" enctype="multipart/form-data" token="{{ csrf_token() }}">
  {{ csrf_field() }}  
  <div class="row">
  <div class="col col-lg-12">
        <div class="form-group">
                      <label for="nome_classe" class="control-label">Status</label> 
                        <select name="user_status" class="form-control">
                            <option value="1">Activar</option>
                            <option value="0">Desativar</option>
                        </select>
                    </div>
       </div>
    </div>
       </formulario>
       <span slot="botoes">
      <button form="formEdit" class="btn btn-info">Atualizar</button>
    </span>
  </modal>

                </div>
</div>
@endsection
