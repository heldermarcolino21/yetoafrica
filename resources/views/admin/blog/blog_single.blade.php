@extends('layouts.app')
@section('seo') 
<title>{{$listaPublicacao->blog_titulo}}</title>
        <meta name="description" content="{!!$listaPublicacao->blog_descricao!!}"/>
        <meta name="robots" content="index, follow"/>

        <link rel="author" href="https://plus.google.com/posts"/>
        <link rel="publisher" href="https://plus.google.com/"/>
        <link rel="canonical" href="/blogfront/{{base64_encode($listaPublicacao->id)}}">

        <meta itemprop="name" content="Yetoafrica"/>
        <meta itemprop="description" content="{!!$listaPublicacao->blog_descricao!!}"/>
        <meta itemprop="image" content="http://localhost:/nossafrica/storage/app/public/{{$listaPublicacao->blog_foto}}"/>
        <meta itemprop="url" content="/blogfront/{{base64_encode($listaPublicacao->id)}}"/>

        <meta property="og:type" content="article" />
        <meta property="og:title" content="{{$listaPublicacao->blog_titulo}}" />
        <meta property="og:description" content="{!!$listaPublicacao->blog_descricao!!}" />
        <meta property="og:image" content="http://localhost:/nossafrica/storage/app/public/{{$listaPublicacao->blog_foto}}" />
        <meta property="og:url" content="/blogfront/{{base64_encode($listaPublicacao->id)}}" /> 
        <meta property="og:site_name" content="Yetoafrica" />
        <meta property="og:locale" content="pt_BR" />
        <meta property="og:app_id" content="626590460695980" />
        <meta property="article:author" content="https://www.facebook.com/" />
        <meta property="article:publisher" content="https://www.facebook.com/" />

        <meta property="twitter:card" content="summary_large_image" />
        <meta property="twitter:site" content="Yetoafrica" />
        <meta property="twitter:domain" content=".com" />
        <meta property="twitter:title" content="{{$listaPublicacao->blog_titulo}}" />
        <meta property="twitter:description" content="{!!$listaPublicacao->blog_descricao!!}" />
        <meta property="twitter:image:src" content="http://localhost:/nossafrica/storage/app/public/{{$listaPublicacao->blog_foto}}" />
        <meta property="twitter:url" content="/blogfront/{{base64_encode($listaPublicacao->id)}}" />  
@endsection

@section('corpo')
@include('layouts.menuf')
 <!-- Page breadcrumb -->
 <section id="mu-page-breadcrumb">
   <div class="container">
     <div class="row">
       <div class="col-md-12">
         <div class="mu-page-breadcrumb-area">
           <h2>{{$listaPublicacao->blog_titulo}}</h2>
           <ol class="breadcrumb">
            <li><a href="/">Home</a></li>            
            <li class="active">{{$listaPublicacao->blog_titulo}}</li>
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
                <div class="mu-course-container mu-blog-single">
                  <div class="row">
                    <div class="col-md-12">
                      <article class="mu-blog-single-item">
                        <figure class="mu-blog-single-img">
                          <a href="#"><img alt="img" src="http://localhost:/nossafrica/storage/app/public/{{$listaPublicacao->blog_foto}}"></a>
                          <figcaption class="mu-blog-caption">
                            <h3><a href="#">{{$listaPublicacao->blog_titulo}}</a></h3>
                          </figcaption>                      
                        </figure>
                        <div class="mu-blog-meta">
                          <a href="#">Admin</a>
                          <a href="#">02 June 2016</a>
                          <span><i class="fa fa-comments-o"></i>87</span>
                        </div>
                        <div class="mu-blog-description">
                         {!!$listaPublicacao->blog_descricao!!}
                        </div>
                        <!-- start blog post tags -->
                      
                        <!-- End blog post tags -->
                      </article>
                    </div>                                   
                  </div>
                </div>
                <!-- end course content container -->
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
                            <img class="media-object" src="http://localhost:/nossafrica/storage/app/public/{{$lista->blog_foto}}" alt="img">
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

 <!-- AddToAny BEGIN -->
<div class="a2a_kit a2a_kit_size_32 a2a_default_style">
<a class="a2a_dd" href="https://www.addtoany.com/share"></a>
<a class="a2a_button_facebook"></a>
<a class="a2a_button_twitter"></a>
<!--<a class="a2a_button_email"></a> -->
<a class="a2a_button_whatsapp"></a>
<a class="a2a_button_linkedin"></a>
</div>
<script async src="https://static.addtoany.com/menu/page.js" ></script>
</div>

 </section>


  @endsection