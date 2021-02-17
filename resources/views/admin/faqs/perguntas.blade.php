@extends('layouts.app')
@section('social')
@include('layouts.social')
@endsection
@section('corpo')
@include('layouts.menuf')
<style>

    .row{
        display: flex;
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

    .col-3 h5{
        font-size: 60px;
        line-height: 60px;
        margin:25px 0;
        color: #fff;
    }

    .col-3 p{
        color: #fff;
        font-size: 30px;
        line-height: 30px;
    }

    .col-2 p{
        font-size: 30px;
        line-height: 30px;
    }
</style>
 <!-- Page breadcrumb -->
 <section id="mu-page-breadcrumb">
 
 <div class="container">
 <div class="row">
  <div class="col-3">
               <img src="/oficial/assets/img/cursooline.png"  alt="">
   </div>
        
   <div class="col-3">
             <h5>Perguntas,</h5>
             <p> Frequentes sobre a plataforma</p>
           
    </div>

         </div>   
 </div>
</div>
</section>
 <!-- End breadcrumb -->
<!-- END nav -->
    <div class="gototop js-top">
		<a href="#" class="js-gotop"><i class="icon-arrow-up"></i></a>
	</div>
    <!-- END nav -->
    <!-- start body content -->
 
<div class="container">

     
 <div class="row">
             <div class="col-2">
                <h1>Queres aprender sobre o que?</h1>
                <p>Ganhe dinheiro ensinando às pessoas.</p>
               
            </div>

            <div class="col-2">
                  <img src="/oficial/assets/img/Cursos-Online.png" alt="">
            </div>
  </div>

<center>

<h2>PERGUNTAS FREQUENTES</h2>
 
</center>
  <div class="panel-group" id="accordion">
    <div class="panel panel-default">
    @foreach($listaPerguntas as $lista)
      <div class="panel-heading">
        <h4 class="panel-title">
          <a data-toggle="collapse" data-parent="#accordion" href="#collapse{{$lista->id}}"> {!! strip_tags($lista->pergunta,'<h1><h2><h3><h4><h5><h6><b><strong><i><em><a[href|title]><ul><ol><li><p[style]><br><span><img>') !!}</a>
        </h4>
      </div>
      <div id="collapse{{$lista->id}}" class="panel-collapse collapse in">
        <div class="panel-body">{!! strip_tags($lista->resposta,'<h1><h2><h3><h4><h5><h6><b><strong><i><em><a[href|title]><ul><ol><li><p[style]><br><span><img>') !!}</div>
      </div>
    @endforeach
    </div>
</div>

    @endsection