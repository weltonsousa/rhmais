@extends('layout/app')
@section('titulo','Gerar Termo de Conclusão / Rescisão do TCE - Agente de integração (GTR-AI)')
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
                            <h2>Gerar Termo de Conclusão / Rescisão do TCE - Agente de integração (GTR-AI) </h2>
                            <div class="clearfix"></div>
                        </div>
                        <div class="x_content">
                            <form action="{{ route('tce_rescisao.store') }}" method="post">
                                @csrf

                                <!-- SmartWizard html -->
                                <div>
                                    <div>
                                        <div>
                                            @foreach ($tceContrato as $tce)
                                            <div id="form-step-0" role="form" data-toggle="validator">
                                                <div class="row" style="width:960px; margin: 20px auto;">
                                                    <div class="col-md-6 col-sm-6 col-xs-12 form-group has-feedback">
                                                        <input type="text" value="{{$tce->nome}}"
                                                            class="form-control has-feedback-left"
                                                            placeholder="Estágiario">
                                                        <input type="hidden"  name="estagiario_id" value="{{$tce->estagiario_id}}">
                                                        <span class="fa fa-user form-control-feedback left"
                                                            aria-hidden="true"></span>
                                                    </div>
                                                    <div class="col-md-6 col-sm-6 col-xs-12 form-group has-feedback">
                                                        <input type="text" value="{{$tce->nome_instituicao}}"
                                                            class="form-control has-feedback-left"
                                                            placeholder="Instituição de Ensino">
                                                            <input type="hidden"  name="instituicao_id" value="{{$tce->instituicao_id}}">
                                                        <span class="fa fa-home form-control-feedback left"
                                                            aria-hidden="true"></span>
                                                    </div>
                                                    <div class="col-md-6 col-sm-6 col-xs-12 form-group has-feedback">
                                                        <input type="text" value="{{$tce->nome_fantasia}}" class="form-control has-feedback-left"
                                                            placeholder="Unidade Concedente">
                                                            <input type="hidden"  name="empresa_id" value="{{$tce->empresa_id}}">
                                                        <span class="fa fa-home form-control-feedback left"
                                                            aria-hidden="true"></span>
                                                    </div>
                                                    <div class="col-md-6 col-sm-6 col-xs-12 form-group has-feedback">
                                                        <input type="text" value="{{$tce->bolsa}}"
                                                            class="form-control has-feedback-left"
                                                            placeholder="Valor Bolsa-Auxilio" name="bolsa">
                                                        <span class="fa fa-money form-control-feedback left"
                                                            aria-hidden="true"></span>
                                                    </div>
                                                    <div class="col-md-4 col-sm-4 col-xs-12 form-group has-feedback">
                                                        <input type="text"  value="{{ date('d/m/Y', strtotime($tce->data_doc))}}"
                                                            class="form-control has-feedback-left"
                                                            placeholder="Data TCE" name="data_contrato">
                                                        <span class="fa fa-calendar form-control-feedback left"
                                                            aria-hidden="true"></span>
                                                    </div>
                                                    <div class="col-md-4 col-sm-4 col-xs-12 form-group has-feedback">
                                                        <input type="text"  value="{{date('d/m/Y', strtotime($tce->data_inicio))}}"
                                                            class="form-control has-feedback-left"
                                                            placeholder="Data Inicio" name="data_inicio">
                                                        <span class="fa fa-calendar form-control-feedback left"
                                                            aria-hidden="true"></span>
                                                    </div>
                                                    <div class="col-md-4 col-sm-4 col-xs-12 form-group has-feedback">
                                                        <input type="text"  value="{{date('d/m/Y', strtotime($tce->data_fim))}}"
                                                            class="form-control has-feedback-left" placeholder="Data Fim" name="data_fim">
                                                        <span class="fa fa-calendar form-control-feedback left" aria-hidden="true"></span>
                                                    </div>
                                                    <div class="col-md-6 col-sm-6 col-xs-12 form-group has-feedback">
                                                        @foreach ($horarios as $hora)
                                                            @if ($tce->horario_id == $hora->id_horario)
                                                                <input type="text" value="{{$hora->descricao}}" class="form-control has-feedback-left"
                                                            placeholder="Horário Estágio">
                                                    <input type="hidden" name="horario_id" value="{{$hora->id_horario}}">
                                                            @endif
                                                        @endforeach
                                                        <span class="fa fa-clock-o form-control-feedback left"
                                                            aria-hidden="true"></span>
                                                    </div>
                                                    <div class="col-md-6 col-sm-6 col-xs-12 form-group has-feedback">
                                                           @foreach ($apolices as $apolice)
                                                            @if ($tce->apolice_id == $apolice->id_seguradora)
                                                        <input type="text" value="{{$apolice->nome_seguradora}}"  class="form-control has-feedback-left"
                                                            placeholder="Apolice / Seguradora" >
                                                            <input type="hidden" name="apolice_id" value="{{$apolice->id_seguradora}}">
                                                            @endif
                                                            @endforeach
                                                        <span class="fa fa-bars form-control-feedback left"
                                                            aria-hidden="true"></span>
                                                    </div>
                                                    <div class="col-md-6 col-sm-6 col-xs-12 form-group has-feedback">
                                                        <label for="">Beneficio</label>
                                                            @foreach ($beneficios as $ben)
                                                                @if ($tce->beneficio_id == $ben->id_beneficio)
                                                    <textarea class="form-control" placeholder="Beneficio">{{$ben->nome_beneficio}}</textarea>
                                                        <input type="hidden" name="beneficio_id" value="{{$ben->id_beneficio}}">
                                                        @endif
                                                        @endforeach
                                                    </div>
                                                    <div class="col-md-6 col-sm-6 col-xs-12 form-group has-feedback">
                                                        <label for="">Atividade </label>
                                                           @foreach ($atividades as $ativ)
                                                                @if ($tce->atividade_id == $ativ->id_atividade)
                                                            <textarea class="form-control" placeholder="Atividade">{{$ativ->nome_atividade}}</textarea>
                                                            <input type="hidden" name="atividade_id" value="{{$ativ->id_atividade}}">
                                                            @endif
                                                        @endforeach
                                                    </div>
                                                      <div class="col-md-6 col-sm-6 col-xs-12 form-group has-feedback">
                                                          <label for="">Supervisor</label>
                                                           @foreach ($supervisor as $sup)
                                                                @if ($tce->supervisor_id == $sup->id_supervisor)
                                                           <input type="text" value="{{$sup->nome_supervisor}}" class="form-control has-feedback-left"
                                                            placeholder="Supervisor">
                                                      <input type="hidden" name="supervisor_id" value="{{$sup->id_supervisor}}">
                                                        <span class="fa fa-user form-control-feedback left" aria-hidden="true"></span>
                                                                  @endif
                                                            @endforeach
                                                     </div>
                                                    <div class="col-md-6 col-sm-6 col-xs-12 form-group has-feedback">
                                                        <label for=""> Motivo </label>
                                                        <select class="form-control has-feedback-left" name="motivo_id">
                                                              @foreach ($motivos as $motivo)
                                                            <option value="{{ $motivo->id_motivo }}">{{ $motivo->nome_motivo }}</option>
                                                                @endforeach
                                                        </select>
                                                        <span class="fa fa-bars form-control-feedback left"
                                                            aria-hidden="true"></span>
                                                    </div>
                                                    <div class="col-md-6 col-sm-6 col-xs-12 form-group has-feedback">
                                                        <label for=""> Último Dia </label>
                                                        <input type="text" class="form-control has-feedback-left data"  placeholder="Último Dia" name="ultimo_dia" required>
                                                        <span class="fa fa-calendar form-control-feedback left"
                                                            aria-hidden="true"></span>
                                                    </div>
                                                    <div class="col-md-6 col-sm-6 col-xs-12 form-group has-feedback">
                                                        <label for=""> Data Documento </label>
                                                        <input type="text" class="form-control has-feedback-left data"
                                                            placeholder="Data Documento" name="data_doc" required>
                                                        <span class="fa fa-calendar form-control-feedback left"
                                                            aria-hidden="true"></span>
                                                    </div>
                                                    <div class="col-md-12 col-sm-12 col-xs-12 form-group has-feedback">
                                                        <label for="">Observação </label>
                                                        <textarea class="form-control" placeholder="Observação" name="obs"></textarea>
                                                    </div>
                                                </div>
                                                <div class="btn-group mr-2 sw-btn-group-extra" role="group">
                                                    <button type="submit" class="btn btn-info">Enviar</button>
                                                    <a href="/tce_contrato" class="btn btn-danger">Cancelar</a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                            </form>
                            @endforeach
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
