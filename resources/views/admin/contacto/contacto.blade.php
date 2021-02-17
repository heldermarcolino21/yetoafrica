@extends('layouts.app')
@section('social')
@include('layouts.social')
@endsection
@section('corpo')
@include('layouts.menuf')
<!-- Page breadcrumb -->
<section id="mu-page-breadcrumb">
   <div class="container">
     <div class="row">
       <div class="col-md-12">
         <div class="mu-page-breadcrumb-area">
           <h2>Contactos</h2>
           <ol class="breadcrumb">
            <li><a href="/">Home</a></li>            
            <li class="active">Contactos</li>
          </ol>
         </div>
       </div>
     </div>
   </div>
 </section>
 <!-- End breadcrumb -->

 <!-- Start contact  -->
 <section id="mu-contact">
   <div class="container">
     <div class="row">
       <div class="col-md-12">
         <div class="mu-contact-area">
          <!-- start title -->
          <div class="mu-title">
          @if(Session::get('sms'))
          <button class="btn-success">{{Session::get('sms')}}</button>
          @endif
            <h2>Fale conosco</h2>
            <p>Não exite em nos contactar</p>
          </div>
          <!-- end title -->
          <!-- start contact content -->
          <div class="mu-contact-content">           
            <div class="row">
              <div class="col-md-6">
                <div class="mu-contact-left">
                  <form class="contactform" action="{{route('contactos.store')}}" method="POST">       
                  {{ @csrf_field() }}           
                    <p class="comment-form-author">
                      <label for="author">Nome <span class="required">*</span></label>
                      <input type="text" required="required" size="30" name="contacto_nome">
                    </p>
                    <p class="comment-form-email">
                      <label for="email">Email <span class="required">*</span></label>
                      <input type="email" required="required" aria-required="true" placeholder="Seu email" name="contacto_email">
                    </p>
                    <p class="comment-form-email">
                      <label for="email">Assunto<span class="required">*</span></label>
                      <input type="text" required="required" aria-required="true" placeholder="Qual o assunto?" name="contacto_assunto">
                    </p>
                    <p class="comment-form-comment">
                      <label for="comment">Mensagem</label>
                      <textarea required="required" aria-required="true" rows="8" cols="45"  name="contacto_descricao"></textarea>
                    </p>                
                    <p class="form-submit">
                      <input type="submit" value="Mensagem" class="mu-post-btn" name="submit">
                    </p>        
                  </form>
                </div>
              </div>
              <div class="col-md-6">
                <div class="mu-contact-right">
                  <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3940.768650549373!2d13.2603208143404!3d-8.993423495068615!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x1a521fde31994907%3A0x4338e0b1538b03b0!2sKilamba%20Bloco%20C!5e0!3m2!1spt-PT!2sao!4v1607532424270!5m2!1spt-PT!2sao" width="100%" height="450" frameborder="0" style="border:0" allowfullscreen></iframe>
                </div>
              </div>
            </div>
          </div>
          <!-- end contact content -->
         </div>
       </div>
     </div>
   </div>
 </section>
 <!-- End contact  -->
 @endsection