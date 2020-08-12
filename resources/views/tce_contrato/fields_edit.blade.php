@extends('layout/app')
@section('titulo','AGENTE DE INTEGRAÇÃO - Editar Contrato Ativo - TCE | RH MAIS')
@section('conteudo')
<div class="container body">
    <div class="main_container">
        <div class="col-md-3 left_col">
            <div class="left_col scroll-view">
                @include('layout.menu.menu')
                <!-- /menu profile quick info -->
                 <script src="{{asset('vendors/jquery/dist/jquery.min.js')}}"></script>

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
                            <h2>AGENTE DE INTEGRAÇÃO - Editar Contrato Ativo - TCE</h2>
                            <div class="clearfix"></div>
                        </div>
                            @foreach ($tceContrato as  $tce )
                        <div class="x_content">
                            <form action="{{ route('tce_contrato.update', $tce->id) }}" method="post">
                                @csrf
                                @method("PUT")

                                <!-- SmartWizard html -->
                                <div>
                                    <div>
                                        <div>
                                            <div id="form-step-0" role="form" data-toggle="validator">
                                                <div class="row" style="width:960px; margin: 20px auto;">
                                                    <div class="col-md-6 col-sm-6 col-xs-12 form-group has-feedback">
                                                    <label for="">Estagiário</label>
                                                    <input type="hidden" id="estagiario_id" name="estagiario_id" value="{{ $tce->estagiario_id}}">
                                                    <input type="text" value="{{ $tce->nome }}"
                                                        class="form-control has-feedback-left" placeholder="Nome Estagiario"
                                                        name="estagiario" readonly>
                                                    <span class="fa fa-user form-control-feedback left" aria-hidden="true"></span>
                                                </div>
                                                    <div class="col-md-6 col-sm-6 col-xs-12 form-group has-feedback">
                                                    <label for="">Unidade Concedente</label>
                                                        <input type="hidden" id="empresa_id" name="empresa_id" value="{{ $tce->empresa_id}}">
                                                         <input type="text" value="{{ $tce->nome_fantasia }}"
                                                        class="form-control has-feedback-left" placeholder="Nome Empresa"
                                                        name="estagiario" readonly>
                                                        <span class="fa fa-home form-control-feedback left"
                                                            aria-hidden="true"></span>
                                                    </div>
                                                    <div class="col-md-6 col-sm-6 col-xs-12 form-group has-feedback">
                                                    <label for="">Instituicao de Ensino</label>
                                                        <input type="hidden" id="instituicao_id" name="instituicao_id" value="{{ $tce->instituicao_id}}">
                                                         <input type="text" value="{{ $tce->nome_instituicao }}"
                                                        class="form-control has-feedback-left" placeholder="Nome Instituição"
                                                        name="estagiario" readonly>
                                                        <span class="fa fa-graduation-cap form-control-feedback left"
                                                            aria-hidden="true"></span>
                                                    </div>
                                                       <div class="col-md-6 col-sm-6 col-xs-12 form-group has-feedback">
                                                           <label for="">Valor Bolsa</label>
                                                        <input type="text" class="form-control has-feedback-left dinheiro"
                                                       placeholder="Valor Bolsa-Auxílio:" name="bolsa" value="{{$tce->bolsa}}">
                                                        <span class="fa fa-money form-control-feedback left"
                                                            aria-hidden="true"></span>
                                                    </div>
                                                    <div class="col-md-4 col-sm-6 col-xs-12 form-group has-feedback">
                                                        <label for="">Data do Cadastro</label>
                                                        <input type="text" class="form-control has-feedback-left data"
                                                    placeholder="Data Documento" name="data_doc" value="{{ date('d/m/Y', strtotime($tce->data_doc))}}">
                                                        <span class="fa fa-calendar form-control-feedback left"
                                                            aria-hidden="true"></span>
                                                    </div>
                                                    <div class="col-md-4 col-sm-6 col-xs-12 form-group has-feedback">
                                                        <label for=""> Data Início</label>
                                                        <input type="text" class="form-control has-feedback-left data"
                                                            placeholder="Data Início:" name="data_inicio" value="{{ date('d/m/Y', strtotime($tce->data_inicio))}}">
                                                        <span class="fa fa-calendar form-control-feedback left"
                                                            aria-hidden="true"></span>
                                                    </div>
                                                    <div class="col-md-4 col-sm-6 col-xs-12 form-group has-feedback">
                                                        <label for=""> Data Fim</label>
                                                        <input type="text" class="form-control has-feedback-left data"
                                                            placeholder="Data Fim:" name="data_fim" value="{{ date('d/m/Y', strtotime($tce->data_inicio))}}">
                                                        <span class="fa fa-calendar form-control-feedback left"
                                                            aria-hidden="true"></span>
                                                    </div>
                                                    <div class="col-md-6 col-sm-6 col-xs-12 form-group has-feedback">
                                                          <label for="">Seguro</label>
                                                     <input type="hidden"  name="apolice_id" value="{{ $seguros->id}}">
                                                    <input type="text" value="{{ $seguros->nome }}"
                                                        class="form-control has-feedback-left" placeholder="Seguro" readonly>
                                                        <span class="fa fa-user form-control-feedback left"
                                                            aria-hidden="true"></span>
                                                    </div>
                                                    <div class="col-md-6 col-sm-6 col-xs-12 form-group has-feedback">
                                                       <label for="">Benefício</label>
                                                       <select  class="form-control has-feedback-left" name="beneficio_id" id="beneficio">
                                                           <option value="{{ $beneficios->id}}">{{ $beneficios->nome }}</option>
                                                       </select>
                                                    <span class="fa fa-user form-control-feedback left"
                                                            aria-hidden="true"></span>
                                                    </div>
                                                    <div class="col-md-6 col-sm-6 col-xs-12 form-group has-feedback">
                                                          <label for="">Horario</label>
                                                          <select class="form-control has-feedback-left" name="horario_id" id="horario">
                                                              <option value="{{ $horarios->id}}">{{ $horarios->descricao }}</option>
                                                          </select>
                                                    <span class="fa fa-user form-control-feedback left"
                                                            aria-hidden="true"></span>
                                                    </div>

                                                    <div class="col-md-6 col-sm-6 col-xs-12 form-group has-feedback">
                                                          <label for="">Setor</label>
                                                          <select class="form-control has-feedback-left" name="setor_id" id="setor">
                                                              <option value="{{ $setores->id}}">{{ $setores->nome }}</option>
                                                          </select>
                                                    <span class="fa fa-user form-control-feedback left"
                                                            aria-hidden="true"></span>
                                                    </div>
                                                    <div class="col-md-6 col-sm-6 col-xs-12 form-group has-feedback">
                                                          <label for="">Atividade</label>
                                                          <select class="form-control has-feedback-left" name="atividade_id" id="atividade">
                                                              <option value="{{ $atividades->id}}">{{ $atividades->nome }}</option>
                                                          </select>
                                                    <span class="fa fa-user form-control-feedback left"
                                                            aria-hidden="true"></span>
                                                    </div>
                                                    <div class="col-md-6 col-sm-6 col-xs-12 form-group has-feedback">
                                                          <label for="">Orientador</label>
                                                          <select class="form-control has-feedback-left" name="orientador_id" id="orientador">
                                                              <option value="{{ $orientadores->id}}">{{ $orientadores->nome }}</option>
                                                          </select>
                                                    <span class="fa fa-user form-control-feedback left"
                                                            aria-hidden="true"></span>
                                                    </div>
                                                    <div class="col-md-6 col-sm-6 col-xs-12 form-group has-feedback">
                                                     <label for="">Supervisor</label>
                                                     <select class="form-control has-feedback-left" name="supervisor_id" id="supervisor">
                                                         <option value="{{ $supervisor->id}}">{{ $supervisor->nome }}</option>
                                                     </select>
                                                        <span class="fa fa-user form-control-feedback left"
                                                            aria-hidden="true"></span>
                                                    </div>
                                                    <div class="col-md-12 col-sm-6 col-xs-12 form-group has-feedback">
                                                        <div class="checkbox">
                                                            <label>Tipo de Estágio: </label>
                                                            <label>
                                                                <input type="radio" class="flat" checked="checked"
                                                                    name="obrigatorio" value="1"> Não
                                                                Obrigatório
                                                            </label>
                                                            <label>
                                                                <input type="radio" class="flat" name="obrigatorio"
                                                                    value="2"> Obrigatório
                                                            </label>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-12 col-sm-12 col-xs-12 form-group has-feedback">
                                                        <textarea class="form-control" placeholder="Observações"
                                                            name="obs"></textarea>
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
<script type="text/javascript">
    $(document).ready(function() {
        $('#beneficio').one('click', function() {
                $.ajax({
                    url: '/beneficio-ajax',
                    type: "GET",
                    dataType: "json",
                    success:function(data) {
                        $.each(data, function(key, value) {
                            $('select[name="beneficio_id"]').append('<option value="'+ key +'">'+ value +'</option>');
                        });
                    }
                });
            //    $('#beneficio').off('click');
        });
        $('#setor').one('click', function() {
                $.ajax({
                    url: '/setor-ajax',
                    type: "GET",
                    dataType: "json",
                    success:function(data) {
                        $.each(data, function(key, value) {
                            $('select[name="setor_id"]').append('<option value="'+ key +'">'+ value +'</option>');
                        });
                    }
                });
        });
     $('#horario').one('click', function(){
            var  emp =  $('#empresa_id').val();
                $.ajax({
                    url: '/horario-ajax/ajax/'+emp,
                    type: "GET",
                    dataType: "json",
                    success:function(data) {
                        $.each(data, function(key, value) {
                            $('select[name="horario_id"]').append('<option value="'+ value.id +'">'+ value.descricao +'</option>');
                          });
                    }
                });
     });

$('#atividade').one('click', function(){
     var  emp =  $('#empresa_id').val();
                $.ajax({
                    url: '/atividade-ajax/ajax/'+emp,
                    type: "GET",
                    dataType: "json",
                    success:function(data) {
                        $.each(data, function(key, value) {
                            $('select[name="atividade_id"]').append('<option value="'+ value.id +'">'+ value.nome +'</option>');
                        });
                    }
                });
        });

        $('#orientador').one('click', function(){
        var  inst =  $('#instituicao_id').val();
                $.ajax({
                    url: '/orientador-ajax/ajax/'+inst,
                    type: "GET",
                    dataType: "json",
                    success:function(data) {
                        $.each(data, function(key, value) {
                            $('select[name="orientador_id"]').append('<option value="'+ value.id +'">'+ value.nome +'</option>');
                        });
                    }
                });
        });
        $('#supervisor').one('click', function(){
        var  emp =  $('#empresa_id').val();
                $.ajax({
                    url: '/supervisor-ajax/ajax/'+emp,
                    type: "GET",
                    dataType: "json",
                    success:function(data) {
                        $.each(data, function(key, value) {
                            $('select[name="supervisor_id"]').append('<option value="'+ value.id +'">'+ value.nome +'</option>');
                        });
                    }
                });
        });

    });
</script>

@endsection
