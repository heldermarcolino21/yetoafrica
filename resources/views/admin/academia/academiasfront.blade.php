
@extends('layouts.app')
@section('corpo')
@include('layouts.menuf')
<!-- Page breadcrumb -->
<section id="mu-page-breadcrumb">
   <div class="container">
     <div class="row">
       <div class="col-md-12">
         <div class="mu-page-breadcrumb-area">
           <h2>Academias</h2>
           <ol class="breadcrumb">
            <li><a href="#">Home</a></li>            
            <li class="active">Academias</li>
          </ol>
         </div>
       </div>
     </div>
   </div>
 </section>
 <!-- End breadcrumb -->
 <section id="mu-course-content">  
            <div class="container">
                <div class="row">
                @foreach($listarAcademias as $lista)
                    <div class="col-lg-3 col-md-6 col-12">
                        <div class="our-team">
                          @if($lista->foto!=null)
                            <div class="team-img">
                                <img src="http://localhost:/nossafrica/storage/app/public/{{$lista->foto}}">
                            </div>
                            @else
                            <div class="team-img">
                                <img src="/oficial/assets/img/about-us.jpg">
                            </div>
                          @endif
                            <div class="team-content">
                                <h3 class="title">{{$lista->name}}</h3>
                                <span class="post">{{$lista->email}}</span>
                            </div>
                        </div>
                    </div>
              @endforeach
                    </div>
{{$listarAcademias->links()}}
</div>
</section>
  @endsection