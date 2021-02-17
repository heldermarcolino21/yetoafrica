@extends('layouts.app')
@section('corpo')
<div class="gototop js-top">
        <a href="#" class="js-gotop"><i class="icon-arrow-up"></i></a>
    </div>
    <!-- END nav -->
    <!--inicio do corpo do container-->
    <section class="container pb-5">
        <!--      Wizard container        -->
        <div class="wizard-container">
            <div class="wizard-card" data-color="orange" id="wizardProfile">
                <form action="" method="">
                    <!--        You can switch ' data-color="orange" '  with one of the next bright colors: "blue", "green", "orange", "red"          -->

                    <div class="wizard-header">
                        <h3>
                            <b>Pagamento</b> do seu Curso <br>
                            <small>A validação do pagamento do curso inicia 24h após a sua
                                efetivação</small>
                        </h3>
                    </div>

                    <div class="wizard-navigation">
                        <ul>
                            <li><a href="#perfil" data-toggle="tab">Perfil</a></li>
                            <li><a href="#contacto" data-toggle="tab">Contacto</a></li>
                            <li><a href="#pagamento" data-toggle="tab">Pagamento</a></li>
                        </ul>

                    </div>

                    <div class="tab-content">
                        <div class="tab-pane" id="perfil">
                            <div class="row">
                                <h4 class="info-text">Pedimos que preencha todos os campos do formulario com
                                    bastante cuidado</h4>
                                <div class="col-sm-4">
                                    <div class="picture-container">
                                        <div class="picture">
                                            <img src="assets/img/default-avatar.png" class="picture-src"
                                                id="wizardPicturePreview" title="" />
                                            <input type="file" id="wizard-picture">
                                        </div>
                                        <h6>Sua foto</h6>
                                    </div>
                                </div>
                                <div class="col-sm-8">
                                    <div class="form-group">
                                        <label for="nome_completo">Nome Completo
                                            <small>(Obrigatório)</small></label>
                                        <input id="nome_completo" name="nome_completo" type="text"
                                            class="form-control" placeholder="Fernando Domingos">
                                    </div>
                                    <div class="form-group">
                                        <div class="row">
                                            <div class="col-sm-6">
                                                <label for="num_bi">Nº BI
                                                    <small>(Obrigatório)</small></label>
                                                <input id="num_bi" name="num_bi" maxlength="14" type="text"
                                                    class="form-control" placeholder="0032178549LP603">
                                            </div>
                                            <div class="col-sm-6">
                                                <label for="genero">Genero</label>
                                                <select id="genero" name="genero" type="text"
                                                    class="form-control">
                                                    <option value="M">Masculino</option>
                                                    <option value="F">Femenino</option>
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                            </div>
                        </div>
                        <div class="tab-pane" id="contacto">
                            <div class="row">
                                <div class="col-sm-12 col-md-6">
                                    <div class="form-group">
                                        <label for="email">Email <small>(Obrigatório)</small></label>
                                        <input id="email" name="email" type="email" class="form-control"
                                            placeholder="andrew@creative-tim.com">
                                    </div>
                                </div>
                                <div class="col-sm-12 col-md-6">
                                    <div class="form-group">
                                        <label for="telefone">Telefone <small>(Opcional)</small></label>
                                        <input id="telefone" name="telefone" type="tel" class="form-control"
                                            placeholder="900 000 000">
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="tab-pane" id="pagamento">
                            <div class="row">
                                <div class="col-sm-12">
                                    <h4 class="info-text">Muito Bem, Agora Conclua o Seu Pagamento </h4>
                                </div>
                                <div class="col-sm-8 col-sm-offset-2">
                                    <div class="form-group">
                                        <label>Valor a Pagar</label>
                                        <input type="number" class="form-control"
                                            placeholder="Valor a pagar">
                                    </div>
                                </div>
                                <div class="col-sm-8 col-sm-offset-2">
                                    <div class="picture-container">
                                        <div class="picture">
                                            <img src="/assets/img/camera_50px.png" class="picture-src"
                                                id="wizardPicturePreview"
                                                title="foto de comprovativo de pagamento" />
                                            <input type="file" id="wizard-picture">
                                        </div>
                                        <h6>Comprovativo de Pagamento</h6>
                                    </div>
                                </div>

                            </div>
                        </div>
                    </div>
                    <div class="wizard-footer height-wizard">
                        <div class="pull-right">
                            <input type='button' class='btn btn-next btn-fill btn-warning btn-wd btn-sm'
                                name='next' value='Proximo' />
                            <input type='button' data-dismiss="modal" aria-label="Close"
                                class='btn btn-finish btn-fill btn-warning btn-wd btn-sm' name='finish'
                                value='Confirmar' />
                        </div>

                        <div class="pull-left">
                            <input type='button' class='btn btn-previous btn-fill btn-default btn-wd btn-sm'
                                name='previous' value='Voltar' />
                        </div>
                        <div class="clearfix"></div>
                    </div>

                </form>
            </div>
        </div> <!-- wizard container -->
    </section>
    <!--fim do corpo do container-->

    @endsection