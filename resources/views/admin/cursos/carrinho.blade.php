<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title>YetoÁfrica</title>
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <link href="https://fonts.googleapis.com/css?family=Poppins:200,300,400,500,600,700,800,900&display=swap"
        rel="stylesheet">

    <link href="/carrinho/assets/css/bootstrap.min.css" rel="stylesheet" />
    <!-- <link rel="stylesheet" href="css/open-iconic-bootstrap.min.css"> -->
    <link rel="stylesheet" href="/carrinho/css/animate.css">
    <link rel="icon" href="images/fiveicon.png" type="image/x-icon">
    <link rel="stylesheet" href="/carrinho/css/owl.carousel.min.css">
    <link rel="stylesheet" href="/carrinho/css/owl.theme.default.min.css">
    <link rel="stylesheet" href="/carrinho/css/magnific-popup.css">

    <link rel="stylesheet" href="/carrinho/css/aos.css">

    <link rel="stylesheet" href="/carrinho/css/ionicons.min.css">

    <link rel="stylesheet" href="/carrinho/css/flaticon.css">
    <link rel="stylesheet" href="/carrinho/css/icomoon.css">
    <link rel="stylesheet" href="/carrinho/js/pnotify/pnotify.custom.css">
    <link rel="stylesheet" href="/carrinho/css/style.css">

    <!-- parte de estilização do formulario -->
    <!--     Fonts and icons     -->
    <link href="http://netdna.bootstrapcdn.com/font-awesome/4.4.0/css/font-awesome.css" rel="stylesheet">
    <!-- CSS Files -->
    <link href="/carrinho/assets/css/gsdk-bootstrap-wizard.css" rel="stylesheet" />
</head>

<body>
    <!--inicio do corpo do container-->
    <section class="container py-3">
        <div class="row">
            <div class="col-md-6 col-sm-12 col-lg-6">
                <img src="http://localhost:/nossafrica/storage/app/public/{{$listaCurso->curso_img}}" alt="imagem do curso" class="img-thumbnail">
            </div>
            <div class="col-md-6 col-sm-12 col-lg-6">
                <h4>{{$listaCurso->curso_nome}}</h4>
                <span>{{$listaCurso->curso_preco}} AKZ</span>
              
                <p class="text-center"> <strong>IBAN:</strong> A000 0000 9980 0989 0023 22</p>
                <p class="text-center"> <strong>Nº de Conta: </strong> 989 0023 22</p>
                <div class="row">
                    <div class="col-md-6">                        
                        <a title="Ver Os Cursos" href="/cursonegocio" class="btn col-12 btn-primary px-5 py-3 mt-3">Ver Outro Curso</a>
                    </div>
             <div class="col-md-6"> 
                    <form method="POST" action="{{ route('carrinho.adicionar') }}">
                {{ csrf_field() }}
                <input type="hidden" name="id" value="{{ $listaCurso->id }}">
                
                <button class="btn col-12 btn-primary px-4 py-3 mt-3" data-position="bottom" data-delay="50" data-tooltip="O curso será adicionado ao seu carrinho">Carrinho</button>   
              
            </form>
    </div>             
    </div>
           

            </div>
        </div>
    </section>

    <section class="container py-3">
        <nav>
            <div class="nav nav-tabs" id="nav-tab" role="tablist">
                <a class="nav-link active" id="descricao-tab" data-toggle="tab" href="#descricao" role="tab"
                    aria-controls="descricao" aria-selected="true">Descrição</a>
                <a class="nav-link" id="outra-descricao-tab" data-toggle="tab" href="#outra-descricao" role="tab"
                    aria-controls="outra-descricao" aria-selected="false">Outras Descrições</a>
            </div>
        </nav>
        <div class="tab-content" id="nav-tabContent">
            <div class="tab-pane fade show active" id="descricao" role="tabpanel" aria-labelledby="descricao-tab">
                <div class="container my-5">
                {!!$listaCurso->curso_descricao!!}
                </div>

            </div>
            <div class="tab-pane fade" id="outra-descricao" role="tabpanel" aria-labelledby="outra-descricao-tab">
                <div class="container my-5">

                    <ul class="list-group list-group-flush">
                        <li class="list-group-item">E-Book: <span>2</span></li>
                        <li class="list-group-item">Videos: <span>25</span></li>
                    </ul>
                </div>
            </div>
        </div>
    </section>

    <section class="container py-3">
        <h1 class="text-capitalize text-center">conteúdo do curso</h1>
        <div class="row">
            <div class="col-md-4 col-sm-12 col-lg-6">
                <div class="card">
                    <h5 class="card-title mx-3 my-3">Modulo 1</h5>
                    <div class="card-body">
                        <h5 class="card-title">Fundamentos da Contabilidade</h5>
                        <ul>
                            <li>plano de contas</li>
                            <li>estrato</li>
                            <li>balanço</li>
                            <li> juro </li>
                            <li> credito </li>
                        </ul>                        
                    </div>
                </div>
            </div>
            <div class="col-md-4 col-sm-12 col-lg-6">
                <div class="card">
                    <h5 class="card-title mx-3 my-3">Modulo 2</h5>
                    <div class="card-body">
                        <h5 class="card-title">Aplicação Contabilistico e Auditoria</h5>
                        <ul>
                            <li>Revisão de Contas</li>
                            <li>Análise fisica e Documental</li>
                            <li>Lei geral do Trabalho</li>
                            <li> juro </li>
                            <li> credito </li>
                        </ul>  
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!--fim do corpo do container-->
 
    <div class="modal fade" id="pagar" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">PAGAMENTO</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form action="perfil.html">
                        <span class="text-uppercase">atenção: </span>
                        <p>O pagamento da sua subscrição ao curso inicia 24 horas após a sua efetivação.</p>
                        <div class="form-group">
                            <label for="foto">foto do comprovativo de pagamento</label>
                            <input type="file" name="foto" id="foto" required class="form-control">
                        </div>
                        <div class="form-group">
                            <button type="submit" class="btn btn-primary col-12  px-4 py-3 mt-3">Confirme</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    </body>
    <script src="{{ asset('js/app.js') }}"></script>
    <script src="/carrinho/js/jquery.min.js"></script>
    <script src="/carrinho/js/jquery-migrate-3.0.1.min.js"></script>
    <script src="/carrinho/js/popper.min.js"></script>
    <script src="/carrinho/js/bootstrap.min.js"></script>
    <script src="/carrinho/js/jquery.easing.1.3.js"></script>
    <script src="/carrinho/js/jquery.waypoints.min.js"></script>
    <script src="/carrinho/js/jquery.stellar.min.js"></script>
    <script src="/carrinho/js/owl.carousel.min.js"></script>
    <script src="/carrinho/js/jquery.magnific-popup.min.js"></script>
    <script src="/carrinho/js/aos.js"></script>
    <script src="/carrinho/js/jquery.animateNumber.min.js"></script>
    <script src="/carrinho/js/scrollax.min.js"></script>
    <script src="/carrinho/js/pnotify/pnotify.custom.js"></script>
    <script src="/carrinho/js/main.js"></script>

    <!-- parte de configuração do formulario -->
    <script src="/carrinho/assets/js/jquery-2.2.4.min.js" type="text/javascript"></script>
    <script src="/carrinho/assets/js/bootstrap.min.js" type="text/javascript"></script>
    <script src="/carrinho/assets/js/jquery.bootstrap.wizard.js" type="text/javascript"></script>

    <!--  Plugin for the Wizard -->
    <script src="/carrinho/assets/js/gsdk-bootstrap-wizard.js"></script>
   




</html>



