@extends('layout/app')
@section('titulo','Horários de Estágio - Trabalho - Editar - TCE | RH MAIS')
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
                            <h2>Horários de Estágio - Trabalho - Editar</h2>
                            <div class="clearfix"></div>
                        </div>
                        <div class="x_content">
                            <form action="{{ route('horario.update',  $horarios->id_horario) }}" id="myForm" role="form" data-toggle="validator" method="post" accept-charset="utf-8">
                                @csrf
                                @method("PUT")
                                <!-- SmartWizard html -->
                                <div>
                                    <div>
                                        <div>
                                            <div id="form-step-0" role="form" data-toggle="validator">
                                                <div class="row" style="width:960px; margin: 20px auto;">
                                                    <div class="col-md-6 col-sm-6 col-xs-12 form-group has-feedback">
                                                        <label for="">Descrição do Horário</label>
                                                        <input type="text" value="{{$horarios->descricao}}"
                                                            class="form-control has-feedback-left"
                                                            placeholder="Descrição do Horário" name="descricao">
                                                        <span class="fa fa-user form-control-feedback left"
                                                            aria-hidden="true"></span>
                                                    </div>
                                                    <div class="col-md-6 col-sm-6 col-xs-12 form-group has-feedback">
                                                        <label for="">Quantidade Horas</label>
                                                        <input type="text" value="{{$horarios->qtd_horas}}"
                                                            class="form-control has-feedback-left"
                                                            placeholder="Quantidade Horas" name="qtd_horas">
                                                        <span class="fa fa-user form-control-feedback left"
                                                            aria-hidden="true"></span>
                                                    </div>
                                                    <div class="col-md-6 col-sm-6 col-xs-12 form-group has-feedback">
                                                        <label for="">Unidade</label>
                                                        <input type="text" value="{{ $horarios->empresa->nome_fantasia }}"
                                                            class="form-control has-feedback-left" readonly>
                                                            <input type="hidden" name="empresa_id" value="{{ $horarios->empresa->id_empresa }}">
                                                        <span class="fa fa-home form-control-feedback left"
                                                            aria-hidden="true"></span>
                                                    </div>
                                                </div>
                                            </div>
                                            <div style="margin-left:85px;">
                                            <button type="submit" class="btn btn-success" style="margin-top:20px!important; margin-left:130px!important;">Salvar Alterações</button>
                                            <a href="/horario" class="btn btn-danger" style="margin-top:20px!important;">Voltar</a>
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
