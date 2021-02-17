<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" type="/backend/image/png" sizes="16x16" href="/backend/plugins/images/favicon.png">
    <title>Yetoafrica</title>
    <!-- Bootstrap Core CSS -->
    <link href="/backend/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- animation CSS -->
    <link href="/backend/css/animate.css" rel="stylesheet">
    <!-- Custom CSS -->
    <link href="/backend/css/style.css" rel="stylesheet">
    <!-- color CSS -->
    <link href="/backend/css/colors/megna-dark.css" id="theme" rel="stylesheet">
    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
    <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
<![endif]-->
</head>

<body>
    <!-- Preloader -->
    <div class="preloader">
        <svg class="circular" viewBox="25 25 50 50">
            <circle class="path" cx="50" cy="50" r="20" fill="none" stroke-width="2" stroke-miterlimit="10"/>
        </svg>
    </div>
    <section id="wrapper" class="new-login-register">
        <div class="lg-info-panel">
            <div class="inner-panel">
                <a href="javascript:void(0)" class="p-20 di"><img src="/backend/plugins/images/logo.png"></a>
                <div class="lg-content">
                    <h2>THE ULTIMATE & MULTIPURPOSE ADMIN TEMPLATE OF 2017</h2>
                    <p class="text-muted">with this admin you can get 2000+ pages, 500+ ui component, 2000+ icons, different demos and many more... </p> <a href="#" class="btn btn-rounded btn-danger p-l-20 p-r-20"> Buy now</a> </div>
            </div>
        </div>
        <div class="new-login-box">
            <div class="white-box">
                <h3 class="box-title m-b-0">Inscreva-se na Yetoafrica</h3> <small>Enter your details below</small>
                <form class="form-horizontal new-lg-form" name="loginform">
                @csrf
                    <div class="form-group ">
                        <div class="col-xs-12">
                            <input class="form-control" type="text" required="" name="name" placeholder="Name"> </div>
                    </div>
                    <div class="form-group ">
                        <div class="col-xs-12">
                            <input class="form-control" type="text" required="" name="email" placeholder="Email"> </div>
                    </div>
                    <div class="form-group ">
                        <div class="col-xs-12">
                            <input class="form-control" type="password" required="" name="password" placeholder="Password"> </div>
                    </div>

                    <div class="form-group">
                        <div class="col-xs-12">
<select  name="tipo" class="form-control">
    <option value="">Serás o que?</option>	
     <option value="formador">Formador</option>	
     <option value="aluno">Aluno</option>	
     <option value="academia">Academia</option>				
  </select>
    </div>
                    </div>
            <!--
                    <div class="form-group">
                        <div class="col-md-12">
                            <div class="checkbox checkbox-primary p-t-0">
                                <input id="checkbox-signup" type="checkbox">
                                <label for="checkbox-signup">Eu concordo com todos <a href="#">Termos</a></label>
                            </div>
                        </div>
                    </div>
    -->
                    <div class="form-group text-center m-t-20">
                        <div class="col-xs-12">
                            <button class="btn btn-info btn-lg btn-block text-uppercase waves-effect waves-light" type="submit">Sign Up</button>
                        </div>
                    </div>
                    <div class="form-group m-b-0">
                        <div class="col-sm-12 text-center">
                            <p>Já tens uma conta? <a href="/login" class="text-danger m-l-5"><b>Login</b></a></p>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </section>
    <!-- jQuery -->
    <script src="/backend/plugins/bower_components/jquery/dist/jquery.min.js"></script>
    <!-- Bootstrap Core JavaScript -->
    <script src="/backend/bootstrap/dist/js/bootstrap.min.js"></script>
    <!-- Menu Plugin JavaScript -->
    <script src="/backend/plugins/bower_components/sidebar-nav/dist/sidebar-nav.min.js"></script>
    <!--slimscroll JavaScript -->
    <script src="/backend/js/jquery.slimscroll.js"></script>
    <!--Wave Effects -->
    <script src="/backend/js/waves.js"></script>
    <!-- Custom Theme JavaScript -->
    <script src="/backend/js/custom.min.js"></script>
    <!--Style Switcher -->
    <script src="/backend/plugins/bower_components/styleswitcher/jQuery.style.switcher.js"></script>


    <script>
        $(function(){
           $('form[name="loginform"]').submit(function(event){
               event.preventDefault();

             $.ajax({
                url: "/registar/store",
                type: "post",
                data: $(this).serialize(),
                dataType: 'json',
                success: function(res){
                   console.log(res);
                }
            });
             
           });
        });

        $(function(){
           $('form[name="loginform"]').submit(function(event){
               event.preventDefault();

             $.ajax({
                url: "/registar/store",
                type: "post",
                data: $(this).serialize(),
                dataType: 'json',
                success: function(res){
                   console.log(res);
                }
            });
             
           });
        });
        
    </script>
</body>

</html>