<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Contactos</title>
</head>
<body>
<div>
<h1>{{ $contactos->contacto_nome }}</h1>
<p><strong>email:</strong> {{$contactos->contacto_email }}</p>
<p><strong>Assunto:</strong> {{$contactos->contacto_assunto }}</p>
<p>{!!$contactos->contacto_descricao !!}</p>

</div>
</body>
</html>