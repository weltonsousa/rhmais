@extends('layout/app-new')
@section('titulo','Horário de Estágio - Listagem | RH MAIS')
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
                                <h2>Horário - Listagem</h2>
                                <div class="clearfix"></div>
                                </div>
                                <div class="x_content">
                                    <div id="modulo">
                                        <table id="tLista" style="padding-top: 16px;" class="stripe">
                                            <thead>
                                                <tr>
                                                    <td class="mini-title upper">#</td>
                                                    <td class="mini-title upper">Drecrição do horário</td>
                                                    <td class="mini-title upper">Qtd. Horas</td>
                                                    <td class="mini-title upper">Unidade</td>
                                                    <td class="mini-title upper">Ações</td>
                                                </tr>
                                            </thead>
                                            <tbody></tbody>
                                        </table>
                                </div>

                        <div id="lateral" class="suave">
                            <div class="overlay suave"></div>
                            <div id="criar" class="content suave">
                            <h4 class="barlow">Cadastrar Horário<i class="material-icons click suave fechar">close</i></h4>
                            <form id="form-criar" method="POST">
                                {{-- <input type="hidden" name="_token" value="{{csrf_token()}}"> --}}
                                <div class="metade esquerda">
                                    <label>Horário</label>
                                    <input type="text" placeholder="Horário" name="descricao" id="descricao">
                                </div>
                                <div class="metade direita">
                                    <label>Quantidade de horas</label>
                                    <input type="text" placeholder="Qtd. Horas" name="qtd_horas" id="qtd_horas">
                                </div>
                                <div class="clear"></div>
                                <div class="metade esquerda">
                                    <label>Unidade</label>
                                   <select name="empresa_id" id="empresa_id">
                                        <option>Unidade</option>
                                        @foreach ($empresas as $empresa)
                                            <option value="{{ $empresa->id_empresa }}">
                                                {{ $empresa->nome_fantasia }}
                                            </option>
                                        @endforeach
                                    </select>
                                </div>
                                {{-- <div class="add-setor click suave">Adicionar</div> --}}
                                <div class="clear"></div>
                                <button type="submit" class="click suave">Salvar <i class="material-icons">save</i></button>
                            </form>
                        </div>
                            <div id="editar" class="content suave">
                                <h4 class="barlow">Editar Horário<i class="material-icons click suave fechar">close</i></h4>
                                <form id="form-editar" method="post">
                                    <input type="hidden" name="e_id_horario" id="e_id_horario" value="">
                                    <div class="metade esquerda">
                                        <label>Descrição</label>
                                        <input type="text" name="e_descricao" id="e_descricao" placeholder="Descrição" required>
                                    </div>
                                    <div class="metade direita">
                                        <label>Qtd. Horas</label>
                                        <input type="text" name="e_qtd_horas" id="e_qtd_horas" placeholder="Qtd. Horas" required>
                                    </div>
                                    <div class="clear"></div>
                                    <div class="metade esquerda">
                                        <label>Unidade</label>
                                        <input type="text" name="e_unidade" id="e_unidade" readonly>
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
                url: 'horario-lista',
                dataSrc: ''
            },
            columns: [
                {data: 'id_horario', width: "60px", className: 'dt-body-center dt-head-center'},
                {data: 'descricao', width: "400px"},
                {data: 'qtd_horas', width: "200px", className: 'dt-body-center dt-head-center'},
                {data: 'empresa.nome_fantasia', width: "200px", className: 'dt-body-center dt-head-center'},
                {data: 'acoes', width: "80px", className: 'dt-body-center dt-head-center'}
            ],
            columnDefs: [
                {
                    targets: -1,
                    width: "80px",
                    className: 'dt-body-center dt-head-center',
                    data: null,
                    defaultContent: '<i class="material-icons click suave editar">create</i><i class="material-icons click suave deletar">delete</i>'
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

         $(document).on("click", ".editar", function(){
            var data = table.row($(this).parents("tr")).data();
            $("#lateral, #editar").addClass("active");
            $("#editar #e_id_horario").val(data.id_horario);
            consultar(data.id_horario);
        });
        var delete_id;
        $(document).on("click", ".deletar", function(){
            delete_id = table.row($(this).parents("tr")).data();
            $("#alerta p").empty();
            $("#alerta p").text("Deseja realmente deletar esta horario?");
            $("#alerta .opcoes").removeClass("hide");
            $("#alerta").addClass("active");
        });
        $("#alerta .confirmar").click(function(){
            $(this).prop('disabled', true);
            deletar(delete_id.id_horario);
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
            var form = new FormData($("#form-criar"));
            request = $.ajax({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                url: 'horario',
                data: form,
                type: 'post',
                contentType: false,
                processData: false,
                error: function(){
                    criaAlerta(0, "Falha ao criar horario!",2000);
                }
            });
            request.done(function(response){
                if(response == "1"){
                    $("#lateral, #lateral .content").removeClass("active");
                    $("#form-criar").reset();
                    $("#form-criar button").prop('disabled', false);
                    criaAlerta(0, "Horário criado!",5000);
                    recarregar();
                }
            });
        }

        function consultar(id){
            request = $.ajax({
                url: 'horario/' + id,
                type: 'get',
                error: function(){
                    criaAlerta(0,"Falha na consulta!",2000);
                }
            });
            request.done(function(response){
                $('#form-editar input[name="e_id_horario"]').val(response.id_horario);
                $('#form-editar input[name="e_descricao"]').val(response.descricao);
                $('#form-editar input[name="e_qtd_horas"]').val(response.qtd_horas);
                $('#form-editar input[name="e_unidade"]').val(response.empresa.nome_fantasia);
            });
        }

        function editar(){
            var form = new FormData($("#form-editar"));
            request = $.ajax({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                url: 'horario',
                data: form,
                type: 'post',
                contentType: false,
                processData: false,
                error: function(){
                    criaAlerta(0,"Falha ao editar horario!",2000);
                }
            });
            request.done(function(response){
                if(response == "2"){
                    $("#lateral, #lateral .content").removeClass("active");
                    $("#form-editar").reset();
                    $("#form-editar button").prop('disabled', false);
                    criaAlerta(0, "horario atualizado!",5000);
                    recarregar();
                }
            });
        }

        function deletar(id){
            request = $.ajax({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                url: 'horario/' + id,
                type: 'delete',
                error: function(){
                    criaAlerta(0, "Falha ao deletar horario!",2000);
                }
            });
            request.done(function(response){
                if(response == "1"){
                    $("#alerta .opcoes").addClass("hide");
                    $("#alerta p").text("horario deletado!");
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
</script>
@endsection
