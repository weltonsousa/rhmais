@extends('layout/app')
@section('titulo','Beneficios - Editar - TCE | RH MAIS')
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
                    @include('layout.alerta.flash-message')
                    <div class="x_panel">
                        <div class="x_title">
                            <h2>Beneficios - Editar</h2>
                            <div class="clearfix"></div>
                        </div>
                        <div class="x_content">
                        <form action="{{route('beneficio.update', $beneficios->id_beneficio)}}" method="POST">
                          @csrf
                             @method('PUT')
                            <div>
                                <div>
                                    <div>
                                        <div id="form-step-0" role="form" data-toggle="validator">
                                            <div class="row" style="width:960px; margin: 20px auto;">
                                                <div class="col-md-6 col-sm-6 col-xs-12 form-group has-feedback">
                                                    <label for="">Nome do Benefício</label>
                                                    <input type="text" value="{{$beneficios->nome_beneficio}}"
                                                        class="form-control has-feedback-left"
                                                        placeholder="Nome do Benefício:" name="nome">
                                                    <span class="fa fa-user form-control-feedback left"
                                                        aria-hidden="true"></span>
                                                </div>
                                                <div class="col-md-6 col-sm-6 col-xs-12 form-group has-feedback">
                                                    <label for="">Sigla do Benefício</label>
                                                    <input type="text" value="{{$beneficios->sigla}}"
                                                        class="form-control has-feedback-left"
                                                        placeholder="Sigla do Benefício:" name="sigla">
                                                    <span class="fa fa-user form-control-feedback left"
                                                        aria-hidden="true"></span>
                                                </div>
                                                <div class="col-md-6 col-sm-6 col-xs-12 form-group has-feedback">
                                                <label for="">Selecione o Tipo</label>
                                                    <select class="form-control has-feedback-left" name="tipo">
                                                        <option value="1">Crédito</option>
                                                        <option value="2">Débito</option>
                                                    </select>
                                                    <span class="fa fa-list form-control-feedback left"
                                                        aria-hidden="true"></span>
                                                </div>
                                            </div>
                                        </div>
                                        <div style="margin-left:85px;">
                                       <button type="submit" class="btn btn-success" style="margin-top:20px!important; margin-left:130px!important;">Salvar Alterações</button>
                                       <a href="/beneficio" class="btn btn-danger" style="margin-top:20px!important;">Voltar</a>
                                    </div>
                                </div>
                               </form>
                            </div>
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
