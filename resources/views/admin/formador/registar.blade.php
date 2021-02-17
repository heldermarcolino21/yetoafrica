@extends('layouts.app')
@section('corpo')  
 <!-- END nav -->
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
                            <b>Inscrição</b> do Formador <br>
                            <small>Por favor Preencha com muita atenção</small>
                        </h3>
                    </div>

                    <div class="wizard-navigation">
                        <ul>
                            <li><a href="#perfil" data-toggle="tab">Perfil</a></li>
                            <li><a href="#contacto" data-toggle="tab">Contacto</a></li>
                            <li><a href="#formacao" data-toggle="tab">Formação</a></li>
                            <li><a href="#ordenadas-bancarias" data-toggle="tab">Ordenarias Bancarias</a></li>
                        </ul>

                    </div>

                    <div class="tab-content">
                        <div class="tab-pane" id="perfil">
                            <div class="row">
                                <h4 class="info-text">Pedimos que preencha todos os campos do formulario com
                                    bastante cuidado</h4>
                                <div class="col-md-3">
                                    <div class="picture-container">
                                        <div class="picture">
                                            <img src="assets/img/default-avatar.png" class="picture-src"
                                                id="wizardPicturePreview" title="" />
                                            <input type="file" id="wizard-picture">
                                        </div>
                                        <h6>Sua foto</h6>
                                    </div>
                                </div>
                                <div class="col-md-9">
                                    <div class="form-group">
                                        <label for="nome_completo">Nome Completo
                                            <small>(Obrigatório)</small></label>
                                        <input id="nome_completo" name="nome_completo" type="text" class="form-control"
                                            placeholder="Fernando Domingos">
                                    </div>
                                    <div class="form-group">
                                        <div class="row">
                                            <div class="col-sm-4">
                                                <label for="num_bi">Nº BI
                                                    <small>(Obrigatório)</small></label>
                                                <input id="num_bi" name="num_bi" maxlength="14" type="text"
                                                    class="form-control" placeholder="0032178549LP603">
                                            </div>
                                            <div class="col-sm-4">
                                                <label for="genero">Genero</label>
                                                <select id="genero" name="genero" type="text" class="form-control">
                                                    <option value="M">Masculino</option>
                                                    <option value="F">Femenino</option>
                                                    <option value="F">Outro</option>
                                                </select>
                                            </div>
                                            <div class="col-sm-4">
                                                <label for="genero">Estado Civil</label>
                                                <select id="genero" name="genero" type="text" class="form-control">
                                                    <option value="M">Solteiro</option>
                                                    <option value="F">Casado</option>
                                                    <option value="F">Divorciado</option>
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label style="cursor: pointer;" for="foto-bi"> <span class="icon-photo"></span>
                                            B.I <small>(Obrigatório)</small></label>
                                        <input id="foto-bi" name="foto-bilhete" type="file" class="form-control">
                                    </div>
                                </div>
                            </div>

                        </div>
                        <div class="tab-pane" id="contacto">
                            <div class="row">
                                <div class="col-sm-12 col-md-6">
                                    <div class="form-group">
                                        <label for="provincia">Província <small>(Obrigatório)</small></label>
                                        <input id="provincia" name="provincia" type="text" class="form-control"
                                            placeholder="EX.: Bengo">
                                    </div>
                                </div>
                                <div class="col-sm-12 col-md-6">
                                    <div class="form-group">
                                        <label for="minicipio">Município <small>(Opcional)</small></label>
                                        <input id="minicipio" name="minicipio" type="text" class="form-control"
                                            placeholder="EX.: Dande">
                                    </div>
                                </div>
                            </div>
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
                        <div class="tab-pane" id="formacao">
                            <div class="row">
                                <div class="col-sm-12">
                                    <h4 class="info-text">Indique todas as areas de formação. </h4>
                                </div>
                                <div class="col-sm-8 col-sm-offset-2">
                                    <div class="novo text-right">
                                        <a class="btn btn-success" href="#"><span class="icon icon-plus"></span><span
                                                class="text"> Novo </span></a>
                                    </div>
                                    <div class="formacao">
                                        <div class="form-group">
                                            <label>Curso de Formação</label>
                                            <input type="text" class="form-control" placeholder="EX.: Culinaria">
                                        </div>
                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label>Quando Início?</label>
                                                    <input type="date" class="form-control">
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label>Quando Terminou?</label>
                                                    <input type="date" class="form-control">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label for="certificado" style="cursor: pointer;"> <span
                                                    class="icon-photo"></span> Certificado
                                                <small>(Opcional)</small></label>
                                            <input id="certificado" name="Certificado" type="file" class="form-control">
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="tab-pane" id="ordenadas-bancarias">
                            <h4 class="info-text">As Ordenarias bancarias será o meio de pagamento que dos serviços
                                prestado. </h4>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="ibam">IBAM <small>(Obrigatório)</small></label>
                                        <input id="ibam" name="ibam" type="text" class="form-control"
                                            placeholder="EX: AO00 5500 0000 0602 8695 1011 5">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="ibam">Agencia Bancária <small>(Obrigatório)</small></label>
                                        <input id="ibam" name="ibam" type="text" class="form-control"
                                            placeholder="EX: Banco XXX">
                                    </div>
                                </div>
                            </div>

                        </div>
                    </div>
                    <div class="wizard-footer height-wizard">
                        <div class="pull-right">
                            <input type='button' class='btn btn-next btn-fill btn-warning btn-wd btn-sm' name='next'
                                value='Proximo' />
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