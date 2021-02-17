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
           <h2>Blog </h2>
           <ol class="breadcrumb">
            <li><a href="/">Home</a></li>            
            <li class="active">Blog</li>
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
       <div class="col-md-12">
         <div class="mu-course-content-area">
            <div class="row">
              <div class="col-md-9">
                <!-- start course content container -->
                <div class="mu-course-container mu-blog-archive">
                  <div class="row">
                  
                  @foreach($listaPublicacao as $lista)
                    <div class="col-md-6 col-sm-6">
                      <article class="mu-blog-single-item">
                        <figure class="mu-blog-single-img">
                          <a href="/blogfront/{{base64_encode($lista->id)}}"><img src="http://localhost:/nossafrica/storage/app/public/{{$lista->blog_foto}}" style="	max-width: 100%;	width: 360px; height: 260px; object-fit: cover;" alt="img"></a>
                          <figcaption class="mu-blog-caption">
                            <h3><a href="/blogfront/{{base64_encode($lista->id)}}">{{$lista->blog_titulo}}</a></h3>
                          </figcaption>                      
                        </figure>
                        <div class="mu-blog-meta">
                          <a href="#">By Admin</a>
                          <a href="#">02 June 2016</a>
                          <span><i class="fa fa-comments-o"></i>87</span>
                        </div>
                        <div class="mu-blog-description">
                          {!!$lista->blog_descricao!!}
                        </div>
                   <div class="mu-latest-course-single-contbottom">
                    <a class="btn btn-success" href="/blogfront/{{base64_encode($lista->id)}}">Detalhes</a>
                    </div>

                      </article> 
                    </div> 
                    @endforeach
                   
                  </div>
                </div>
                <!-- end course content container -->
                <!-- start course pagination -->
                <div class="mu-pagination">
                  {{$listaPublicacao->links()}}
                </div>
                <!-- end course pagination -->
              </div>
              <div class="col-md-3">
                <!-- start sidebar -->
                <aside class="mu-sidebar">
                  <!-- start single sidebar -->
                  <div class="mu-single-sidebar">
                  <form class="form force-inline" action="{{route('blog.search')}}">
                  {{ csrf_field() }}
                   <input type="text" placeholder="Search.." name="search" value="{{$filters['search'] ?? ''}}">
                    <button type="submit"><i class="fa fa-search"></i></button>
                  </form>
                    <h3>Categorias</h3>
                    <ul class="mu-sidebar-catg">
                      @foreach($listaCategorias as $lista)
                      <li><a href="/blogcat/{{base64_encode($lista->id)}}">{{$lista->cat_nome}}</a></li>
                      @endforeach
                    </ul>
                  </div>
                  <!-- end single sidebar -->
                  <!-- start single sidebar -->
                  <div class="mu-single-sidebar">
                    <h3>Últimas Publicação</h3>
                    <div class="mu-sidebar-popular-courses">
                    @foreach($listaUltimas as $lista)
                      <div class="media">
                        <div class="media-left">
                          <a href="/blogfront/{{base64_encode($lista->id)}}">
                            <img class="media-object" src="http://localhost:/nossafrica/storage/app/public/{{$lista->blog_foto}}"  alt="img">
                          </a>
                        </div>
                        <div class="media-body">
                          <h4 class="media-heading"><a href="/blogfront/{{base64_encode($lista->id)}}">{{$lista->blog_titulo}}</a></h4>                      
                          <span class="popular-course-price">{!!$lista->blog_descricao!!}</span>
                        </div>
                    </div>
                    @endforeach
                    </div>
                  </div>
                  <!-- end single sidebar -->
                 
                 
                </aside>
                <!-- / end sidebar -->
             </div>
           </div>
         </div>
       </div>
     </div>
   </div>
 </section>
       
		
  @endsection