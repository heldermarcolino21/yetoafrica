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
<section id="mu-page-breadcrumb">
 
    <div class="container">
    <div class="row">
     <div class="col-3">
                  <img src="/oficial/assets/img/80.png"  alt="">
      </div>
           
      <div class="col-3">
                <h5>Mais do que preço,</h5>
                <p> o teu conhecimento tem valor!</p>
              
       </div>

            </div>   
    </div>
   </div>
 </section>
<div class="container">
     
 <div class="row">
             <div class="col-2">
                <h1>Crie um infoproduto</h1>
                <p>Ganhe dinheiro ensinando às pessoas.</p>
                <a href="" class="btn btn-success">Torna-se um formador</a>
            </div>

            <div class="col-2">
                  <img src="/oficial/assets/img/12.png" alt="">
            </div>
    </div>

   
    <div class="container">
    <div class="row">
     <div class="col-2">
                  <img src="/oficial/assets/img/13.png"  alt="">
      </div>
           
      <div class="col-2">
                <h1>Escolha e ensine da melhor maneira</h1>
                <p>O formador pode produzir o seu curso online, ebook, webinário ou masterclasse</p>
       </div>

            </div>   
    </div>
   </div>

   <div class="container">
    <div class="row">
    <div class="col-2">
                <h1>O melhor da tecnologia</h1>
                <p>Todas as ferramentas criadas pela Yetoáfrica para facilitar seu dia a dia como formador</p>
                
            </div>

            <div class="col-2">
                  <img src="/oficial/assets/img/cursos.png" alt="">
            </div>
    </div>
     </div>
</div>


  @endsection