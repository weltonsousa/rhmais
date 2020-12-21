@extends('layout/app-new')
@section('titulo','Motivo - Listagem | RH MAIS')
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
                                <h2>Motivo - Listagem</h2>
                                <div class="clearfix"></div>
                                </div>
                                <div class="x_content">
                                    <div id="modulo">
                                        <table id="tLista" style="padding-top: 16px;" class="stripe">
                                            <thead>
                                                <tr>
                                                    <td class="mini-title upper">#</td>
                                                    <td class="mini-title upper">Descrição do Nome do Motivo</td>
                                                    <td class="mini-title upper">Descrição do Motivo</td>
                                                    <td class="mini-title upper">Ações</td>
                                                </tr>
                                            </thead>
                                            <tbody></tbody>
                                        </table>
                                </div>

                        <div id="lateral" class="suave">
                            <div class="overlay suave"></div>
                            <div id="criar" class="content suave">
                            <h4 class="barlow">Cadastrar Motivo<i class="material-icons click suave fechar">close</i></h4>
                            <form id="form-criar" method="POST">
                                {{-- <input type="hidden" name="_token" value="{{csrf_token()}}"> --}}
                                <div class="metade esquerda">
                                    <label>Nome do Motivo</label>
                                    <input type="text" placeholder="Nome do motivo" name="nome" id="nome">
                                </div>
                                <div class="metade direita">
                                    <label>Motivo</label>
                                    <input type="text" placeholder="Nome do motivo" name="descricao" id="descricao">
                                </div>
                                {{-- <div class="add-setor click suave">Adicionar</div> --}}
                                <div class="clear"></div>
                                <button type="submit" class="click suave">Salvar <i class="material-icons">save</i></button>
                            </form>
                        </div>
                            <div id="editar" class="content suave">
                                <h4 class="barlow">Editar Motivo<i class="material-icons click suave fechar">close</i></h4>
                                <form id="form-editar" method="post">
                                    <input type="hidden" name="e_id_motivo" id="e_id_motivo" value="">
                                    <div class="metade esquerda">
                                        <label>Nome Motivo</label>
                                        <input type="text" name="e_nome" id="e_nome" placeholder="Nome do Motivo" required>
                                    </div>
                                    <div class="metade direita">
                                        <label>Descricao</label>
                                        <input type="text" name="e_descricao" id="e_descricao" placeholder="Nome da Descrição" required>
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
                url: 'motivo-lista',
                dataSrc: ''
            },
            columns: [
                {data: 'id_motivo', width: "60px", className: 'dt-body-center dt-head-center'},
                {data: 'nome_motivo', width: "300px"},
                {data: 'descricao', width: "200px", className: 'dt-body-center dt-head-center'},
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
            $("#editar #e_id_motivo").val(data.id_motivo);
            consultar(data.id_motivo);
        });
        var delete_id;
        $(document).on("click", ".deletar", function(){
            delete_id = table.row($(this).parents("tr")).data();
            $("#alerta p").empty();
            $("#alerta p").text("Deseja realmente deletar este motivo?");
            $("#alerta .opcoes").removeClass("hide");
            $("#alerta").addClass("active");
        });
        $("#alerta .confirmar").click(function(){
            $(this).prop('disabled', true);
            deletar(delete_id.id_motivo);
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
                url: 'motivo',
                data: form,
                type: 'post',
                contentType: false,
                processData: false,
                error: function(){
                    criaAlerta(0, "Falha ao criar motivo!",2000);
                }
            });
            request.done(function(response){
                if(response == "1"){
                    $("#lateral, #lateral .content").removeClass("active");
                    $("#form-criar")[0].reset();
                    $("#form-criar button").prop('disabled', false);
                    criaAlerta(0, "Motivo criado!",5000);
                    recarregar();
                }
            });
        }

        function consultar(id){
            request = $.ajax({
                url: 'motivo/' + id,
                type: 'get',
                error: function(){
                    criaAlerta(0,"Falha na consulta!",2000);
                }
            });
            request.done(function(response){
                $('#form-editar input[name="e_id_motivo"]').val(response.id_motivo);
                $('#form-editar input[name="e_nome"]').val(response.nome_motivo);
                $('#form-editar input[name="e_descricao"]').val(response.descricao);
            });
        }

        function editar(){
            var form = new FormData($("#form-editar")[0]);
            request = $.ajax({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                url: 'motivo',
                data: form,
                type: 'post',
                contentType: false,
                processData: false,
                error: function(){
                    criaAlerta(0,"Falha ao editar motivo!",2000);
                }
            });
            request.done(function(response){
                if(response == "2"){
                    $("#lateral, #lateral .content").removeClass("active");
                    $("#form-editar")[0].reset();
                    $("#form-editar button").prop('disabled', false);
                    criaAlerta(0, "Motivo atualizado!",5000);
                    recarregar();
                }
            });
        }

        function deletar(id){
            request = $.ajax({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                url: 'motivo/' + id,
                type: 'delete',
                error: function(){
                    criaAlerta(0, "Falha ao deletar motivo!",2000);
                }
            });
            request.done(function(response){
                if(response == "1"){
                    $("#alerta .opcoes").addClass("hide");
                    $("#alerta p").text("Motivo deletado!");
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
