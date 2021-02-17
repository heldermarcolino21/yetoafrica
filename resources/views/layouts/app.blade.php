@php

define('HOME', 'http://localhost:8000');
define('THEME', 'assets');

define('INCLUDE_PATH', HOME . '/oficial/' . THEME);
define('REQUIRE_PATH', '/oficial/' . THEME);
@endphp

<!DOCTYPE html>
<html lang="pt-br" itemscope itemtype="https://schema.org/Article">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">    
    <title>Yetoafrica</title>
     @yield('seo')
    <!-- Favicon -->
    <link rel="shortcut icon" href="<?=REQUIRE_PATH?>/img/fiveicon13.png" type="image/x-icon">

    <!-- Font awesome -->
    <link href="<?=REQUIRE_PATH?>/css/font-awesome.css" rel="stylesheet">
    <link rel="stylesheet" href="<?=REQUIRE_PATH?>/aos.css">
    <!-- Bootstrap -->
    <link href="<?=REQUIRE_PATH?>/css/bootstrap.css" rel="stylesheet">   
    <!-- Slick slider -->
    <link rel="stylesheet" type="text/css" href="<?=REQUIRE_PATH?>/css/slick.css">          
    <!-- Fancybox slider -->
    <link rel="stylesheet" href="<?=REQUIRE_PATH?>/css/jquery.fancybox.css" type="text/css" media="screen" /> 
    <!-- Theme color -->
    <link id="switcher" href="<?=REQUIRE_PATH?>/css/theme-color/default-theme.css" rel="stylesheet">          

    <!-- Main style sheet -->
    <link href="<?=REQUIRE_PATH?>/css/style.css" rel="stylesheet">    
<!-- CSS personalizado -->
<link rel="stylesheet" href="<?=REQUIRE_PATH?>/personalizado.css">
<link rel="stylesheet" href="<?=REQUIRE_PATH?>/banner.css">
<link rel="stylesheet" href="<?=REQUIRE_PATH?>/font.css">
   
    <!-- Google Fonts -->
    <link rel="preconnect" href="https://fonts.gstatic.com">
<link href="https://fonts.googleapis.com/css2?family=Roboto:ital,wght@0,400;1,900&display=swap" rel="stylesheet">
    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->

  </head>
  <body> 

  @yield('social')
 
  

  <!--START SCROLL TOP BUTTON -->
    <a class="scrollToTop" href="#">
      <i class="fa fa-angle-up"></i>      
    </a>
  <!-- END SCROLL TOP BUTTON -->
 
  <div>
    <!--CONTEUDO-->
   

   <!--CONTEUDO-->

  @yield('corpo')

  </div>
  <!-- Start footer -->
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
                  <p>Website: yetoafrica.com</p>
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
          <p>&copy; Todos os direitos reservados a Yetoafrica</p>
        </div>
      </div>
    </div>
    <!-- end footer bottom -->
  </footer>
  <!-- End footer -->
  <script src="{{ asset('js/app.js') }}"></script>
  <!-- jQuery library -->
  <script src="<?=REQUIRE_PATH?>/js/jquery.min.js"></script>  
  <!-- Include all compiled plugins (below), or include individual files as needed -->
  <script src="<?=REQUIRE_PATH?>/js/bootstrap.js"></script>   
  <!-- Slick slider -->
  <script type="text/javascript" src="<?=REQUIRE_PATH?>/js/slick.js"></script>
  <!-- Counter -->
  <script type="text/javascript" src="<?=REQUIRE_PATH?>/js/waypoints.js"></script>
  <script type="text/javascript" src="<?=REQUIRE_PATH?>/js/jquery.counterup.js"></script>  
  <!-- Mixit slider -->
  <script type="text/javascript" src="<?=REQUIRE_PATH?>/js/jquery.mixitup.js"></script>
  <!-- Add fancyBox -->        
  <script type="text/javascript" src="<?=REQUIRE_PATH?>/js/jquery.fancybox.pack.js"></script>
  <!-- Custom js -->
  <script src="<?=REQUIRE_PATH?>/js/custom.js"></script> 
  
  </body>
</html>