@extends('layout/app')
@section('titulo', 'Atividade - Cadastro - TCE | RH MAIS')
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
                                <h2>Atividade - Cadastro</h2>
                                <div class="clearfix"></div>
                            </div>
                            <div class="x_content">
                                <form action="{{ route('atividade.store') }}" method="post">
                                    @csrf
                                    <!-- SmartWizard html -->
                                    <div>
                                        <div>
                                            <div>
                                                <div id="form-step-0" role="form" data-toggle="validator">
                                                    <div class="row" style="width:960px; margin: 20px auto;">
                                                        <div class="col-md-6 col-sm-6 col-xs-12 form-group has-feedback">
                                                            <label for="">Nome da atividade</label>
                                                            <input type="text" class="form-control has-feedback-left"
                                                                placeholder="Nome da Atividade" name="nome" required>
                                                            <span class="fa fa-user form-control-feedback left"
                                                                aria-hidden="true"></span>
                                                        </div>
                                                        <div class="col-md-6 col-sm-6 col-xs-12 form-group has-feedback">
                                                            <label for="">Unidade</label>
                                                            <select class="form-control has-feedback-left"
                                                                name="empresa_id">
                                                                <option>Selecione Unidade Concedente</option>
                                                                @foreach ($empresas as $empresa)
                                                                    <option value="{{ $empresa->id }}">
                                                                        {{ $empresa->nome_fantasia }}
                                                                    </option>
                                                                @endforeach
                                                            </select>
                                                            <span class="fa fa-home form-control-feedback left"
                                                                aria-hidden="true"></span>
                                                        </div>
                                                    </div>
                                                    <div class="btn-group mr-2 sw-btn-group-extra" role="group">
                                                        <button type="submit" class="btn btn-info">Enviar</button>
                                                        <a href="/atividade" class="btn btn-danger">Cancelar</a>
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
