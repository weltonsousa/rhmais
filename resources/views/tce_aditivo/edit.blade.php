@extends('layout/app')
@section('titulo','Gerar Aditivo | RH MAIS')
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
            <h2>Gerar Aditivo</h2>
            <div class="clearfix"></div>
        </div>
        <div class="x_content">
        <form action="{{route('tce_aditivo.store') }}" method="post">
                  @csrf
                <!-- SmartWizard html -->
        <div>
            <div>
                <div>
                    <br>
                    @foreach ($tceAditivo as $aditivo)
        <div id="form-step-0" role="form" data-toggle="validator">
            <div class="row" style="width:960px; margin: 0 auto;">
                <div class="col-md-6 col-sm-6 col-xs-12 form-group has-feedback">
                    <label for="">Estagiário</label>
                    @foreach ($estagiarios as $estagiario)
                        @if ($aditivo->estagiario_id == $estagiario->id_estagiario)
                    <input type="text" value="{{$estagiario->nome}}"
                        class="form-control has-feedback-left" placeholder="Estagiário" readonly>
                            <input type="hidden" name="estagiario_id" value="{{$estagiario->id_estagiario}}">
                    <span class="fa fa-user form-control-feedback left"
                        aria-hidden="true"></span>
                        @endif
                        @endforeach
                </div>
                <div class="col-md-6 col-sm-6 col-xs-12 form-group has-feedback">
                    <label for="">Instituicao de Ensino</label>
                    @foreach ($instituicoes as $instituicao)
                        @if ($aditivo->instituicao_id == $instituicao->id_instituicao)
                        <input type="text" value="{{$instituicao->nome_instituicao}}" class="form-control has-feedback-left"
                        placeholder="Instituição de Ensino"readonly>
                <input type="hidden" name="instituicao_id" value="{{$instituicao->id_instituicao}}">
                        <span class="fa fa-home form-control-feedback left" aria-hidden="true"></span>
                        @endif
                    @endforeach
                </div>
                <div class="col-md-6 col-sm-6 col-xs-12 form-group has-feedback">
                    <label for="">Unidade Concedente</label>
                    @foreach ($empresas as $empresa)
                        @if ($aditivo->empresa_id == $empresa->id_empresa)
                            <input type="text" value="{{$empresa->nome_fantasia}}"
                        class="form-control has-feedback-left"
                        placeholder="Unidade Concedente" readonly>
                            <input type="hidden" id="empresa_id" name="empresa_id" value="{{$empresa->id_empresa}}">
                        <span class="fa fa-home form-control-feedback left"
                        aria-hidden="true"></span>
                        @endif
                    @endforeach
                </div>
                <div class="col-md-6 col-sm-6 col-xs-12 form-group has-feedback">
                    <label for="">Valor Bolsa</label>
                    <input type="text" value="{{$aditivo->bolsa}}"
                        class="form-control has-feedback-left dinheiro"
                        placeholder="Valor Bolsa-Auxílio:" name="bolsa">
                    <span class="fa fa-money form-control-feedback left"
                        aria-hidden="true"></span>
                </div>
                <div class="col-md-6 col-sm-6 col-xs-12 form-group has-feedback">
                    <label for="">Data Início</label>
                    <input type="text" value="{{date('d/m/Y', strtotime($aditivo->data_inicio))}}"
                        class="form-control has-feedback-left"
                        placeholder="Data Inicio:" name="data_inicio">
                    <span class="fa fa-calendar form-control-feedback left"
                        aria-hidden="true"></span>
                </div>
                <div class="col-md-6 col-sm-6 col-xs-12 form-group has-feedback">
                    <label for="">Data Fim</label>
                    <input type="text" value="{{date('d/m/Y', strtotime($aditivo->data_fim))}}"
                        class="form-control has-feedback-left"
                        placeholder="Data Fim:" name="data_fim">
                    <span class="fa fa-calendar form-control-feedback left"
                        aria-hidden="true"></span>
                </div>
                <div class="col-md-6 col-sm-6 col-xs-12 form-group has-feedback">
                    <label for="">Benefício</label>
                    <select class="form-control has-feedback-left" name="beneficio_id">
                        @foreach ($beneficios as $beneficio)
                            @if($aditivo->beneficio_id == $beneficio->id_beneficio)
                            <option value="{{$aditivo->beneficio_id}}">{{ $beneficio->nome }}</option>
                            @else
                                <option value="{{ $beneficio->id_beneficio }}">{{ $beneficio->nome }}</option>
                                @endif
                        @endforeach
                    </select>
                    <span class="fa fa-bars form-control-feedback left" aria-hidden="true"></span>
                </div>
                        <div class="col-md-6 col-sm-6 col-xs-12 form-group has-feedback">
                            <label for="">Horario</label>
                    <select id="lista-horario" class="form-control has-feedback-left" id="horario_id" name="horario_id">
                           @foreach ($horarios as $hrs)
                                @if($aditivo->horario_id == $hrs->id_horario)
                                    <option value="{{$aditivo->horario_id}}">{{ $hrs->descricao }}</option>
                                @endif
                        @endforeach
                    </select>
                    <span class="fa fa-clock-o form-control-feedback left"
                        aria-hidden="true"></span>
                </div>
                <div class="col-md-6 col-sm-6 col-xs-12 form-group has-feedback">
                    <label for="">Atividade</label>
                    <select id="lista-atividade" class="form-control has-feedback-left" id="atividade_id" name="atividade_id">
                           @foreach ($atividades as $ativ)
                                @if($aditivo->atividade_id == $ativ->id_atividade)
                                    <option value="{{$aditivo->atividade_id}}">{{ $ativ->nome }}</option>
                                @endif
                        @endforeach
                    </select>
                    <span class="fa fa-book form-control-feedback left"
                        aria-hidden="true"></span>
                </div>
                    <div class="col-md-6 col-sm-6 col-xs-12 form-group has-feedback">
                        <label for="">Setor</label>
                    <select class="form-control has-feedback-left" name="setor_id">
                        @foreach ($setores as $setor)
                            @if ($aditivo->setor_id == $setor->id_setor )
                                <option value="{{ $aditivo->setor_id }}">{{ $setor->nome }}</option>
                            @else
                                <option value="{{ $setor->id_setor }}">{{ $setor->nome }}</option>
                            @endif
                        @endforeach
                    </select>
                    <span class="fa fa-cube form-control-feedback left"
                        aria-hidden="true"></span>
                </div>
                <div class="col-md-6 col-sm-6 col-xs-12 form-group has-feedback">
                    <label for="">Orientador</label>
                    @foreach ($orientador as $or)
                        @if ($aditivo->orientador_id == $or->id_orientador)
                        <input type="text" value="{{$or->nome}}" class="form-control has-feedback-left" placeholder="Atividades:">
                        <input type="hidden" name="orientador_id" value="{{$or->id_orientador}}">
                        <span class="fa fa-bars form-control-feedback left" aria-hidden="true"></span>
                        @endif
                    @endforeach
                    </div>
                <div class="col-md-6 col-sm-6 col-xs-12 form-group has-feedback">
                    <label for="">Supervisor</label>
                    @foreach ($supervisor as $sup)
                        @if ($aditivo->supervisor_id == $sup->id_supervisor)
                            <input type="text" value="{{$sup->nome}}" class="form-control has-feedback-left" placeholder="Atividades:">
                            <input type="hidden" name="supervisor_id" value="{{$sup->id_supervisor}}">
                            <span class="fa fa-bars form-control-feedback left" aria-hidden="true"></span>
                        @endif
                    @endforeach
                </div>
                    <div class="col-md-6 col-sm-6 col-xs-12 form-group has-feedback">
                        <label for="">Seguro</label>
                        @foreach ($apolices as $apolice)
                            @if ($aditivo->apolice_id == $apolice->id_seguradora)
                            <input type="text" value="{{$apolice->nome}}" class="form-control has-feedback-left" readonly>
                            <input type="hidden" name="apolice_id" value="{{$apolice->id_seguradora}}">
                            <span class="fa fa-bars form-control-feedback left" aria-hidden="true"></span>
                            @endif
                        @endforeach
                    </div>
                <div class="col-md-6 col-sm-6 col-xs-12 form-group has-feedback">
                    <label for=""> Data do Cadastro</label>
                    <input type="text" value="{{date('d/m/Y', strtotime($aditivo->data_doc))}}"
                        class="form-control has-feedback-left"
                        placeholder="Data Documento:" name="data_doc">
                    <span class="fa fa-calendar form-control-feedback left"
                        aria-hidden="true"></span>
                </div>
                <div class="col-md-6 col-sm-6 col-xs-12">
                    <div class="checkbox">
                        Tipo de Estágio:
                        <!-- 1 - obrigatorio -->
                        <label>
                            <input type="radio" name="obrigatorio"
                                value="{{$aditivo->obrigatorio}}" class="flat" checked="@if ($aditivo->obrigatorio == 1) true  @endif "> Obrigatório
                        </label>
                        <!-- 2 - não obrigatorio -->
                        <label>
                            <input type="radio" name="obrigatorio"
                                value="{{$aditivo->obrigatorio }}" class="flat" checked="@if ($aditivo->obrigatorio == 2) true  @endif "> Não
                            Obrigatório
                        </label>
                    </div>
                </div>
                <div class="col-md-12 col-sm-12 col-xs-12 form-group has-feedback">
                    <label>Aditivo</label>
                <textarea  name="obs" class="form-control" placeholder="Aditivo" value="{{$aditivo->obs}}">{{$aditivo->obs}}</textarea>
                </div>
                    <div class="col-md-12 col-sm-12 col-xs-12 form-group has-feedback">
                    <button type="submit" class="btn btn-success"
                    style="margin-left: 30%;">Salvar Alterações</button>
                    <a href="/tce_aditivo" class="btn btn-danger">Voltar</a>
                    </div>
                 </div>
                </div>
                </div>
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
<script>
    $( document ).ready(function() {
  var  emp =  $('#empresa_id').val();
     $.ajax({
        url: '/horario-ajax/ajax/'+emp,
        type: "GET",
        dataType: "json",
        success:function(data){
            $.each(data, function(key, value) {
             $('select[name="horario_id"]').append('<option value="'+ value.id +'">'+ value.descricao +'</option>');
               });
             }
        });

        $.ajax({
        url: '/atividade-ajax/ajax/'+emp,
        type: "GET",
        dataType: "json",
        success:function(data){
            $.each(data, function(key, value) {
             $('select[name="atividade_id"]').append('<option value="'+ value.id +'">'+ value.nome +'</option>');
               });
             }
        });
});
</script>
@endsection
