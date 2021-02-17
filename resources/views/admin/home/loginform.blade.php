<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <script
      src="https://kit.fontawesome.com/64d58efce2.js" ></script>
    <link rel="stylesheet" href="/login/style.css" />   
   
    <title>yetoafrica</title>
  </head>
  <body>
    <div class="container">
      <div class="forms-container">
        <div class="signin-signup">
      
          <form name="loginform"  method="POST" class="sign-in-form">
          @csrf
          @if($errors->all())
       @foreach($errors->all() as $key=>$value)
        <p>{{$value}}</p>
        @endforeach
        @endif
            <h2 class="title">Login</h2>
            @if(Session::get('sms'))
            <script>
            alert('Verifica o email para activar a sua conta');            
            </script>               
            @endif
            
            <div class="alert alert-danger d-none messageBox" role="alert" >
                        
                        </div>
            <div class="input-field">
              <i class="fas fa-envelope"></i>
              <input type="text" placeholder="Email" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus />
            </div>
            <div class="input-field">
              <i class="fas fa-lock"></i>
              <input type="password" placeholder="Password" name="password" required autocomplete="current-password"/>
            </div>
            <input type="submit" value="Login" class="btn solid" />
            <p class="social-text">Esqueceu a palavra passe? <a href="/password/reset">Recuperar</a></p>
           
          </form>          
          <form method="POST" class="sign-up-form" name="registarform" action="{{route('admin.registar')}}">           
            @csrf
            <h2 class="title">Registar</h2>
            @if(Session::get('sms'))
            <div class="alert alert-danger messageBox" role="alert" >
            {{Session::get('sms')}}
                        </div>
            @endif
            <div class="input-field">
              <i class="fas fa-user"></i>
              <input type="text" required="" name="name" placeholder="Nome"/>
            </div>

            <div class="input-field">
              <i class="fas fa-envelope"></i>
              <input type="text" required name="telefone" placeholder="Telefone" minlength="9" maxlength="14" />
            </div>
            
            <div class="input-field">
              <i class="fas fa-envelope"></i>
              <input type="email" required name="email" placeholder="Email"/>
            </div>

            <div class="input-field">
              <i class="fas fa-lock"></i>
              <input type="password" required name="password" placeholder="Password" minlength="6" />
            </div>
            
            <div class="input-field">
              <i class="fas fa-user"></i>
                <select  name="tipo" class="form-control" required>
                  <option value="">Regista-te como</option>	
                  <option value="formador">Formador</option>	
                  <option value="aluno">Aluno</option>	
                  <option value="academia">Academia</option>				
                </select>   
            </div>
            <div class=""><span id="message"></span></div>
            <input type="submit" class="btn" value="Cadastrar" />
       
          </form>
        </div>
      </div>

      <div class="panels-container">
        <div class="panel left-panel">
          <div class="content">
            <h3>Não tens conta?</h3>
            <p>
              Para teres uma conta na yetoafrica, é muito simples clica no
              botão abaixo
            </p>
            <button class="btn transparent" id="sign-up-btn">
              Registar
            </button>
          </div>
       <!--   <img src="/login/img/log.svg" class="image" alt="" /> -->
        </div>
        <div class="panel right-panel">
          <div class="content">
            <h3>Já tens conta?</h3>
            <p>
              Para acederes a nossa plataforma é muito simples clica no
              botão abaixo.
            </p>
            <button class="btn transparent" id="sign-in-btn">
              Login
            </button>
          </div>
       <!--   <img src="/login/img/register.svg" class="image" alt="" /> -->
        </div>
      </div>
    </div>

    <script type="text/javascript" src="/login/app.js"></script>
    <script type="text/javascript" src="/login/jquery.js"></script>

    <script type="text/javascript">
      $(function(){
           $('form[name="loginform"]').submit(function(event){
        
            event.preventDefault();
          
             $.ajax({
                url: "{{route('admin.login.do')}}",
                type: "post",
                data: $(this).serialize(),
                dataType: 'json',
                success: function(res){
                  if(res.success===true){
                    return window.location="{{route('admin')}}";
                  }else{
                    $('.messageBox').removeClass('.d-none').html(res.message);
                  }
                   console.log(res);
                }
            });
             
           });
        });        

        
                
    </script>
  </body>
</html>
