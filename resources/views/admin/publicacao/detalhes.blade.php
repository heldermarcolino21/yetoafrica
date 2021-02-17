@extends('layouts.admin')
@section('content')

<h1>{{$publicacao->titulo}}</h1>
<div>
    {{$publicacao->conteudo}}
</div>

@include('admin.publicacao.comentarios')

@endsection