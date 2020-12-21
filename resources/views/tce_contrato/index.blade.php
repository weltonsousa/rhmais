@extends('layout/app-new')
@section('titulo','Lista de Contratos Ativos | RH MAIS')

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
        @include('layout.menu.menutop-new')

    <!-- page content -->
    <div class="right_col" role="main">
        <div class="">
                    <div class="clearfix"></div>
                <div class="row">
                    <div class="col-md-12 col-sm-12 col-xs-12">
                            <div class="x_panel">
                                <div class="x_title" id="modulo">
                                <h3 class="barlow">
                                    <div class="click suave criar"><i class="material-icons">add_circle</i><span class="mini-title">Adicionar<span></div>
                                </h3>
                                <h2> Lista de Contratos Ativos - TCE</h2>
                                <div class="clearfix"></div>
                                </div>
                                <div class="x_content">
                                    <div id="modulo">
                                        <table id="tLista" style="padding-top: 16px;" class="stripe">
                                            <thead>
                                                <tr>
                                                    <td class="mini-title upper">#</td>
                                                    <td class="mini-title upper">Estagiário</td>
                                                    <td class="mini-title upper">Und. Concedente</td>
                                                    <td class="mini-title upper">Instituição</td>
                                                    <td class="mini-title upper">Valor Bolsa</td>
                                                    <td class="mini-title upper">Data Início</td>
                                                    <td class="mini-title upper">Data Fim</td>
                                                    {{-- <td class="mini-title upper">Contrato</td> --}}
                                                    <td class="mini-title upper">Assinado</td>
                                                    <td class="mini-title upper">Ativo</td>
                                                    <td class="mini-title upper">Obg.</td>
                                                    <td class="mini-title upper">Ações</td>
                                                </tr>
                                            </thead>
                                            <tbody></tbody>
                                        </table>
                                </div>

                        <div id="lateral" class="suave">
                            <div class="overlay suave"></div>
                            <div id="criar" class="content suave">
                            <h4 class="barlow">Novo Contrato<i class="material-icons click suave fechar">close</i></h4>
                            <form id="form-criar" method="POST">
                                <div class="tab">
                                    <div class="metade esquerda">
                                        <label for="">Estagiário</label>
                                        <select name="estagiario_id" id="estagiario_id">
                                            <option value="">Nome</option>
                                             @foreach ($estagiarios as  $estagiario )
                                                <option value="{{ $estagiario->id_estagiario }}">{{ $estagiario->nome }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <div class="metade direita">
                                       <label for="">Unidade</label>
                                        <select name="empresa_id">
                                            <option value="">Unidade</option>
                                        </select>
                                    </div>
                                     <div class="clear"></div>
                                    <div class="metade esquerda">
                                       <label for="">Instituição</label>
                                        <select name="instituicao_id">
                                            <option value="">Instituição</option>
                                        </select>
                                    </div>
                                    <div class="metade direita">
                                         <label for="">Data Cadastro</label>
                                        <input type="text" class="data" placeholder="Data Documento" name="data_doc">
                                    </div>
                                     <div class="clear"></div>
                                    <div class="metade esquerda">
                                        <label for=""> Data Início</label>
                                        <input type="text" class="data" placeholder="Data Início" id="data-inicio" name="data_inicio">
                                    </div>
                                    <div class="metade direita">
                                         <label for=""> Data Fim</label>
                                        <input type="text" class="data" placeholder="Data Fim" id="data-fim" name="data_fim">
                                    </div>
                                      <div class="clear"></div>
                                    <div class="metade esquerda">
                                        <label for="">Benefício</label>
                                        <select name="beneficio"  id="beneficio">
                                            <option>Beneficio</option>
                                            @foreach ($beneficios as $beneficio)
                                                <option value="{{ $beneficio->nome_beneficio }}">{{ $beneficio->nome_beneficio }}</option>
                                            @endforeach
                                        </select>
                                   </div>
                                  <div class="metade direita">
                                      <label for="">Seguro</label>
                                        <select name="seguro" id="seguro">
                                            <option>Seguro</option>
                                            @foreach ($seguros as $seguro)
                                            <option value="{{ $seguro->nome_seguradora }}">{{ $seguro->nome_seguradora }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                 <div class="clear"></div>
                                    <div class="metade esquerda">
                                        <label for="">Horário</label>
                                        <select id="lista-horario" name="horario" id="horario">
                                            <option>Horário</option>
                                        </select>
                                    </div>
                                    <div class="metade direita">
                                        <label for="">Setor</label>
                                        <select name="setor" id="setor">
                                                <option>Setor</option>
                                                @foreach ($setores as $setor)
                                                <option value="{{ $setor->nome_setor }}">{{ $setor->nome_setor }}</option>
                                                @endforeach
                                            </select>
                                    </div>
                                 <div class="clear"></div>
                                 <div class="metade esquerda">
                                     <label for="">Atividade</label>
                                   <select id="lista-atividade" name="atividade" id="atividade">
                                        <option>Atividade</option>
                                    </select>
                                    </div>
                                    <div class="metade direita">
                                        <label for="">Orientador</label>
                                         <select name="orientador_id">
                                            <option>Orientador</option>
                                            @foreach ($orientadores as $orient)
                                                <option value="{{ $orient->id_orientador }}">{{ $orient->nome_orientador }}
                                            </option>
                                            @endforeach
                                        </select>
                                     </div>
                                 <div class="clear"></div>
                                 <div class="metade esquerda">
                                     <label for="">Supervisor</label>
                                     <select name="supervisor_id">
                                        <option>Supervisor</option>
                                        @foreach ($supervisores as $sup)
                                        <option value="{{ $sup->id_supervisor }}">{{ $sup->nome_supervisor }}</option>
                                        @endforeach
                                    </select>
                                </div>
                                    <div class="metade direita">
                                        <label>Valor Bolsa-Auxílio</label>
                                        <input type="text" maxlength="10" class="dinheiro" placeholder="Valor Bolsa-Auxílio" name="bolsa" oninput="this.className = ' ' ">
                                    </div>
                                </div>
                                 <div class="clear"></div>
                                {{-- Etapa 2 --}}
                                <div class="tab">
                                    <h5>Tipo de Estágio</h5>
                                   <div class="metade esquerda">
                                        <label>
                                            <input type="radio" checked="checked" name="obrigatorio" value="1">
                                            Não Obrigatório
                                        </label>
                                 </div>
                                    <div class="metade direita">
                                        <label>
                                            <input type="radio" name="obrigatorio" value="2"> Obrigatório
                                        </label>
                                    </div>
                                    <div class="metade esquerda">
                                        <label for="">Obs.:</label>
                                        <textarea placeholder="Observações" name="observacao"></textarea>
                                    </div>
                                </div>
                                <div class="clear"></div>
                                <div style="overflow:auto;">
                                    <div style="float:right;">
                                        <button type="button" id="prevBtn" onclick="nextPrev(-1)">Voltar</button>
                                        <button type="button" id="nextBtn" onclick="nextPrev(1)">Próximo</button>
                                        <button type="submit"  id="save" class="click suave">Salvar <i class="material-icons">save</i></button>
                                    </div>
                                </div>

                                <div class="clear"></div>

                                <!-- Circles which indicates the steps of the form: -->
                                <div style="text-align:center;margin-top:40px;">
                                <span class="step"></span>
                                <span class="step"></span>
                                {{-- <span class="step"></span> --}}
                                </div>
                            </form>
                            </div>
                            <div id="editar" class="content suave">
                                <h4 class="barlow">Editar Contrato<i class="material-icons click suave fechar">close</i></h4>
                                <form id="form-editar" method="post">
                                <input type="hidden" name="e_id_tce_contrato" id="e_id_tce_contrato" value="">
                                <div class="e_tab">
                                    <div class="metade esquerda">
                                        <label for="">Estagiário</label>
                                      <input type="text" name="e_nome" id="e_nome" readonly>
                                       <input type="hidden"  name="e_estagiario_id"id="e_estagiario_id">
                                    </div>
                                    <div class="metade direita">
                                       <label for="">Unidade</label>
                                       <input type="text" name="e_nome_fantasia" id="e_nome_fantasia" readonly>
                                        <input type="hidden"  name="e_empresa_id"id="e_empresa_id">
                                    </div>
                                     <div class="clear"></div>
                                    <div class="metade esquerda">
                                       <label for="">Instituição</label>
                                        <input type="text" name="e_nome_instituicao" id="e_nome_instituicao" readonly>
                                         <input type="hidden"  name="e_instituicao_id"id="e_instituicao_id">
                                    </div>
                                    <div class="metade direita">
                                         <label for="">Data do Cadastro</label>
                                        <input type="text" class="data" placeholder="Data Documento" name="e_data_doc">
                                    </div>
                                     <div class="clear"></div>
                                    <div class="metade esquerda">
                                        <label for=""> Data Início</label>
                                        <input type="text" class="data" placeholder="Data Início" id="data-inicio" name="e_data_inicio">
                                    </div>
                                    <div class="metade direita">
                                         <label for=""> Data Fim</label>
                                        <input type="text" class="data" placeholder="Data Fim" id="data-fim" name="e_data_fim">
                                    </div>
                                      <div class="clear"></div>
                                    <div class="metade esquerda">
                                        <label for="">Benefício</label>
                                        <select name="e_beneficio">
                                            {{-- <option>Beneficio</option> --}}
                                            @foreach ($beneficios as $beneficio)
                                                <option value="{{ $beneficio->nome_beneficio }}">{{ $beneficio->nome_beneficio }}</option>
                                            @endforeach
                                        </select>
                                   </div>
                                  <div class="metade direita">
                                      <label for="">Seguro</label>
                                     <input type="text" name="e_seguro" id="e_seguro" readonly>
                                    </div>
                                 <div class="clear"></div>
                                    <div class="metade esquerda">
                                        <label for="">Horário</label>
                                        <select id="lista-horario" name="e_horario" id="e_horario">
                                            @foreach ($horarios as $hora)
                                              <option value="{{ $hora->descricao }}">{{ $hora->descricao }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <div class="metade direita">
                                        <label for="">Setor</label>
                                        <select name="e_setor">
                                                @foreach ($setores as $setor)
                                                <option value="{{ $setor->nome_setor }}">{{ $setor->nome_setor }}</option>
                                                @endforeach
                                            </select>
                                    </div>
                                 <div class="clear"></div>
                                    <div class="metade esquerda">
                                        <label for="">Atividade</label>
                                         <select id="lista-atividade" name="e_atividade">
                                            {{-- <option>Atividade</option> --}}
                                            @foreach ($atividades as $ativ)
                                            <option value="{{ $ativ->nome_atividade }}">{{ $ativ->nome_atividade }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <div class="metade direita">
                                        <label for="">Orientador</label>
                                         <select name="e_orientador_id">
                                            {{-- <option>Orientador</option> --}}
                                            @foreach ($orientadores as $orient)
                                                <option value="{{ $orient->id_orientador }}">{{ $orient->nome_orientador }}
                                            </option>
                                            @endforeach
                                        </select>
                                    </div>
                                 <div class="clear"></div>
                                 <div class="metade esquerda">
                                     <label for="">Supervisor</label>
                                     <select name="e_supervisor_id">
                                        {{-- <option>Supervisor Estagio</option> --}}
                                        @foreach ($supervisores as $sup)
                                            <option value="{{ $sup->id_supervisor }}">{{ $sup->nome_supervisor }}</option>
                                        @endforeach
                                    </select>
                                </div>
                                    <div class="metade direita">
                                        <label>Valor Bolsa-Auxílio</label>
                                        <input type="text" maxlength="10" class="dinheiro" name="e_bolsa" oninput="this.className = ' ' ">
                                    </div>
                                 <div class="clear"></div>
                                 <h5>Tipo de Estágio </h5>
                                 <div class="metade esquerda">
                                        <label>
                                            <input type="radio" checked="checked" name="e_obrigatorio" value="1">
                                            Não Obrigatório
                                        </label>
                                 </div>
                                     <div class="metade direita">
                                        <label>
                                            <input type="radio" name="e_obrigatorio" value="2"> Obrigatório
                                        </label>
                                    </div>
                                </div>
                                 <div class="clear"></div>
                                    <div class="metade esquerda">
                                        <label for="">Observações</label>
                                        <textarea placeholder="Observações" name="e_obs"></textarea>
                                    </div>
                                {{-- </div> --}}
                                 <div class="clear"></div>
                                <button type="submit"  id="save" class="click suave">Salvar <i class="material-icons">save</i></button>
                               </div>
                                </form>
                            <div id="rescisao" class="content suave">
                                <h4 class="barlow">Rescisão Contrato<i class="material-icons click suave fechar">close</i></h4>
                                 <form id="form-rescisao" method="post">
                                <div class="res_tab">
                                    <input type="hidden"  name="res_tce_contrato_id" id="res_tce_contrato_id">
                                    <div class="metade esquerda">
                                        <label for="">Estagiário</label>
                                      <input type="text" name="res_nome" id="res_nome" readonly>
                                      <input type="hidden"  name="res_estagiario_id"id="res_estagiario_id">
                                    </div>
                                    <div class="metade direita">
                                       <label for="">Unidade</label>
                                       <input type="text" name="res_nome_fantasia" id="res_nome_fantasia" readonly>
                                       <input type="hidden"  name="res_empresa_id" id="res_empresa_id">
                                    </div>
                                     <div class="clear"></div>
                                    <div class="metade esquerda">
                                       <label for="">Instituição</label>
                                        <input type="text" name="res_nome_instituicao" id="res_nome_instituicao" readonly>
                                          <input type="hidden"  name="res_instituicao_id" id="res_instituicao_id">
                                    </div>
                                    <div class="metade direita">
                                          <label>Valor Bolsa-Auxílio</label>
                                        <input type="text" maxlength="10" class="dinheiro" placeholder="Valor Bolsa-Auxílio" name="res_bolsa" oninput="this.className = ' ' ">
                                    </div>
                                    <div class="clear"></div>
                                    <div class="metade esquerda">
                                        <label for="">Data TCE</label>
                                       <input type="text" class="data" placeholder="Data Documento" name="res_data_contrato" id="res_data_contrato" readonly>
                                    </div>
                                    <div class="metade direita">
                                        <label for=""> Data Início</label>
                                        <input type="text" class="data" placeholder="Data Início" id="data-inicio" name="res_data_inicio" readonly>
                                    </div>
                                    <div class="clear"></div>
                                    <div class="metade esquerda">
                                        <label for=""> Data Fim</label>
                                        <input type="text" class="data" placeholder="Data Fim" id="data-fim" name="res_data_fim">
                                    </div>
                                    <div class="metade direita">
                                        <label for="">Horário</label>
                                         <input typ="text" name="res_horario" id="res_horario" readonly>
                                    </div>
                                         <div class="clear"></div>
                                   <div class="metade esquerda">
                                        <label for="">Benefício</label>
                                            <textarea name="res_beneficio" id="res_beneficio" readonly></textarea>
                                    </div>
                                    <div class="metade direita">
                                        <label for="">Atividade</label>
                                         <textarea name="res_atividade" id="res_atividade"></textarea>
                                    </div>
                                      <div class="clear"></div>
                                    <div class="metade esquerda">
                                     <label for="">Supervisor</label>
                                        <input type="text" name="res_nome_supervisor" id="" readonly>
                                         <input type="hidden"  name="res_supervisor_id" id="res_supervisor_id">
                                </div>

                                    <div class="metade direita">
                                        <label for="">Motivo</label>
                                         <select name="res_motivo">
                                                @foreach ($motivos as $motivo)
                                                    <option value="{{ $motivo->nome_motivo }}">{{ $motivo->nome_motivo }}</option>
                                                @endforeach
                                        </select>
                                    </div>
                                      <div class="clear"></div>
                                      <div class="metade esquerda">
                                        <label for="">Seguro</label>
                                        <input type="text" name="res_seguro" id="res_seguro" readonly>
                                   </div>
                                    <div class="metade direita">
                                        <label for="">Último Dia</label>
                                        <input type="text" class="data" name="res_ultimo_dia" id="res_ultimo_dia">
                                    </div>
                                      <div class="clear"></div>
                                    <div class="metade esquerda">
                                        <label for="">Data Documento</label>
                                        <input type="text" name="res_data_doc" id="">
                                    </div>
                                      <div class="clear"></div>
                                    <div class="metade esquerda">
                                        <label for="">Observação</label>
                                        <textarea placeholder="Observações" name="res_obs"></textarea>
                                    </div>

                                 <div class="clear"></div>
                                <button type="submit"  id="save" class="click suave">Salvar <i class="material-icons">save</i></button>
                               </div>
                                </form>
                            </div>
                            </div>
                        </div>
                    </div>

                        <div id="alerta" class="suave">
                            <div class="box">
                            <h6 class="mini-title upper">aviso:</h6>
                            <p></p>
                            <div class="opcoes right-align hide">
                                <button class="mini-title upper click suave confirmar">sim</button>
                                <button class="mini-title upper click suave cancelar">não</button>
                            </div>
                        </div>
                        </div>
                        </div>
                        </div>
                    </div>
                </div>
        </div>
    </div>
            <!-- footer content -->
             @include('layout.footer')
             <!-- /footer content -->
    </div>
</div>

<script>

    var table;
    function carregar(){
        table = $('#tLista').DataTable({
            ajax: {
                url: 'tceContrato-lista',
                dataSrc: ''
            },
            columns: [
                {data: 'id_tce_contrato', width: "60px", className: 'dt-body-center dt-head-center'},
                {data: 'estagiario.nome', width: "400px"},
                {data: 'empresa.nome_fantasia', width: "200px", className: 'dt-body-center dt-head-center'},
                {data: 'instituicao.nome_instituicao', width: "200px", className: 'dt-body-center dt-head-center'},
                {data: null, width: "200px", className: 'dt-body-center dt-head-center',
                      render: function ( data, type, row ) {
                            return parseInt(row.bolsa).toLocaleString('pt-BR', {style: 'currency', currency: 'BRL'});
                        }
                },
                {data: 'data_inicio', width: "200px", className: 'dt-body-center dt-head-center'},
                {data: 'data_fim', width: "200px", className: 'dt-body-center dt-head-center'},
                {data: null, width: "200px", className: 'dt-body-center dt-head-center',
                    render: function(data, type, row){
                        if( row.assinado == 1){
                            return "Sim";
                        }else{
                            return "Não";
                        }
                    }
                },
                {data: null, width: "200px", className: 'dt-body-center dt-head-center',
                     render: function(data, type, row){
                        if( row.ativo == 1){
                            return "Sim";
                        }else{
                            return "Não";
                        }
                    }
                },
                {data: null, width: "200px", className: 'dt-body-center dt-head-center',
                     render: function(data, type, row){
                        if( row.obrigatorio == 1){
                            return "Sim";
                        }else{
                            return "Não";
                        }
                    }
                },
                {data: 'acoes', width: "80px", className: 'dt-body-center dt-head-center'}
            ],
            columnDefs: [
                {
                    targets: -1,
                    width: "80px",
                    className: 'dt-body-center dt-head-center',
                    data: null,
                    defaultContent: '<i class="material-icons click suave editar">create</i><i class="material-icons click suave rescisao">fact_check</i><i class="material-icons click imp-tce">print</i>'
                }
            ],
            language: {
                processing:     "Carregando",
                search:         "Pesquisar",
                lengthMenu:     "Mostrando _MENU_ registros",
                info:           "De _START_ à _END_ de _TOTAL_ registros",
                paginate: {
                    first:      "Primeiro",
                    previous:   "Anterior",
                    next:       "Próximo",
                    last:       "Último"
                },
                emptyTable:     "Nenhum registro cadastrado!",
                zeroRecords:    "Nenhum registro encontrado!",
                loadingRecords: "Carregando...",
                infoEmpty:      "Nenhum registro encontrado",
                infoFiltered:   "(filtrado de _MAX_ cadastros)",

            }
        });

        $(document).on("click", ".imp-tce", function(){
               var url = ("tce-pdf");
               var data = table.row($(this).parents("tr")).data();
               window.open(url +'/'+data.estagiario_id);
        });

         $(document).on("click", ".editar", function(){
            var data = table.row($(this).parents("tr")).data();
            $("#lateral, #editar").addClass("active");
            $("#editar #e_id_tce_contrato").val(data.id_tce_contrato);
            consultar(data.id_tce_contrato);
        });
         $(document).on("click", ".rescisao", function(){
            var data = table.row($(this).parents("tr")).data();
            $("#lateral, #rescisao").addClass("active");
            $("#rescisao #res_id_tce_contrato").val(data.id_tce_contrato);
            consultarRescisao(data.id_tce_contrato);
        });
        var delete_id;
        $(document).on("click", ".deletar", function(){
            delete_id = table.row($(this).parents("tr")).data();
            $("#alerta p").empty();
            $("#alerta p").text("Deseja realmente deletar este estagiário?");
            $("#alerta .opcoes").removeClass("hide");
            $("#alerta").addClass("active");
        });
        $("#alerta .confirmar").click(function(){
            $(this).prop('disabled', true);
            deletar(delete_id.id_estagiario);
        });
    }carregar();

    function recarregar(){
        table.ajax.reload();
    }

    $(".criar").click(function(){
            $("#lateral, #criar").addClass("active");
        });

        $("#form-criar").submit(function(e){
        e.preventDefault();
        $("#form-criar button").prop('disabled', true);
        // $("#form-criar button div").text("Salvando...");
        criar();
    });

        $("#form-editar").submit(function(e){
            e.preventDefault();
            $("#form-editar button").prop('disabled', true);
            editar();
        });
        $("#form-rescisao").submit(function(e){
            e.preventDefault();
            $("#form-rescisao button").prop('disabled', true);
            rescisao();
        });

        $("#lateral .fechar").click(function(){
            $("#lateral, #lateral .content").removeClass("active");
        });

        $("#alerta .cancelar").click(function(){
            $("#alerta").removeClass("active");
        });

        function criar(){
            var form = new FormData($("#form-criar")[0]);
            request = $.ajax({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                url: 'tce_contrato',
                data: form,
                type: 'post',
                contentType: false,
                processData: false,
                error: function(){
                    criaAlerta(0, "Falha ao criar contrato!",2000);
                }
            });
            request.done(function(response){
                if(response == "1"){
                    $("#lateral, #lateral .content").removeClass("active");
                    $("#form-criar")[0].reset();
                    $("#form-criar button").prop('disabled', false);
                    criaAlerta(0, "Contrato criado!",5000);
                    recarregar();
                }
            });
        }

        function consultar(id){
            request = $.ajax({
                url: 'tce_contrato/' + id,
                type: 'get',
                error: function(){
                    criaAlerta(0,"Falha na consulta!",2000);
                }
            });
            request.done(function(response){
                $('#form-editar input[name="e_estagiario_id"]').val(response.estagiario_id);
                $('#form-editar input[name="e_instituicao_id"]').val(response.instituicao_id);
                $('#form-editar input[name="e_empresa_id"]').val(response.empresa_id);
                $('#form-editar input[name="e_nome"]').val(response.estagiario.nome);
                $('#form-editar input[name="e_data_doc"]').val(response.data_doc);
                $('#form-editar input[name="e_data_inicio"]').val(response.data_inicio);
                $('#form-editar input[name="e_data_fim"]').val(response.data_fim);
                $('#form-editar input[name="e_beneficio"]').val(response.beneficio);
                $('#form-editar input[name="e_seguro"]').val(response.seguro);
                $('#form-editar input[name="e_horario"]').val(response.horario);
                $('#form-editar input[name="e_setor"]').val(response.setor);
                $('#form-editar input[name="e_atividade"]').val(response.atividade);
                $('#form-editar input[name="e_orientador_id"]').val(response.orientador_id);
                $('#form-editar input[name="e_supervisor_id"]').val(response.supervisor_id);
                $('#form-editar input[name="e_bolsa"]').val(response.bolsa);
                $('#form-editar input[name="e_obrigatorio"]').val(response.obrigatorio);
                $('#form-editar input[name="e_obs"]').val(response.obs);
                $('#form-editar input[name="e_nome_instituicao"]').val(response.instituicao.nome_instituicao);
                $('#form-editar input[name="e_nome_fantasia"]').val(response.empresa.nome_fantasia);
            });
        }
        function consultarRescisao(id){
            request = $.ajax({
                url: 'tce_contrato/' + id,
                type: 'get',
                error: function(){
                    criaAlerta(0,"Falha na consulta!",2000);
                }
            });
            request.done(function(response){
                $('#form-rescisao input[name="res_estagiario_id"]').val(response.estagiario_id);
                $('#form-rescisao input[name="res_instituicao_id"]').val(response.instituicao_id);
                $('#form-rescisao input[name="res_empresa_id"]').val(response.empresa_id);
                $('#form-rescisao input[name="res_tce_contrato_id"]').val(response.id_tce_contrato);
                $('#form-rescisao input[name="res_nome"]').val(response.estagiario.nome);
                $('#form-rescisao input[name="res_data_doc"]').val(response.data_doc);
                $('#form-rescisao input[name="res_data_contrato"]').val(response.data_doc);
                $('#form-rescisao input[name="res_data_inicio"]').val(response.data_inicio);
                $('#form-rescisao input[name="res_data_fim"]').val(response.data_fim);
                $('#form-rescisao textarea[name="res_beneficio"]').val(response.beneficio);
                $('#form-rescisao input[name="res_seguro"]').val(response.seguro);
                $('#form-rescisao input[name="res_horario"]').val(response.horario);
                $('#form-rescisao textarea[name="res_atividade"]').val(response.atividade);
                $('#form-rescisao input[name="res_orientador_id"]').val(response.orientador_id);
                $('#form-rescisao input[name="res_nome_supervisor"]').val(response.supervisor.nome_supervisor);
                $('#form-rescisao input[name="res_supervisor_id"]').val(response.supervisor_id);
                $('#form-rescisao input[name="res_bolsa"]').val(response.bolsa);
                $('#form-rescisao input[name="res_obrigatorio"]').val(response.obrigatorio);
                $('#form-rescisao input[name="res_obs"]').val(response.obs);
                $('#form-rescisao input[name="res_nome_instituicao"]').val(response.instituicao.nome_instituicao);
                $('#form-rescisao input[name="res_nome_fantasia"]').val(response.empresa.nome_fantasia);
            });
        }

        function editar(){
            var form = new FormData($("#form-editar")[0]);
            request = $.ajax({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                url: 'tce_contrato',
                data: form,
                type: 'post',
                contentType: false,
                processData: false,
                error: function(){
                    criaAlerta(0,"Falha ao editar contrato!",2000);
                }
            });
            request.done(function(response){
                if(response == "2"){
                    $("#lateral, #lateral .content").removeClass("active");
                    $("#form-editar")[0].reset();
                    $("#form-editar button").prop('disabled', false);
                    criaAlerta(0, "Contrato atualizado!",5000);
                    recarregar();
                }
            });
        }

        function rescisao(){
            var form = new FormData($("#form-rescisao")[0]);
            request = $.ajax({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                url: 'tce_rescisao',
                data: form,
                type: 'post',
                contentType: false,
                processData: false,
                error: function(){
                    criaAlerta(0,"Falha rescisão!",2000);
                }
            });
            request.done(function(response){
                if(response == "1"){
                    $("#lateral, #lateral .content").removeClass("active");
                    $("#form-rescisao")[0].reset();
                    $("#form-rescisao button").prop('disabled', false);
                    criaAlerta(0, "Rescisão realizada!",5000);
                    recarregar();
                }
            });
        }

        function deletar(id){
            request = $.ajax({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                url: 'tce_contrato/' + id,
                type: 'delete',
                error: function(){
                    criaAlerta(0, "Falha ao deletar estagiário!",2000);
                }
            });
            request.done(function(response){
                if(response == "1"){
                    $("#alerta .opcoes").addClass("hide");
                    $("#alerta p").text("estagiario deletado!");
                    $("#alerta .confirmar").prop('disabled', false);
                    setTimeout(function(){
                        $("#alerta").removeClass("active");
                    }, 2000);
                    recarregar();
                }else{
                     $("#alerta .opcoes").addClass("hide");
                    $("#alerta p").text("Não pode ser removido!");
                    $("#alerta .confirmar").prop('disabled', false);
                    setTimeout(function(){
                        $("#alerta").removeClass("active");
                    }, 2000);
                    recarregar();
                }
            });
        }

       var currentTab = 0; // Current tab is set to be the first tab (0)
        showTab(currentTab); // Display the current tab
        function showTab(n) {
        // This function will display the specified tab of the form ...
        var x = document.getElementsByClassName("tab");
        x[n].style.display = "block";
        // ... and fix the Previous/Next buttons:
        if (n == 0) {
            document.getElementById("prevBtn").style.display = "none";
            document.getElementById("save").style.display = "none";
            document.getElementById("nextBtn").style.display = "inline";
        } else {
            document.getElementById("prevBtn").style.display = "inline";
            document.getElementById("nextBtn").style.display = "inline";
        }
        if (n == (x.length - 1)) {
            document.getElementById("save").style.display = "inline";
            document.getElementById("nextBtn").style.display = "none";
        }

        fixStepIndicator(n)
        }

        function nextPrev(n) {
        // This function will figure out which tab to display
        var x = document.getElementsByClassName("tab");
        // Exit the function if any field in the current tab is invalid:
        if (n == 1 && !validateForm()) return false;
        // Hide the current tab:
        x[currentTab].style.display = "none";
        // Increase or decrease the current tab by 1:
        currentTab = currentTab + n;
        // if you have reached the end of the form... :
        if (currentTab >= x.length) {
            //...the form gets submitted:
            document.getElementById("form-criar").submit();
            return false;
        }
        // Otherwise, display the correct tab:
        showTab(currentTab);
        }

        function validateForm() {
        // This function deals with validation of the form fields
        var x, y, i, valid = true;
        x = document.getElementsByClassName("tab");
        y = x[currentTab].getElementsByTagName("input");
        // A loop that checks every input field in the current tab:
        for (i = 0; i < y.length; i++) {
            // If a field is empty...
            if (y[i].value == "") {
            // add an "invalid" class to the field:
            y[i].className += " invalid";
            // and set the current valid status to false:
            valid = false;
            }
        }
        // If the valid status is true, mark the step as finished and valid:
        if (valid) {
            document.getElementsByClassName("step")[currentTab].className += " finish";
        }
        return valid; // return the valid status
        }

        function fixStepIndicator(n) {
        // This function removes the "active" class of all steps...
        var i, x = document.getElementsByClassName("step");
        for (i = 0; i < x.length; i++) {
            x[i].className = x[i].className.replace(" active", "");
        }
        //... and adds the "active" class to the current step:
        x[n].className += " active";
        }

    $(document).ready(function() {
        $('select[name="estagiario_id"]').on('change', function() {
            var stateID = $(this).val();
            if(stateID) {
                $.ajax({
                    url: '/tce-ajax/ajax/'+stateID,
                    type: "GET",
                    dataType: "json",
                    success:function(data) {
                        $('select[name="empresa_id"]').empty();
                        $.each(data, function(key, value) {
                            $('select[name="empresa_id"]').append('<option value="'+ data[0].empresa_id +'">'+ data[0].nome_fantasia +'</option>');
                            $('select[name="instituicao_id"]').append('<option value="'+ data[0].instituicao_id +'">'+ data[0].nome_instituicao +'</option>');
                        });
                        consultaHorarios(data[0].empresa_id);
                        atividadePrestada(data[0].empresa_id);
                    }
                });
            }else{
                $('select[name="empresa_id"]').empty();
            }
        });
    });

    function consultaHorarios(empresa_id){
            if(empresa_id) {
                $.ajax({
                    url: '/horario-ajax/ajax/'+empresa_id,
                    type: "GET",
                    dataType: "json",
                    success:function(data) {
                        $('#lista-horario').empty();
                        $.each(data, function(key, value) {
                            $('#lista-horario').append('<option value="'+ value.descricao +'">'+ value.descricao +'</option>');
                        });
                    }
                });
            }else{
                $('#lista-horario').empty();
            }
    }

function atividadePrestada(empresa_id){
            if(empresa_id) {
                $.ajax({
                    url: '/atividade-ajax/ajax/'+empresa_id,
                    type: "GET",
                    dataType: "json",
                    success:function(data) {
                        $('#lista-atividade').empty();
                        $.each(data, function(key, value) {
                            $('#lista-atividade').append('<option value="'+ value.nome_atividade +'">'+ value.nome_atividade +'</option>');
                        });
                    }
                });
            }else{
                $('#lista-atividade').empty();
            }
}

    $("#data-fim").focusout(function(){
    var dtI = $("#data-inicio").val().split('/');
    var dtF = $("#data-fim").val().split('/');

    dia_I = dtI[0];
    dia_F = dtF[0];
    mes_I = dtI[1];
    mes_F = dtF[1];
    ano_I = dtI[2];
    ano_F = dtF[2];
    var calculoDia = dia_F - dia_I;
    var calculoMes = mes_F - mes_I;
    var calculoAno = ano_F - ano_I;

    console.log( calculoDia  + " " + calculoMes + " "  +   calculoAno);

    if(calculoDia < "0" || calculoMes < "0" || calculoAno < "0"){
        alert("A data de término não pode ser anterior a data de início.", "Aviso", function(){
            $("#data-fim").val("");
            $("#data-fim").focus();
            BackOffice.closeModal('.modal', true);
        });
    } else if (calculoDia < "0" || calculoMes < "0" || calculoAno < "1") {
       alert("1");
    } else if (calculoDia < "0" || calculoMes < "0" || calculoAno > "2") {
        alert("2");
    }
})
</script>
@endsection
