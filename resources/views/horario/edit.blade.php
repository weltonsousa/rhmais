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
                    <form action="{{ route('horario.update',  $horarios->id) }}" id="myForm" role="form" data-toggle="validator" method="post" accept-charset="utf-8">
                   <input type="hidden" name="_method" value="PUT">
                  <input type="hidden" name="_token" value="{{ csrf_token() }}">
                      <!-- SmartWizard html -->
                      <div>
                          <div>
                              <div>
                                    <div id="form-step-0" role="form" data-toggle="validator">
                                      <div class="row" style="width:960px; margin: 20px auto;">
                                          <div class="col-md-6 col-sm-6 col-xs-12 form-group has-feedback">
                                              <input type="text" value="{{$horarios->descricao}}" class="form-control has-feedback-left" placeholder="Descrição do Horário:" name="descricao">
                                              <span class="fa fa-user form-control-feedback left" aria-hidden="true"></span>
                                            </div>
                                          <div class="col-md-6 col-sm-6 col-xs-12 form-group has-feedback">
                                              <input type="text"  value="{{$horarios->qtd_horas}}" class="form-control has-feedback-left" placeholder="Quantidade Horas:" name="qtd_horas">
                                              <span class="fa fa-user form-control-feedback left" aria-hidden="true"></span>
                                            </div>
                                             <div class="col-md-6 col-sm-6 col-xs-12 form-group has-feedback">
                                                <select class="form-control has-feedback-left" name="empresa_id">
                                                    <option>Selecione Unidade Concedente:</option>
                                                        <option value=""></option>

                                                </select>
                                                <span class="fa fa-home form-control-feedback left" aria-hidden="true"></span>
                                            </div>
                                          <div class="col-md-6 col-sm-6 col-xs-12 form-group has-feedback">
                                                <input type="text"  value="{{$horarios->agente_integracao}}" class="form-control has-feedback-left" value="RH Mais" readonly placeholder="Agente de Integração" name="agente_integracao">
                                                <span class="fa fa-home form-control-feedback left" aria-hidden="true"></span>
                                            </div>
                                      </div>
                                    {{-- <div class="btn-group mr-2 sw-btn-group-extra" role="group">
                                      <button type="submit" class="btn btn-info">Enviar</button>
                                      <button class="btn btn-danger">Cancelar</button>
                                    </div> --}}
                              </div>
                                <button  type="submit"class="btn btn-success" style="margin: 20px auto; display:block;">Salvar Alterações</button>
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