 
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