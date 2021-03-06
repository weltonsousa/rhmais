@extends('layout/app-new')
@section('titulo','Lista de Convênio de Concessão de Estágios | RH MAIS')
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
                        @include('layout.alerta.flash-message')
                            <div class="x_panel">
                                <div class="x_title" id="modulo">
                                <h3 class="barlow">
                                    <div class="click suave criar"><i class="material-icons">add_circle</i><span class="mini-title">Adicionar<span></div>
                                </h3>
                                <h2>Lista de Convênio de Concessão de Estágios - CCE</h2>
                                <div class="clearfix"></div>
                                </div>
                                <div class="x_content">
                                    <div id="modulo">
                                        <table id="tLista" style="padding-top: 16px;" class="stripe">
                                            <thead>
                                                <tr>
                                                    <td class="mini-title upper">#</td>
                                                    <td class="mini-title upper">Unidade</td>
                                                    <td class="mini-title upper">Cidade</td>
                                                    <td class="mini-title upper">Data Início</td>
                                                    <td class="mini-title upper">Data Fim</td>
                                                    <td class="mini-title upper">Ações</td>
                                                </tr>
                                            </thead>
                                            <tbody></tbody>
                                        </table>
                                </div>

                        <div id="lateral" class="suave">
                            <div class="overlay suave"></div>
                            <div id="criar" class="content suave">
                            <h4 class="barlow">Cadastrar Cce<i class="material-icons click suave fechar">close</i></h4>
                            <form id="form-criar" method="POST">
                                {{-- <input type="hidden" name="_token" value="{{csrf_token()}}"> --}}
                                <div class="metade esquerda">
                                    <label>Instituição</label>
                                     <select  name="instituicao_id" id="instituicao_id">
                                        @foreach ($instituicoes as $instituicao)
                                            <option value="{{ $instituicao->id }}">{{ $instituicao->nome_instituicao }}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="metade direita">
                                  <label for="">Data Início</label>
                                    <input type="text" class="data"  placeholder="Data de Inicio" name="data_inicio">
                                </div>
                                <div class="clear"></div>
                                <div class="metade esquerda">
                                    <label for="">Data Fim</label>
                                    <input type="text" class="data" placeholder="Data de Final" name="data_fim">
                                </div>
                                <div class="metade direita">
                                     <label for="">Data Documento</label>
                                        <input type="text" class="data" placeholder="Data de Final" name="data_doc">
                                </div>
                                <div class="metade esquerda">
                                     <label for="">Observação</label>
                                    <textarea placeholder="Sua observação" name="obs"></textarea>
                                </div>
                                {{-- <div class="add-setor click suave">Adicionar</div> --}}
                                <div class="clear"></div>
                                <button type="submit" class="click suave">Salvar <i class="material-icons">save</i></button>
                            </form>
                        </div>
                            <div id="editar" class="content suave">
                                <h4 class="barlow">Editar Cce<i class="material-icons click suave fechar">close</i></h4>
                                <form id="form-editar" method="post">
                                    <input type="hidden" name="e_id_cce" id="e_id_cce">
                                    <div class="metade esquerda">
                                        <label for="">Instituição</label>
                                        <input type="text" name="e_nome_instituicao" readonly>
                                        <input type="hidden" name="e_instituicao_id" id="e_instituicao_id">
                                    </div>
                                    <div class="metade direita">
                                        <label for="">Data Documento</label>
                                        <input type="text" class="data" name="e_data_doc" id="e_data_doc">
                                    </div>
                                    <div class="clear"></div>
                                    <div class="metade esquerda">
                                        <label for="">Data Ínicio</label>
                                        <input type="text" class="data" name="e_data_inicio" id="e_data_inicio">
                                    </div>
                                    <div class="metade direita">
                                        <label for="">Data Fim</label>
                                        <input type="text" class="data" name="e_data_fim" id="e_data_fim">
                                    </div>
                                    <div class="metade esquerda">
                                        <label>Sua observação</label>
                                        <textarea name="e_obs" id="e_obs"></textarea>
                                    </div>
                                    <div class="clear"></div>
                                    <button type="submit" class="click suave">Salvar <i class="material-icons">save</i></button>
                                </form>
                            </div>
                        {{-- </div> --}}
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
                url: 'cce-lista',
                dataSrc: ''
            },
            columns: [
                {data: 'id_cce', width: "60px", className: 'dt-body-center dt-head-center'},
                {data: 'instituicao.nome_instituicao', width: "300px"},
                {data: 'instituicao.cidade', width: "200px", className: 'dt-body-center dt-head-center'},
                {data: 'data_inicio', width: "200px", className: 'dt-body-center dt-head-center'},
                {data: 'data_fim', width: "200px", className: 'dt-body-center dt-head-center'},
                {data: 'acoes', width: "80px", className: 'dt-body-center dt-head-center'}
            ],
            columnDefs: [
                {
                    targets: -1,
                    width: "80px",
                    className: 'dt-body-center dt-head-center',
                    data: null,
                    defaultContent: '<i class="material-icons click suave editar">create</i><i class="material-icons click suave deletar">delete</i><i class="material-icons click imp-cce">print</i>'
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

         $(document).on("click", ".imp-cce", function(){
               var url = ("cce-pdf");
               var data = table.row($(this).parents("tr")).data();
               window.open(url +'/'+data.id_cce);
        });
         $(document).on("click", ".editar", function(){
            var data = table.row($(this).parents("tr")).data();
            $("#lateral, #editar").addClass("active");
            $("#editar #e_id_cce").val(data.id_cce);
            consultar(data.id_cce);
        });
        var delete_id;
        $(document).on("click", ".deletar", function(){
            delete_id = table.row($(this).parents("tr")).data();
            $("#alerta p").empty();
            $("#alerta p").text("Deseja realmente deletar este Cce?");
            $("#alerta .opcoes").removeClass("hide");
            $("#alerta").addClass("active");
        });
        $("#alerta .confirmar").click(function(){
            $(this).prop('disabled', true);
            deletar(delete_id.id_cce);
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
                url: 'cce',
                data: form,
                type: 'post',
                contentType: false,
                processData: false,
                error: function(){
                    criaAlerta(0, "Falha ao criar Cce!",2000);
                }
            });
            request.done(function(response){
                if(response == "1"){
                    $("#lateral, #lateral .content").removeClass("active");
                    $("#form-criar")[0].reset();
                    $("#form-criar button").prop('disabled', false);
                    criaAlerta(0, "Cce criado!",5000);
                    recarregar();
                }
            });
        }

        function consultar(id){
            request = $.ajax({
                url: 'cce/' + id,
                type: 'get',
                error: function(){
                    criaAlerta(0,"Falha na consulta!",2000);
                }
            });
            request.done(function(response){
                $('#form-editar input[name="e_id_cce"]').val(response.id_cce);
                $('#form-editar input[name="e_nome_instituicao"]').val(response.instituicao.nome_instituicao);
                $('#form-editar input[name="e_instituicao_id"]').val(response.instituicao_id);
                $('#form-editar input[name="e_data_inicio"]').val(response.data_inicio);
                $('#form-editar input[name="e_data_fim"]').val(response.data_fim);
                $('#form-editar input[name="e_data_doc"]').val(response.data_doc);
                $('#form-editar input[name="e_obs"]').val(response.obs);
            });
        }

        function editar(){
            var form = new FormData($("#form-editar")[0]);
            request = $.ajax({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                url: 'cce',
                data: form,
                type: 'post',
                contentType: false,
                processData: false,
                error: function(){
                    criaAlerta(0,"Falha ao editar Cce!",2000);
                }
            });
            request.done(function(response){
                if(response == "2"){
                    $("#lateral, #lateral .content").removeClass("active");
                    $("#form-editar")[0].reset();
                    $("#form-editar button").prop('disabled', false);
                    criaAlerta(0, "Cce atualizado!",5000);
                    recarregar();
                }
            });
        }

        function deletar(id){
            request = $.ajax({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                url: 'cce/' + id,
                type: 'delete',
                error: function(){
                    criaAlerta(0, "Falha ao deletar Cce!",2000);
                }
            });
            request.done(function(response){
                if(response == "1"){
                    $("#alerta .opcoes").addClass("hide");
                    $("#alerta p").text("Cce deletado!");
                    $("#alerta .confirmar").prop('disabled', false);
                    setTimeout(function(){
                        $("#alerta").removeClass("active");
                    }, 2000);
                    recarregar();
                }
            });
        }
</script>
@endsection
