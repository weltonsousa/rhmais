@extends('layout/app')
@section('titulo','Editar | RH MAIS')
@section('conteudo')
<div class="container body">
    <div class="main_container">
        <div class="col-md-3 left_col">
            <div class="left_col scroll-view">
                @include('layout.menu.menu')
                <br />
                @include('layout.menu.sidebar')
            </div>
        </div>
        @include('layout.menu.menutop')
        <!-- page content -->
        <div class="right_col" role="main">
            <div class="">
                <div class="clearfix"></div>
                <div class="row">
                    <div class="col-md-12 col-sm-12 col-xs-12">
                        @include('layout.alerta.flash-message')
                        <div class="x_panel">
                            <div class="x_title">
                                <h2>Editar Dados RHMAIS</h2>
                                <div class="clearfix"></div>
                            </div>
                            <div class="x_content">
                              <!-- SmartWizard html -->
                    <div class="x_content">
                          @foreach ($dados as $dado)
                    <form action="{{ route('rhmais.update',  $dado->id_rhmais) }}" method="post">
                        @csrf
                                <!-- SmartWizard html -->
                                <div>
                                    <div>
                                        <div>
                                            <div id="form-step-0" role="form" data-toggle="validator">
                                                <div class="row" style="width:960px; margin: 20px auto;">
                                                    <div class="col-md-6 col-sm-6 col-xs-12 form-group has-feedback">
                                                      <label for="Razão Social">Razão Social</label>
                                                        <input type="text" class="form-control has-feedback-left"
                                                    placeholder="Razão Social" name="razao_social" value="{{$dado->razao_social}}">
                                                      <input type="hidden" name="id_rhmais" value="{{$dado->id_rhmais}}">
                                                        <span class="fa fa-user form-control-feedback left"
                                                            aria-hidden="true"></span>
                                                    </div>
                                                    <div class="col-md-6 col-sm-6 col-xs-12 form-group has-feedback">
                                                      <label for="CNPJ">CNPJ</label>
                                                        <input type="text" class="form-control has-feedback-left cnpj"
                                                            placeholder="CNPJ" name="cnpj" value="{{$dado->cnpj}}">
                                                        <span class="fa fa-newspaper-o form-control-feedback left"
                                                            aria-hidden="true"></span>
                                                    </div>
                                                    <div class="col-md-6 col-sm-6 col-xs-12 form-group has-feedback">
                                                      <label for="Estado">Estado</label>
                                                        <input type="text" class="form-control has-feedback-left"
                                                            placeholder="Estado" name="estado" value="{{$dado->estado}}">
                                                        <span class="fa fa-map-marker form-control-feedback left"
                                                            aria-hidden="true"></span>
                                                    </div>
                                                     <div class="col-md-6 col-sm-6 col-xs-12 form-group has-feedback">
                                                      <label for="Cidade">Cidade</label>
                                                        <input type="text" class="form-control has-feedback-left"
                                                            placeholder="Cidade" name="cidade" value="{{$dado->cidade}}">
                                                        <span class="fa fa-map-marker form-control-feedback left"
                                                            aria-hidden="true"></span>
                                                    </div>
                                                    <div class="col-md-6 col-sm-6 col-xs-12 form-group has-feedback">
                                                      <label for="Número">Número</label>
                                                        <input type="text" class="form-control has-feedback-left"
                                                            placeholder="Numero" name="numero" value="{{$dado->numero}}">
                                                        <span class="fa fa-map-marker form-control-feedback left"
                                                            aria-hidden="true"></span>
                                                    </div>
                                                    <div class="col-md-6 col-sm-6 col-xs-12 form-group has-feedback">
                                                      <label for="Endereço">Endereço</label>
                                                        <input type="text" class="form-control has-feedback-left"
                                                            placeholder="Endereco" name="endereco" value="{{$dado->endereco}}">
                                                        <span class="fa fa-map-marker form-control-feedback left"
                                                            aria-hidden="true"></span>
                                                    </div>
                                                    <div class="col-md-6 col-sm-6 col-xs-12 form-group has-feedback">
                                                      <label for="CEP">CEP</label>
                                                        <input type="text" class="form-control has-feedback-left cep"
                                                            placeholder="CEP" name="cep" value="{{$dado->cep}}">
                                                        <span class="fa fa-map-marker form-control-feedback left"
                                                            aria-hidden="true"></span>
                                                    </div>
                                                    <div class="col-md-6 col-sm-6 col-xs-12 form-group has-feedback">
                                                      <label for="Complemento">Complemento</label>
                                                        <input type="text" class="form-control has-feedback-left"
                                                            placeholder="Complemento" name="complemento" value="{{$dado->complemento}}">
                                                        <span class="fa fa-map-marker form-control-feedback left"
                                                            aria-hidden="true"></span>
                                                    </div>
                                                    <div class="col-md-6 col-sm-6 col-xs-12 form-group has-feedback">
                                                      <label for="Bairro">Bairro</label>
                                                        <input type="text" class="form-control has-feedback-left"
                                                            placeholder="Bairro" name="bairro" value="{{$dado->bairro}}">
                                                        <span class="fa fa-map-marker form-control-feedback left"
                                                            aria-hidden="true"></span>
                                                    </div>
                                                    <div class="col-md-6 col-sm-6 col-xs-12 form-group has-feedback">
                                                      <label for="Telefone">Telefone</label>
                                                        <input type="text" class="form-control has-feedback-left telefone"
                                                            placeholder="Telefone" name="telefone" value="{{$dado->telefone}}">
                                                        <span class="fa fa-phone form-control-feedback left"
                                                            aria-hidden="true"></span>
                                                    </div>
                                                    <div class="col-md-6 col-sm-6 col-xs-12 form-group has-feedback">
                                                      <label for="Email">Email</label>
                                                        <input type="text" class="form-control has-feedback-left"
                                                            placeholder="Email" name="email" value="{{$dado->email}}">
                                                        <span class="fa fa-envelope form-control-feedback left"
                                                            aria-hidden="true"></span>
                                                    </div>
                                                    <div class="col-md-6 col-sm-6 col-xs-12 form-group has-feedback">
                                                      <label for="Representante">Representante</label>
                                                        <input type="text" class="form-control has-feedback-left"
                                                            placeholder="Representante" name="representante" value="{{$dado->representante}}">
                                                        <span class="fa fa-user form-control-feedback left"
                                                            aria-hidden="true"></span>
                                                    </div>
                                                </div>
                                                <div class="btn-group mr-2 sw-btn-group-extra" role="group">
                                                    <button type="submit" class="btn btn-info" onclick="return confirm('Tem certeza que deseja alterar?')">Enviar</button>
                                                    <a href="/" class="btn btn-danger">Cancelar</a>
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
        @endforeach
        <!-- /page content -->
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
