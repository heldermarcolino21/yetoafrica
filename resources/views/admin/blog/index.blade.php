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

        <blog
         v-bind:titulos="['#','foto','Titulo','Categorias','Data']"
       
         v-bind:itens="{{json_encode($listaBlog)}}"
       


     editar="/blog/"
     deletar="/blog/"  
     criar="#criar" 
     sms="{{Session::get('sms')}}"
 
 modal="sim" token="{{ csrf_token() }}"
 ordem="desc" ordemcol="0"
>
         
        </blog> 
      <div align="center">
      {{$listaBlog}}
      </div>
      </painel>
</pagina>
<modal nome="adicionar">
<formulario css="" action="{{route('blog.store')}}" method="post" enctype="multipart/form-data" token="{{ csrf_token() }}">  
    {{ csrf_field() }}

    <div class="row">
    <div class="col col-md-12">
            <div class="form-group">
                <label for="specialidade" class="control-label">Fotografia: </label> 
                <input type="file" class="form-control has-feedback-left" id="inputSuccess2" placeholder="Design" id="blog_foto" name="blog_foto"  >
               
            </div>
    </div>
    </div>

    <div class="row">
    <div class="col col-md-6">
            <div class="form-group">
                <label for="name" class="control-label">Título: </label> 
                <input type="text" class="form-control has-feedback-left" id="inputSuccess2" placeholder="Mecânica" name="blog_titulo"  required>
            
            </div>
    </div>

    <div class="col col-md-6">
            <div class="form-group">
                <label for="name" class="control-label">Categorias: </label> 
                <select  name="categ_id" class="form-control">
                @foreach($listaCategorias as $lista)
                 <option value="{{$lista->id}}">{{$lista->cat_nome}}</option>
                @endforeach						
				</select>
            </div>
    </div>
</div>

    
    <div class="row">
     <div class="col col-md-12">
            <div class="form-group"> 
                <label for="email" class="control-label">Descricao</label>
                <ckeditor name="blog_descricao" id="blog_desc"  v-bind:config="{
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
    <formulario id="formEditar" v-bind:action="'/blog/' + $store.state.item.id" method="put" enctype="multipart/form-data" token="{{ csrf_token() }}">
       {{ csrf_field() }}
  
       <div class="row">
    <div class="col col-md-12">
            <div class="form-group">
                <label for="specialidade" class="control-label">Fotografia: </label> 
                <input type="file" class="form-control has-feedback-left" id="inputSuccess2" placeholder="Design" id="blog_fot" name="blog_foto"  >
               
            </div>
    </div>
    <div class="row">
    <div class="col col-md-6">
            <div class="form-group">
                <label for="name" class="control-label">Título: </label> 
                <input type="text" class="form-control has-feedback-left" id="inputSuccess2" placeholder="Mecânica" name="blog_titulo" v-model="$store.state.item.blog_titulo"  required>
            
            </div>
    </div>
    <div class="col col-md-6">
            <div class="form-group">
                <label for="name" class="control-label">Categorias: </label> 
                <select  name="categ_id" class="form-control">
                @foreach($listaCategorias as $lista)
                 <option value="{{$lista->id}}">{{$lista->cat_nome}}</option>
                @endforeach						
				</select>
            </div>
    </div>
</div>

    
    <div class="row">
     <div class="col col-lg-12">
            <div class="form-group"> 
                <label for="email" class="control-label">Descricao</label>
                <ckeditor  name="blog_descricao"  id="blog_desci" v-model=" $store.state.item.blog_descricao"  v-bind:config="{
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
