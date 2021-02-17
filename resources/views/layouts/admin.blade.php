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
		<link rel="shortcut icon" href="<?=INCLUDE_PATH?>/img/foto01.png" type="image/x-icon">
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
        @include('layouts.topo')
	    <div  id="app" style="display:none">
                @yield('content')
			
        </div> 


    <script script  src="//cdn.ckeditor.com/4.6.2/full/ckeditor.js"> </script>
    <script src="{{ asset('js/app.js') }}"></script>
</body>


</html>
