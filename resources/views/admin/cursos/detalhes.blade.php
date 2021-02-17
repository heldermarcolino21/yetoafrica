@extends('layouts.app')
@section('seo') 
<title>{{$listaCurso->curso_nome}}</title>
        <meta name="description" content="{{$listaCurso->curso_descricao}}"/>
        <meta name="robots" content="index, follow"/>

        <link rel="author" href="https://plus.google.com/posts"/>
        <link rel="publisher" href="https://plus.google.com/"/>
        <link rel="canonical" href="/cursonegocio/{{ $listaCurso->id }}">

        <meta itemprop="name" content="Yetoafrica"/>
        <meta itemprop="description" content="{{$listaCurso->curso_descricao}}"/>
        <meta itemprop="image" content="{{$listaCurso->curso_img}}"/>
        <meta itemprop="url" content="/cursonegocio/{{ $listaCurso->id }}"/>

        <meta property="og:type" content="article" />
        <meta property="og:title" content="{{$listaCurso->curso_nome}}" />
        <meta property="og:description" content="{{$listaCurso->curso_descricao}}" />
        <meta property="og:image" content="{{$listaCurso->curso_img}}" />
        <meta property="og:url" content="/cursonegocio/{{ $listaCurso->id }}" /> 
        <meta property="og:site_name" content="Yetoafrica" />
        <meta property="og:locale" content="pt_BR" />
        <meta property="og:app_id" content="626590460695980" />
        <meta property="article:author" content="https://www.facebook.com/" />
        <meta property="article:publisher" content="https://www.facebook.com/" />

        <meta property="twitter:card" content="summary_large_image" />
        <meta property="twitter:site" content="" />
        <meta property="twitter:domain" content="" />
        <meta property="twitter:title" content="" />
        <meta property="twitter:description" content="" />
        <meta property="twitter:image:src" content="" />
        <meta property="twitter:url" content="" />  
@endsection

@section('corpo')

<style>
  .jumbotron{
    background: url("../public/oficial/assets/img/comprimida.png") no-repeat;
  }
 .social-box{
    background: #FFF;
}

  .social-box .box{
    background: #FFF;
    border-radius: 10px; 
    padding: 40px 10px;
    margin: 20px 0px;
    cursor: pointer;
    transition: all 0.5s ease-out;
}

.bg-light{background-color: rgba(255,255,255,0.8);

}
.bg-blue{background-color: #ffb900; color: #fff;}

.social-box .box:hover{
   box-shadow: 0 0 6px #4183D7;
}

.social-box .box .box-text{
    margin:20px 0px;
    font-size: 15px;
    line-height: 30px;
}

.social-box .box .box-btn a{
    text-decoration: none;
    color: #4183D7;
    font-size: 16px;
}


.resp-container {
    position: relative;
    overflow: hidden;
    padding-top: 56.25%;
    height:500px;
}

.resp-iframe {
    position: absolute;
    top: 0;
    left: 0;
    width: 100%;
    height: 100%;
    border: 0;
}

.row{
       
        align-items: center;
        flex-wrap: wrap;
        justify-content: space-around;
    }

.col-2{
        flex-basis: 50%;
        min-width: 300px;
    }

    .col-2 img{
        max-width: 100%;
        padding: 50px 0;
    }

    .col-2 h1{
        font-size: 60px;
        line-height: 60px;
        margin:25px 0;
    }
</style>
@php 
        $cont="";
        @endphp
@if(isset($listaPedido))
        @php 
        $cont="";
        @endphp
        @foreach($listaPedido as $pedido)
        @if($pedido->curso_id==$listaCurso->id)
        @php 
        $cont="{$pedido->status}";
        @endphp
        @endif
        @endforeach
@endif
  <!--START SCROLL TOP BUTTON -->
  <a class="scrollToTop" href="#">
    <i class="fa fa-angle-up"></i>      
  </a>
<!-- END SCROLL TOP BUTTON -->
 
 <!-- End breadcrumb -->
    <!--inicio do corpo do container-->
    <header>
      <div>
    <section class="container py-3 ">
    <br><br><br>
      <div class="bg-blue">
     
        <div class="row">
            <div class="col-md-8 col-sm-12 col-lg-8">
              @if($listaCurso->curso_link!=null)
            <div class="resp-container">
    <iframe class="resp-iframe" src="{{$listaCurso->curso_link}}" gesture="media" allow="encrypted-media"  allowfullscreen></iframe>
   
  </div>
 
@else
<img src="http://localhost:/nossafrica/storage/app/public/{{$listaCurso->curso_img}}" alt="imagem do curso" style="	max-width: 100%;	width: 100%; height: 500px; object-fit: cover;"  class="img-thumbnail">

@endif
                    </div>
    <div class="col-md-4 col-sm-12 col-lg-4" style=" height:500px; ">
            <h4 style=" font-size: 30px; line-height: 30px; ">CATEGORIA: {{$recebe}}</h4>
              
                  <span class="btn btn-lg btn-info" >
                    <i class="fa fa-money" aria-hidden="true"></i> {{ number_format($listaCurso->curso_preco, 2, ',', '.') }} AKZ
                  </span>
                
               
                <p  style="text-align:justify; font-size: 17px; line-height: 17px; "> <br>{!!$listaCurso->curso_descricao!!}</p>
                <div class="row">
                    <div class="col-md-6">                        
                       <ul>
                             <li><i class="fa fa-book"></i> Acesso a plataforma</li>
                       <li><i class="fa fa-book"></i> Certificação</li>
                     <li><i class="fa fa-book"></i> Angola</li>
                       <li><i class="fa fa-book"></i> Garantia de 7 dias</li>
                       </ul>
                    </div>
                    
                     <div class="col-md-6">                        
                       <ul>
                       <li><i class="fa fa-book"></i> Certificação</li>
                       <li><i class="fa fa-book"></i> Acesso a plataforma</li>
                     <li><i class="fa fa-book"></i> Angola</li>
                       <li><i class="fa fa-book"></i> Garantia de 7 dias</li>
                       </ul>
                    </div>
    
    </div>
                <div class="row" style="display: flex;">
                    <div class="col-md-4">                        
                        <a title="Ver Os Cursos" href="/cursonegocio" class="btn col-12 btn-success" ><i class="fa fa-eye" aria-hidden="true"></i> Outros cursos</a>
                    </div>
    <div class="col-md-4"> 
            <form method="POST" action="{{ route('carrinho.adicionar') }}">
                {{ csrf_field() }}
                <input type="hidden" name="id" value="{{ $listaCurso->id }}">
               @if($cont=="PA") 
               <a title="Ver Os Cursos" href="/carrinho/compras" class="btn col-12 btn-success" ><i class="fa fa-eye" aria-hidden="true"></i> Aceder</a>     
               @else
               @if($cont=="RE")
               <a title="Ver Os Cursos" href="/carrinhos" class="btn col-12 btn-success" ><i class="fa fa-eye" aria-hidden="true"></i> Carrinho</a>

               @else
               <button class="btn col-12 btn-success" data-position="bottom" data-delay="50" data-tooltip="O curso será adicionado ao seu carrinho"><i class="fa fa-shopping-cart" aria-hidden="true"></i> Compre agora</button>           
               @endif
              
               @endif
               
              </form>     
    </div> 
    
    </div>
           

            </div>
        </div>
 
      
        </div>
 <div class="bg-light">
   <hr>
    <!--fim do corpo do container-->

    <div class="container">
			<div class="row">
				<div class="col-md-12">
					<div class="section-title text-center wow zoomIn">
						<h1>MÓDULOS</h1>
					</div>
				</div>
      </div>
     
			
			<div class="row">				
				<div class="col-md-12">
					<div class="panel-group" id="accordion" role="tablist" aria-multiselectable="false">
          @foreach($modulos as $lista)
        <div class="panel panel-default">
							<div class="panel-heading" role="tab" id="headingOne">
								<h4 class="panel-title">
									<a role="button" data-toggle="collapse" data-parent="#accordion" href="#collapse{{$lista->id}}" aria-expanded="true" aria-controls="collapseOne">
									{{$lista->modulo_titulo}}
									</a>
								</h4>
              </div>
              
							<div id="collapse{{$lista->id}}" class="panel-collapse collapse in" role="tabpanel" aria-labelledby="heading{{$lista->id}}">
								  <div class="panel-body">
                      {{$lista->modulo_descricao}}  <br>
                
                    <p>Aulas do módulo</p>
                    @foreach($listAulas as $aulas)	
                                
                      <li>{{$aulas->aula_titulo}}</li>     
                    @endforeach
                     
                  </div>
							</div>    

                <!--Acrescentado-->
              <div id="collapseTwo{{$lista->id}}" class="collapse" role="tabpanel" aria-labelledby="headingTwo{{$lista->id}}"
                  data-parent="#accordionEx1">
                  <div class="card-body">
                      <table cellpadding="0" cellspacing="0" border="0">
                          hffhfhhhfhd    
                          <tbody>		
                                {{$listAulas}}				 
                                @foreach($listAulas as $aulas)	
                                
                                {{$aulas->id}}
                              @endforeach				 
                                      
                          </tbody>
                       </table>
                   </div>
                
               
				      </div>
      </div>
      @endforeach	
			</div><!--- END ROW -->			
    </div>
    </div>
</div>
<br><br>
 
<div class="jumbotron">
  <h1>É hoje ou nunca</h1>
  <p>A yetoafrica está a trabalhar para garantir o teu futuro como profissional</p>
  <p><a class="btn btn-danger btn-lg" role="button">Compre agora</a></p>
</div>
 </section>
 <!-- AddToAny BEGIN -->
<div class="a2a_kit a2a_kit_size_32 a2a_default_style">
<a class="a2a_dd" href="https://www.addtoany.com/share"></a>
<a class="a2a_button_facebook"></a>
<a class="a2a_button_twitter"></a>
<!--<a class="a2a_button_email"></a> -->
<a class="a2a_button_whatsapp"></a>
<a class="a2a_button_linkedin"></a>
</div>


<script async src="https://static.addtoany.com/menu/page.js" ></script>
 </div>

  </div>    




  @endsection
