@php

define('HOME', 'http://localhost:8000');
define('THEME', 'assets');

define('INCLUDE_PATH', HOME . '/oficial/' . THEME);
define('REQUIRE_PATH', '/oficial/' . THEME);

@endphp
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="">
    <title>Yetoafrica</title>
    <link href="/carrinho/css/bootstrap.min.css" rel="stylesheet">
    <link href="/carrinho/css/font-awesome.min.css" rel="stylesheet">
    <link href="/carrinho/css/prettyPhoto.css" rel="stylesheet">
    <link href="/carrinho/css/price-range.css" rel="stylesheet">
    <link href="/carrinho/css/animate.css" rel="stylesheet">
	<link href="/carrinho/css/main.css" rel="stylesheet">
	<link href="/carrinho/css/responsive.css" rel="stylesheet">
    <link href="/carrinho/css/carinhocss.css" rel="stylesheet">

    <!--[if lt IE 9]>
    <script src="js/html5shiv.js"></script>
    <script src="js/respond.min.js"></script>
    <![endif]-->       
    <link rel="shortcut icon" href="images/ico/favicon.ico">
    <link rel="apple-touch-icon-precomposed" sizes="144x144" href="images/ico/apple-touch-icon-144-precomposed.png">
    <link rel="apple-touch-icon-precomposed" sizes="114x114" href="images/ico/apple-touch-icon-114-precomposed.png">
    <link rel="apple-touch-icon-precomposed" sizes="72x72" href="images/ico/apple-touch-icon-72-precomposed.png">
    <link rel="apple-touch-icon-precomposed" href="images/ico/apple-touch-icon-57-precomposed.png">
</head><!--/head-->
 
<body>



  <!-- Start menu -->
  <section id="mu-menu">
    <nav class="navbar navbar-default navbar-fixed-top" role="navigation">  
      <div class="container">
         
              <div class="navbar-header">
          <!-- FOR MOBILE VIEW COLLAPSED BUTTON -->
          <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
          <!-- LOGO -->              
          <!-- TEXT BASED LOGO -->
          <a class="navbar-brand" href="/"><img src="/oficial/assets/img/esse.png" alt=""></a>
          <!-- IMG BASED LOGO  -->
          <!-- <a class="navbar-brand" href="index.html"><img src="assets/img/logo.png" alt="logo"></a> -->
        </div>
        <div id="navbar" class="navbar-collapse collapse">
          <ul id="top-menu" class="nav navbar-nav navbar-right main-nav">
            <li class="{{ isset($home) ? 'active' : '' }}"><a href="/">HOME</a></li>                      
            <li class="{{ isset($curso) ? 'active' : '' }}"><a href="/cursonegocio">CURSOS</a></li>
            <li class="{{ isset($formador) ? 'active' : '' }}"><a href="/formadores">FORMADORES</a></li>
            <li class="{{ isset($blog) ? 'active' : '' }}">
              <a href="/blogfront">BLOG</a>
            </li>            
            <li class="{{ isset($contacto) ? 'active' : '' }}"><a href="/contacto">CONTACTOS</a></li>
            @if(isset(auth()->user()->name))
            <li><a href="{{route('admin')}}">MINHA CONTA</a></li>  
            @else
            <li><a href="{{route('admin.login')}}">FAZER LOGIN</a></li>  
           @endif
          </ul>                     
        </div><!--/.nav-collapse -->        
      </div>     
    </nav>
  </section>
  <!-- End menu -->

  <section class="banner-carrinho">

 </section>







	<section id="cart_items">
			<div class="table-responsive cart_info">
            @forelse ($pedidos as $pedido)
				<table class="table table-condensed">
					<thead>
						<tr class="cart_menu">
							<td class="image">Imagem</td>
							<td class="description">Curso</td>
							<td class="price">Preço</td>							
							<td class="total">Total</td>
							<td></td>
						</tr>
                    </thead>
                    
					<tbody>
                    @php
                        $total_pedido = 0;
                    @endphp
                    @foreach ($pedido->pedido_cursos as $pedido_curso)
                   
						<tr>
							<td class="cart_product">			 						           
								  <a href=""><img src="http://localhost:/nossafrica/storage/app/public/{{$pedido_curso->curso->curso_img}}" style="width:200px; heigth:200px; object-fit:cover;" alt=""></a>
							</td>
							<td class="cart_description">
								<h4><a href="">{{ $pedido_curso->curso->curso_nome }}</a></h4>
							</td>
							<td class="cart_price">
								<p>{{ number_format($pedido_curso->curso->curso_preco, 2, ',', '.') }} Kz</p>
                            </td>
                            
                            @php
                            $total_produto = $pedido_curso->valores;
                            $total_pedido += $total_produto;
                            @endphp
							                       
							<td class="cart_total">
								<p class="cart_total_price">{{ number_format($total_produto, 2, ',', '.') }}</p>
							</td>
							<td class="cart_delete">
								<form action="{{route('carrinho.remover')}}" method="" enctype="multipart/form-data" token="{{ csrf_token() }}">
								<a class="cart_quantity_delete" href="{{route('carrinho.remover')}}"><i class="fa fa-times"></i>Deletar</a>
									<button type="submit">Deletar</button>
								</form>
							</td>
						</tr>
                        @endforeach 
					</tbody>
				</table> 
			</div>
		</div>
		
		

		<section id="do_action">
		<div class="container">
			<div class="heading">
				<h3>Concluir a compra</h3>
			</div>
			<div class="row">
  				<div class="col-sm-6">
					<div class="total_area">
						<ul>
							<li>Total a pagar <span>{{ number_format($total_pedido, 2, ',', '.') }} Kz</span></li>
						</ul>
             <div class="text-center">                
                <form method="POST" action="{{ route('carrinho.concluir') }}">
                    {{ csrf_field() }}
                    <input type="hidden" name="pedido_id" value="{{ $pedido->id }}">

                    <button type="submit" class="btn btn-default check_out" data-position="top" data-delay="50" data-tooltip="Adquirir os produtos concluindo a compra?">
                     Concluir compra
                    </button>   
                </form>
							
                </div>    
            </div>
				</div>
			</div>
		</div>
	</section><!--/#do_action-->

        @empty
            <h5>Não há nenhum pedido no carrinho</h5>
        @endforelse
	</section> <!--/#cart_items-->

    

	<footer id="mu-footer">
    <!-- start footer top -->
    <div class="mu-footer-top">
      <div class="container">
        <div class="mu-footer-top-area">
          <div>
            <div class="col-lg-3 col-md-3 col-sm-3">
              <div class="mu-footer-widget">
                <h4>A Sua plataforma</h4>
                <ul>
                  <li><a href="<?=HOME?>/cursonegocio">Cursos</a></li>
                  <li><a href="<?=HOME?>/formadores">Formadores</a></li>
                  <li><a href="<?=HOME?>/contacto">Fala Connosco</a></li>
                </ul>
              </div>
            </div>
            <div class="col-lg-3 col-md-3 col-sm-3">
              <div class="mu-footer-widget">
                <h4>Nosso Conteúdo</h4>
                <ul>
                  <li><a href="<?= HOME ?>/blogfront">Blog</a></li>
                  <li><a href="<?=HOME?>/perguntas">Perguntas</a></li>
                                   
                </ul>
              </div>
            </div>
            <div class="col-lg-3 col-md-3 col-sm-3">
              <div class="mu-footer-widget">
                <h4>Newsletter</h4>
                @if(Session::get('sms'))
                  <p class="btn-success">{{Session::get('sms')}}</p>

                  @else
                  <p>Deixa o seu email para estar actualizado</p>
                @endif
             
                <form action="{{route('newslater.store')}}" class="mu-subscribe-form" method="post">
                {{ csrf_field() }}
                @if($errors->all())
       @foreach($errors->all() as $key=>$value)
        <p class="btn-danger">{{$value}}</p>
        @endforeach
        @endif
                  <input type="email" name="email" placeholder="Teu email">
                  <button class="mu-subscribe-btn" type="submit">Inscreva-se!</button>
                </form>               
              </div>
            </div>
            <div class="col-lg-3 col-md-3 col-sm-3">
              <div class="mu-footer-widget">
                <h4>Contactos
                </h4>
                <address>
                  <p>C20, Kilamba, Luanda, Angola</p>
                  <p>Telefone: 	+244 222 719 987 </p>
                  <p>Email: contacto@yetoafrica.com</p>
                </address>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
    <!-- end footer top -->
    <!-- start footer bottom -->
    <div class="mu-footer-bottom">
      <div class="container">
        <div class="mu-footer-bottom-area">
          <p class="text-center textreser">&copy; Todos os direitos reservados a Yetoafrica</p>
        </div>
      </div>
    </div>
    <!-- end footer bottom -->
  </footer>


    <script src="/carrinho/js/jquery.js"></script>
	<script src="/carrinho/js/bootstrap.min.js"></script>
	<script src="/carrinho/js/jquery.scrollUp.min.js"></script>
    <script src="/carrinho/js/jquery.prettyPhoto.js"></script>
    <script src="/carrinho/js/main.js"></script>
</body>
</html>


