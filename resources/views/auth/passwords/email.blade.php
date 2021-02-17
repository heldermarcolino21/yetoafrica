@php

define('HOME', 'http://localhost:8000');
define('THEME', 'estilos');

define('INCLUDE_PATH', HOME . '/backend/' . THEME);
define('REQUIRE_PATH', '/backend/' . THEME);

 @endphp

<!doctype html>
<html>
	<head>
		<title>Yetoafrica</title>
		<meta charset="utf-8">
		<link rel="shortcut icon" href="<?=REQUIRE_PATH?>/img/fiveicon13.png" type="image/x-icon">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<link rel="stylesheet" type="text/css" href="<?=REQUIRE_PATH?>/css/style.css">
		<link rel="stylesheet" type="text/css" href="<?=REQUIRE_PATH?>/css/auxiliar.css">
		<link rel="stylesheet" type="text/css" href="<?=REQUIRE_PATH?>/css/grade.css">
		<link rel="stylesheet" type="text/css" href="<?=REQUIRE_PATH?>/css/m-style.css">		
		<script type="text/javascript" src="<?=REQUIRE_PATH?>/js/js.js"></script>
	

		<!-- Styles -->
		<link href="{{ asset('css/app.css') }}" rel="stylesheet">


	</head>
<body>
<div class="base-topo">
		<div class="conteudo">
			<a href="" class="menu-m">menu mobile esquerdo</a><!-- aqui fica icone reponsavel pelo menu da esquerda-->
			<a href="" class="menu-grade">menu mobile direito</a><!--aqui fica o menu responsavel pelo menu do topo-->
			<a href="/admin/login" class="logo"></a>
			<div id="grade">
			
			</ul>
		</div>
		</div>
    </div>


<div class="container">

    <div class="row justify-content-center">
    
        <div class="col-md-8">
        <br>
            <div class="card">
                <div class="card-header">Recuperar Senha</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            Email enviado com sucesso
                        </div>
                    @endif

                    <form method="POST" action="{{ route('password.email') }}">
                        @csrf

                        <div class="form-group row">
                            <label for="email" class="col-md-4 col-form-label text-md-right">Email de Recuperação</label>

                            <div class="col-md-6">
                                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>

                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>Erro verifica o email</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    Enviar
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

<script script  src="//cdn.ckeditor.com/4.6.2/full/ckeditor.js"> </script>
    <script src="{{ asset('js/app.js') }}"></script>
</body>


</html>
