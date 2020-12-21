@extends('layout/app-new')
@section('titulo','Benefício - Listagem | RH MAIS')
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
                                <h2>Benefício - Listagem</h2>
                                <div class="clearfix"></div>
                                </div>
                                <div class="x_content">
                                    <div id="modulo">
                                        <table id="tLista" style="padding-top: 16px;" class="stripe">
                                            <thead>
                                                <tr>
                                                    <td class="mini-title upper">#</td>
                                                    <td class="mini-title upper">Nome do beneficio</td>
                                                    <td class="mini-title upper">Sigla</td>
                                                    <td class="mini-title upper">Tipo</td>
                                                    <td class="mini-title upper">Ações</td>
                                                </tr>
                                            </thead>
                                            <tbody></tbody>
                                        </table>
                                </div>

                        <div id="lateral" class="suave">
                            <div class="overlay suave"></div>
                            <div id="criar" class="content suave">
                            <h4 class="barlow">Cadastrar Benefício<i class="material-icons click suave fechar">close</i></h4>
                            <form id="form-criar" method="POST">
                                {{-- <input type="hidden" name="_token" value="{{csrf_token()}}"> --}}
                                <div class="metade esquerda">
                                    <label>Nome do benefício</label>
                                    <input type="text" placeholder="Nome do beneficio" name="nome_beneficio" id="nome_beneficio">
                                </div>
                                <div class="metade direita">
                                       <label>Sigla</label>
                                    <input type="text" placeholder="Sigla" name="sigla" id="sigla">
                                </div>
                                <div class="clear"></div>
                                <div class="metade esquerda">
                                      <label>Tipo</label>
                                    <select name="tipo" id="">
                                        <option value="1">Crédito</option>
                                        <option value="2">Débito</option>
                                    </select>
                                </div>
                                {{-- <div class="add-setor click suave">Adicionar</div> --}}
                                <div class="clear"></div>
                                <button type="submit" class="click suave">Salvar <i class="material-icons">save</i></button>
                            </form>
                        </div>
                            <div id="editar" class="content suave">
                                <h4 class="barlow">Editar Benefício<i class="material-icons click suave fechar">close</i></h4>
                                <form id="form-editar" method="post">
                                    <input type="hidden" name="e_id_beneficio" id="e_id_beneficio" value="">
                                    <div class="metade esquerda">
                                        <label>Nome benefício</label>
                                        <input type="text" name="e_nome_beneficio" id="e_nome_beneficio" placeholder="Nome do beneficio" required>
                                    </div>
                                    <div class="metade direita">
                                          <label>Sigla</label>
                                        <input type="text" name="e_sigla" id="e_sigla" placeholder="Sigla" required>
                                    </div>
                                    <div class="clear"></div>
                                    <div class="metade esquerda">
                                          <label>Tipo</label>
                                        <select name="e_tipo" id="">
                                            <option value="1">Crédito</option>
                                            <option value="2">Débito</option>
                                        </select>
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
                url: 'beneficio-lista',
                dataSrc: ''
            },
            columns: [
                {data: 'id_beneficio', width: "60px", className: 'dt-body-center dt-head-center'},
                {data: 'nome_beneficio', width: "300px"},
                {data: 'sigla', width: "200px", className: 'dt-body-center dt-head-center'},
                {data: null, width: "200px", className: 'dt-body-center dt-head-center',
                     render: function ( data, type, row ) {
                        if(row.tipo == '1'){
                            return "Crédito";
                        }else{
                            return "Débito"
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
            $("#editar #e_id_beneficio").val(data.id_beneficio);
            consultar(data.id_beneficio);
        });
        var delete_id;
        $(document).on("click", ".deletar", function(){
            delete_id = table.row($(this).parents("tr")).data();
            $("#alerta p").empty();
            $("#alerta p").text("Deseja realmente deletar este beneficio?");
            $("#alerta .opcoes").removeClass("hide");
            $("#alerta").addClass("active");
        });
        $("#alerta .confirmar").click(function(){
            $(this).prop('disabled', true);
            deletar(delete_id.id_beneficio);
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
                url: 'beneficio',
                data: form,
                type: 'post',
                contentType: false,
                processData: false,
                error: function(){
                    criaAlerta(0, "Falha ao criar beneficio!",2000);
                }
            });
            request.done(function(response){
                if(response == "1"){
                    $("#lateral, #lateral .content").removeClass("active");
                    $("#form-criar")[0].reset();
                    $("#form-criar button").prop('disabled', false);
                    criaAlerta(0, "beneficio criado!",5000);
                    recarregar();
                }
            });
        }

        function consultar(id){
            request = $.ajax({
                url: 'beneficio/' + id,
                type: 'get',
                error: function(){
                    criaAlerta(0,"Falha na consulta!",2000);
                }
            });
            request.done(function(response){
                $('#form-editar input[name="e_id_beneficio"]').val(response.id_beneficio);
                $('#form-editar input[name="e_nome_beneficio"]').val(response.nome_beneficio);
                $('#form-editar input[name="e_sigla"]').val(response.sigla);
                $('#form-editar input[name="e_tipo"]').val(response.tipo);
            });
        }

        function editar(){
            var form = new FormData($("#form-editar")[0]);
            request = $.ajax({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                url: 'beneficio',
                data: form,
                type: 'post',
                contentType: false,
                processData: false,
                error: function(){
                    criaAlerta(0,"Falha ao editar beneficio!",2000);
                }
            });
            request.done(function(response){
                if(response == "2"){
                    $("#lateral, #lateral .content").removeClass("active");
                    $("#form-editar")[0].reset();
                    $("#form-editar button").prop('disabled', false);
                    criaAlerta(0, "Benefício atualizado!",5000);
                    recarregar();
                }
            });
        }

        function deletar(id){
            request = $.ajax({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                url: 'beneficio/' + id,
                type: 'delete',
                error: function(){
                    criaAlerta(0, "Falha ao deletar benefício!",2000);
                }
            });
            request.done(function(response){
                if(response == "1"){
                    $("#alerta .opcoes").addClass("hide");
                    $("#alerta p").text("beneficio deletado!");
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
