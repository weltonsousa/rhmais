@extends('layout/app')
@section('titulo','Editar Orientador | RH MAIS')
@section('conteudo')
<div class="container body">
    <div class="main_container">
        <div class="col-md-3 left_col">
            <div class="left_col scroll-view">
                @include('layout.menu.menu')
                <!-- /menu profile quick info -->

                <br />
                @include('layout.menu.sidebar')
                <!-- /sidebar menu -->
            </div>
        </div>
        @include('layout.menu.menutop')
        <!-- page content -->
        <div class="right_col" role="main">
            <div class="clearfix"></div>

            <div class="row">

                <div class="col-md-12 col-sm-12 col-xs-12">
                    <div class="x_panel">
                        <div class="x_title">
                            <h2>Editar Orientador</h2>
                            <div class="clearfix"></div>
                        </div>
                        <div class="x_content">
                            <form action="{{ route('orientador.update',  $orientador->id) }}" id="myForm" role="form"
                                data-toggle="validator" method="post" accept-charset="utf-8">
                                @csrf
                                @method("PUT")

                                <!-- SmartWizard html -->
                                <div>
                                    <div>
                                        <div>
                                            <br>
                                            <div id="form-step-0" role="form" data-toggle="validator">
                                                <div class="row" style="width:960px; margin: 0 auto;">
                                                    <div class="col-md-6 col-sm-6 col-xs-12 form-group has-feedback">
                                                        <input type="text" value="{{ $orientador->nome }}"
                                                            class="form-control has-feedback-left"
                                                            placeholder="Nome Completo" name="nome">
                                                        <span class="fa fa-user form-control-feedback left"
                                                            aria-hidden="true"></span>
                                                    </div>

                                                    <div class="col-md-6 col-sm-6 col-xs-12 form-group has-feedback">
                                                        <input type="text" value="{{ $orientador->cpf }}"
                                                            class="form-control has-feedback-left cpf" placeholder="CPF:"
                                                            name="cpf">
                                                        <span class="fa fa-user form-control-feedback left"
                                                            aria-hidden="true"></span>
                                                    </div>
                                                    <div class="col-md-6 col-sm-6 col-xs-12 form-group has-feedback">
                                                        <input type="text" value="{{ $orientador->rg }}"
                                                            class="form-control has-feedback-left rg" placeholder="RG:"
                                                            name="rg">
                                                        <span class="fa fa-user form-control-feedback left"
                                                            aria-hidden="true"></span>
                                                    </div>
                                                    <div class="col-md-6 col-sm-6 col-xs-12 form-group has-feedback">
                                                        <select  class="form-control has-feedback-left" name="estado">
                                                            <option selected="{{ $orientador->estado }}">{{ $orientador->estado }}</option>
                                                            <option value="Acre">Acre</option>
                                                            <option value="Alagoas">Alagoas</option>
                                                            <option value="Amapá">Amapá</option>
                                                            <option value="Amazonas">Amazonas</option>
                                                            <option value="Bahia">Bahia</option>
                                                            <option value="Ceará">Ceará</option>
                                                            <option value="Distrito Federal">Distrito Federal</option>
                                                            <option value="Espírito Santo">Espírito Santo</option>
                                                            <option value="Goiás">Goiás</option>
                                                            <option value="Maranhão">Maranhão</option>
                                                            <option value="Mato Grosso">Mato Grosso</option>
                                                            <option value="Mato Grosso do Sul">Mato Grosso do Sul</option>
                                                            <option value="Minas Gerais">Minas Gerais</option>
                                                            <option value="Pará">Pará</option>
                                                            <option value="Paraíba">Paraíba</option>
                                                            <option value="Paraná">Paraná</option>
                                                            <option value="Pernambuco">Pernambuco</option>
                                                            <option value="Piauí">Piauí</option>
                                                            <option value="Rio de Janeiro">Rio de Janeiro</option>
                                                            <option value="Rio Grande do Norte">Rio Grande do Norte</option>
                                                            <option value="Rio Grande do Sul">Rio Grande do Sul</option>
                                                            <option value="Rondônia">Rondônia</option>
                                                            <option value="Roraima">Roraima</option>
                                                            <option value="Santa Catarina">Santa Catarina</option>
                                                            <option value="São Paulo">São Paulo</option>
                                                            <option value="Sergipe">Sergipe</option>
                                                            <option value="Tocantins">Tocantins</option>
                                                        </select>
                                                        <span class="fa fa-graduation-cap form-control-feedback left" aria-hidden="true"></span>
                                                    </div>
                                                    <div class="col-md-6 col-sm-6 col-xs-12 form-group has-feedback">
                                                        <input type="text" value="{{ $orientador->cidade }}"
                                                            class="form-control has-feedback-left" placeholder="Cidade:"
                                                            name="cidade">
                                                        <span class="fa fa-user form-control-feedback left"
                                                            aria-hidden="true"></span>
                                                    </div>
                                                    <div class="col-md-6 col-sm-6 col-xs-12 form-group has-feedback">
                                                        <input type="text" value="{{ $orientador->numero }}"
                                                            class="form-control has-feedback-left" placeholder="Número:"
                                                            name="numero">
                                                        <span class="fa fa-user form-control-feedback left"
                                                            aria-hidden="true"></span>
                                                    </div>
                                                    <div class="col-md-6 col-sm-6 col-xs-12 form-group has-feedback">
                                                        <input type="text" value="{{ $orientador->rua }}"
                                                            class="form-control has-feedback-left" placeholder="Endereço:"
                                                            name="rua">
                                                        <span class="fa fa-user form-control-feedback left"
                                                            aria-hidden="true"></span>
                                                    </div>
                                                    <div class="col-md-6 col-sm-6 col-xs-12 form-group has-feedback">
                                                        <input type="text" value="{{ $orientador->cep }}"
                                                            class="form-control has-feedback-left cep" placeholder="Cep:"
                                                            name="cep">
                                                        <span class="fa fa-user form-control-feedback left"
                                                            aria-hidden="true"></span>
                                                    </div>
                                                    <div class="col-md-6 col-sm-6 col-xs-12 form-group has-feedback">
                                                        <input type="text" value="{{ $orientador->complemento }}"
                                                            class="form-control has-feedback-left" placeholder="Complemento:"
                                                            name="complemento">
                                                        <span class="fa fa-user form-control-feedback left"
                                                            aria-hidden="true"></span>
                                                    </div>
                                                    <div class="col-md-6 col-sm-6 col-xs-12 form-group has-feedback">
                                                        <input type="text" value="{{ $orientador->bairro }}"
                                                            class="form-control has-feedback-left" placeholder="Bairro:"
                                                            name="bairro">
                                                        <span class="fa fa-user form-control-feedback left"
                                                            aria-hidden="true"></span>
                                                    </div>
                                                    <div class="col-md-6 col-sm-6 col-xs-12 form-group has-feedback">
                                                        <input type="text" value="{{ $orientador->telefone }}"
                                                            class="form-control has-feedback-left" placeholder="Telefone:"
                                                            name="telefone">
                                                        <span class="fa fa-user form-control-feedback left"
                                                            aria-hidden="true"></span>
                                                    </div>
                                                    <div class="col-md-6 col-sm-6 col-xs-12 form-group has-feedback">
                                                        <input type="text" value="{{ $orientador->celular }}"
                                                            class="form-control has-feedback-left" placeholder="Celular:"
                                                            name="celular">
                                                        <span class="fa fa-user form-control-feedback left"
                                                            aria-hidden="true"></span>
                                                    </div>
                                                    <div class="col-md-6 col-sm-6 col-xs-12 form-group has-feedback">
                                                        <input type="text" value="{{ $orientador->email }}"
                                                            class="form-control has-feedback-left" placeholder="Email:"
                                                            name="email">
                                                        <span class="fa fa-user form-control-feedback left"
                                                            aria-hidden="true"></span>
                                                    </div>
                                                    <div class="col-md-6 col-sm-6 col-xs-12 form-group has-feedback">
                                                        <input type="text" value="{{ $orientador->cargo }}"
                                                            class="form-control has-feedback-left" placeholder="Cargo:"
                                                            name="cargo">
                                                        <span class="fa fa-user form-control-feedback left"
                                                            aria-hidden="true"></span>
                                                    </div>
                                                    <div class="col-md-6 col-sm-6 col-xs-12 form-group has-feedback">
                                                        <input type="text" value="{{ $orientador->formacao }}"
                                                            class="form-control has-feedback-left" placeholder="Formação:"
                                                            name="formacao">
                                                        <span class="fa fa-user form-control-feedback left"
                                                            aria-hidden="true"></span>
                                                    </div>
                                                    <div class="col-md-6 col-sm-6 col-xs-12 form-group has-feedback">
                                                                 <input type="text" value="{{ $orientador->instituicao->nome_instituicao }}"
                                                             class="form-control has-feedback-left" readonly>
                                                             <span class="fa fa-graduation-cap form-control-feedback left"
                                                            aria-hidden="true"></span>
                                                            <input type="hidden" name="instituicao_id" value="{{ $orientador->instituicao->id }}">
                                                    </div>
                                                </div>
                                            </div>
                                            <div style="margin-left:85px;">
                                           <button type="submit" class="btn btn-success" style="margin-top:20px!important; margin-left:130px!important;">Salvar Alterações</button>
                                            <a href="/orientador" class="btn btn-danger" style="margin-top:20px!important;">Voltar</a>
                                        </div>
                                    </div>

                                </div>
                        </div>
                    </div>
                </div>
                </form>
            </div>
        </div>
    </div>
</div>
</div>
</div>
<!-- /page content -->

<!-- footer content -->
@include('layout.footer')
<!-- /footer content -->
</div>
</div>
@endsection
