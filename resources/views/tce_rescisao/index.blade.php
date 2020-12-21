@extends('layout/app-new')
@section('titulo', 'Rescisão do TCE - Agente de Integração (GTR-AI) | RH MAIS')

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
                                <h2> Rescisão do TCE - Agente de Integração (GTR-AI)</h2>
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
                                                    {{-- <td class="mini-title upper">Contrato</td> --}}
                                                    {{-- <td class="mini-title upper">Situação</td> --}}
                                                    <td class="mini-title upper">Ações</td>
                                                </tr>
                                            </thead>
                                            <tbody></tbody>
                                        </table>
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
                url: 'tceRescisao-lista',
                dataSrc: ''
            },
            columns: [
                {data: 'id_tce_rescisao', width: "60px", className: 'dt-body-center dt-head-center'},
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
                {data: 'acoes', width: "80px", className: 'dt-body-center dt-head-center'}
            ],
            columnDefs: [
                {
                    targets: -1,
                    width: "80px",
                    className: 'dt-body-center dt-head-center',
                    data: null,
                    defaultContent: '<i class="material-icons click imp-resc">print</i>'
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

        $(document).on("click", ".imp-resc", function(){
               var url = ("rescisao-pdf");
               var data = table.row($(this).parents("tr")).data();
               window.open(url +'/'+data.id_tce_rescisao);
        });

    }carregar();

    function recarregar(){
        table.ajax.reload();
    }
</script>
@endsection
