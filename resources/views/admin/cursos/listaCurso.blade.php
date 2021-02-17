@extends('layouts.admin')

@section('content')

<div class="row el-element-overlay m-b-40">
                    <!-- /.usercard -->
                    <div class="col-md-12">
                    <form method="post" action="/curso/buscar" role="search" class="app-search hidden-sm hidden-xs m-r-20">
                        {{csrf_field()}}
                        <label for="titulo" class="control-label">Curso</label>
                            <input type="text" name="curso_nome" placeholder="nome do curso" class="form-control">
                            <label for="titulo" class="control-label">Data</label>
                            <input type="date" name="curso_data" placeholder="" class="form-control">
                            <label for="titulo" class="control-label">Preco</label>
                            <input type="number" name="curso_preco" placeholder="Preço" class="form-control"> 
                          
           
                <label for="titulo" class="control-label">Categoria</label>
                <select  name="categoria_id" class="form-control">
               
                @foreach($listaCategoria as $lista)
                <option value="">Seleciona a categoria</option>
                 <option value="{{$lista->id}}">{{$lista->cat_nome}}</option>
            
                @endforeach						
				</select>
        
     
      
                          <button type="submit">  <i class="fa fa-search"></i></button>
                    </form>
                    </div>
    
@foreach($listaCursos as $lista)

<div class="col-lg-3 col-md-4 col-sm-6 col-xs-12">
                        <div class="white-box">
                            <div class="el-card-item">
                                <div class="el-card-avatar el-overlay-1"> <img src="http://localhost:/nossafrica/storage/app/public/{{ $lista->curso_img }}" width="300px" height="315px" />
                               
                                </div>
                                <div class="el-card-content">
                                    <h3 class="box-title">{{ $lista->curso_nome }}</h3> <p>Preço: {{ number_format($lista->curso_preco, 2, ',', '.') }} kz</p>
                                   
                                	<a href="/cursonegocio/{{ $lista->id }}">   <button class="btn btn-success btn-rounded waves-effect waves-light m-t-20">Veja mais informações</button></a>
                         </div>
                            </div>
                        </div>
</div>
                                     
@endforeach
				</div>
@endsection