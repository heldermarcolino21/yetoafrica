@extends('layouts.app')
@section('social')
@include('layouts.social')
@endsection
@section('corpo')
@include('layouts.menuf')
 <!-- Page breadcrumb -->
 <section id="mu-page-breadcrumb">
   <div class="container">
     <div class="row">
       <div class="col-md-12">
         <div class="mu-page-breadcrumb-area">
           <h2>Cursos</h2>
           <ol class="breadcrumb">
            <li><a href="/">Home</a></li>            
            <li class="active">Cursos</li>
          </ol>
         </div>
       </div>
     </div>

      <!-- End breadcrumb -->
 
<div class="row">    
<div class="col-xs-8 col-xs-offset-2">
<form action="/cursosss/busca" class="input-group">  
 {{ csrf_field() }}
          <div class="input-group-btn search-panel">
              <button type="button" class="btn btn-info dropdown-toggle" data-toggle="dropdown">
                <span id="search_concept">Categorias</span> <span class="caret"></span>
              </button>
              <ul class="dropdown-menu" role="menu">
              @foreach($listaCategorias as $lista)
                <li><a href="/cursocat/{{base64_encode($lista->id)}}">{{$lista->cat_nome}}</a></li>
              @endforeach
                <li class="divider"></li>
                <li><a href="/cursonegocio">Todas Categorias</a></li>
              </ul>
          </div>
          
          <input type="text" class="form-control" name="search" placeholder="ex: Mecanica" value="{{$filters['search'] ?? ''}}">
          <span class="input-group-btn">
              <button class="btn btn-info" type="submit"><span class="glyphicon glyphicon-search"></span></button>
          </span>
        </form>    
         
</div>

</div>

   </div>
 </section>

 <section id="mu-course-content">
   <div class="container">
     <div class="row">
    
     @foreach($listaCursosCat as $lista)
                  @if(isset($listaPedido))
        @php 
        $cont="";
        @endphp
        @foreach($listaPedido as $pedido)
        @if($pedido->curso_id==$lista->id)
        @php 
        $cont="{$pedido->status}";
        @endphp
        @endif
        @endforeach
        @endif
        <div class="col-md-4 col-sm-6">
                  <div class="col-item">
                                <div class="photo inner">
                                <a href="/detalhes/{{base64_encode($lista->id)}}">   <img src="http://localhost:/nossafrica/storage/app/public/{{$lista->curso_img}}" style="	max-width: 100%;	width: 360px; height: 260px; object-fit: cover;" alt="a" /></a>
                                </div>
                                <div class="info">
                                    <div class="row">
                                        <div class="price col-md-6">
                                            <h5>
                                            {{$lista->curso_nome}}</h5>
                                            <h5 class="price-text-color">
                                            {{ number_format($lista->curso_preco, 2, ',', '.') }} AKZ</h5>
                                        </div>
                                        <div class="rating hidden-sm col-md-6">
                                            <i class="price-text-color fa fa-star"></i><i class="price-text-color fa fa-star">
                                            </i><i class="price-text-color fa fa-star"></i><i class="price-text-color fa fa-star">
                                            </i><i class="fa fa-star"></i>
                                        </div>
                                    </div>
                                    <div class="separator clear-left">
    @if(isset($cont))
     @if($cont=="")
               <form method="POST" action="{{ route('carrinho.adicionar') }}">
                {{ csrf_field() }}
                <input type="hidden" name="id" value="{{ $lista->id }}">
                <p class="btn-add">
                <button class="btn col-12 btn-primary px-4 py-3 mt-3" data-position="bottom" data-delay="50" data-tooltip="O curso será adicionado ao seu carrinho"><i class="fa fa-shopping-cart"> </i> Adicionar</button>   
                </p>
            </form>
            @else 
            @if($cont=="PA")
            <p class="btn-details">
              <a href="/cursoestudante/{{base64_encode($lista->id)}}" class="btn col-12 btn-primary px-4 py-3 mt-3"> <i class="fa fa-eye"></i>Aceder</a></p>

              @else 
              <p class="btn-details">
              <a href="/carrinhos" class="btn col-12 btn-primary px-4 py-3 mt-3"> <i class="fa fa-shopping-cart"> </i>Carrinho</a></p>
              @endif                                           
          @endif

          @else
          <form method="POST" action="{{ route('carrinho.adicionar') }}">
                {{ csrf_field() }}
                <input type="hidden" name="id" value="{{ $lista->id }}">
                <p class="btn-add">
                <button class="btn col-12 btn-primary px-4 py-3 mt-3" data-position="bottom" data-delay="50" data-tooltip="O curso será adicionado ao seu carrinho"><i class="fa fa-shopping-cart"> </i> Adicionar</button>   
                </p>
            </form>

          @endif
            <p class="btn-details">
                                           <a href="/detalhes/{{base64_encode($lista->id)}}" class="btn col-12 btn-primary px-4 py-3 mt-3"> <i class="fa fa-eye"></i> Descrição</a></p>
                                                            </div>
                                    <div class="clearfix">
                                    </div>
                                </div>
                                </div>
                                <br>
                    </div>              
                 @endforeach 
                <!-- end course content container -->
                <!-- start course pagination -->
                <div class="mu-pagination">
                {{$listaCursosCat->links()}}
                </div>
                <!-- end course pagination -->
       </div>
     </div>
   </div>
 </section>

@endsection