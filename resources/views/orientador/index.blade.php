@extends('layout/app-new')
@section('titulo','Lista de Orientadores - Listagem | RH MAIS')
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
                                <h2>Orientadores - Listagem</h2>
                                <div class="clearfix"></div>
                                </div>
                                <div class="x_content">
                                    <div id="modulo">
                                        <table id="tLista" style="padding-top: 16px;" class="stripe">
                                            <thead>
                                                <tr>
                                                    <td class="mini-title upper">#</td>
                                                    <td class="mini-title upper">Nome</td>
                                                    <td class="mini-title upper">CPF</td>
                                                    <td class="mini-title upper">RG</td>
                                                    <td class="mini-title upper">Cidade</td>
                                                    <td class="mini-title upper">Instituição</td>
                                                    <td class="mini-title upper">Ações</td>
                                                </tr>
                                            </thead>
                                            <tbody></tbody>
                                        </table>
                                </div>

                        <div id="lateral" class="suave">
                            <div class="overlay suave"></div>
                            <div id="criar" class="content suave">
                            <h4 class="barlow">Cadastrar Orientador<i class="material-icons click suave fechar">close</i></h4>
                            <form id="form-criar" method="POST">
                                {{-- <input type="hidden" name="_token" value="{{csrf_token()}}"> --}}
                                <div class="metade esquerda">
                                    <label>Nome</label>
                                    <input type="text" placeholder="Orientador" name="nome" id="nome">
                                </div>
                                <div class="metade direita">
                                    <label>CPF</label>
                                    <input type="text" placeholder="CPF" name="cpf" id="cpf" class="cpf">
                                </div>
                                <div class="clear"></div>
                                <div class="metade esquerda">
                                    <label>RG</label>
                                    <input type="text" placeholder="RG" name="rg" id="rg" class="rg">
                                </div>
                                <div class="metade direita">
                                    <label>Estado</label>
                                   <select name="estado" id="estado">
                                        <option value="Acre">Acre</option>
                                        <option value="Alagoas">Alagoas</option>
                                        <option value="Amapá">Amapá</option>
                                        <option value="Amazonas">Amazonas</option>
                                        <option value="Bahia">Bahia</option>
                                        <option value="Ceará">Ceará</option>
                                        <option value="Distrito Federal">Distrito Federal</option>
                                        <option value="Espírito Santo">Espírito Santo</option>
                                        <option value="Goiás">Goiás</option>
                                        <option value="Maranhão">Maranhão</option>
                                        <option value="Mato Grosso">Mato Grosso</option>
                                        <option value="Mato Grosso do Sul">Mato Grosso do Sul</option>
                                        <option value="Mina Gerais">Minas Gerais</option>
                                        <option value="Pará">Pará</option>
                                        <option value="Para Paraíba">Paraíba</option>
                                        <option value="Paraná">Paraná</option>
                                        <option value="Pernambuco">Pernambuco</option>
                                        <option value="Piauí">Piauí</option>
                                        <option value="Rio de Janeiro">Rio de Janeiro</option>
                                        <option value="Rio Grande do Norte">Rio Grande do Norte</option>
                                        <option value="Rio Grande do Sul">Rio Grande do Sul</option>
                                        <option value="Rondônia">Rondônia</option>
                                        <option value="Roraima">Roraima</option>
                                        <option value="Santa Catarina">Santa Catarina</option>
                                        <option value="São Paulo">São Paulo</option>
                                        <option value="Sergipe">Sergipe</option>
                                        <option value="Tocantins">Tocantins</option>
                                    </select>
                                </div>
                                <div class="clear"></div>
                                  <div class="metade esquerda">
                                    <label>Cidade</label>
                                    <input type="text" placeholder="Cidade" name="cidade" id="cidade">
                                </div>
                                 <div class="metade direita">
                                    <label>Número</label>
                                    <input type="text" placeholder="Número" name="numero" id="numero" maxlength="10">
                                </div>
                                <div class="clear"></div>
                                <div class="metade esquerda">
                                    <label>Instituição</label>
                                   <select name="instituicao_id" id="instituicao_id">
                                        <option>Instituição</option>
                                        @foreach ($instituicoes as $instituicao)
                                            <option value="{{ $instituicao->id_instituicao }}">
                                                {{ $instituicao->nome_instituicao }}
                                            </option>
                                        @endforeach
                                    </select>
                                </div>
                                 <div class="metade direita">
                                    <label>Endereço</label>
                                    <input type="text" placeholder="Endereço" name="rua" id="rua">
                                </div>
                                <div class="clear"></div>
                                 <div class="metade esquerda">
                                    <label>CEP</label>
                                    <input type="text" placeholder="CEP" name="cep" id="cep" class="cep">
                                </div>
                                 <div class="metade direita">
                                    <label>Complemento</label>
                                    <input type="text" placeholder="Complemento" name="complemento" id="complemento">
                                </div>
                                <div class="clear"></div>
                                 <div class="metade esquerda">
                                    <label>Bairro</label>
                                    <input type="text" placeholder="Bairro" name="bairro" id="bairro">
                                </div>
                                 <div class="metade direita">
                                    <label>Telefone</label>
                                    <input type="text" placeholder="Telefone" name="telefone" id="telefone" class="telefone">
                                </div>
                                <div class="clear"></div>
                                 <div class="metade esquerda">
                                    <label>Celular</label>
                                    <input type="text" placeholder="Celular" name="celular" id="celular" class="telefone">
                                </div>
                                 <div class="metade direita">
                                    <label>E-mail</label>
                                    <input type="email" placeholder="E-mail" name="email" id="email">
                                </div>
                                <div class="clear"></div>
                                 <div class="metade esquerda">
                                    <label>Cargo</label>
                                    <input type="text" placeholder="Cargo" name="cargo" id="cargo">
                                </div>
                                {{-- <div class="add-setor click suave">Adicionar</div> --}}
                                 <div class="metade direita">
                                    <label>Formação</label>
                                    <input type="text" placeholder="Formação" name="formacao" id="formcao">
                                </div>
                                {{-- <div class="add-setor click suave">Adicionar</div> --}}
                                <div class="clear"></div>
                                <button type="submit" class="click suave">Salvar <i class="material-icons">save</i></button>
                            </form>
                        </div>
                            <div id="editar" class="content suave">
                                <h4 class="barlow">Editar Orientador<i class="material-icons click suave fechar">close</i></h4>
                                <form id="form-editar" method="post">
                                    <input type="hidden" name="e_id_orientador" id="e_id_orientador" value="">
                                    <div class="metade esquerda">
                                    <label>Nome</label>
                                    <input type="text" placeholder="Orientador" name="e_nome" id="e_nome">
                                </div>
                                <div class="metade direita">
                                    <label>CPF</label>
                                    <input type="text" placeholder="CPF" name="e_cpf" id="e_cpf" class="cpf">
                                </div>
                                <div class="clear"></div>
                                <div class="metade esquerda">
                                    <label>RG</label>
                                    <input type="text" placeholder="RG" name="e_rg" id="e_rg" class="rg">
                                </div>
                                <div class="metade direita">
                                    <label>Estado</label>
                                   <select name="e_estado" id="e_estado">
                                        <option value="Acre">Acre</option>
                                        <option value="Alagoas">Alagoas</option>
                                        <option value="Amapá">Amapá</option>
                                        <option value="Amazonas">Amazonas</option>
                                        <option value="Bahia">Bahia</option>
                                        <option value="Ceará">Ceará</option>
                                        <option value="Distrito Federal">Distrito Federal</option>
                                        <option value="Espírito Santo">Espírito Santo</option>
                                        <option value="Goiás">Goiás</option>
                                        <option value="Maranhão">Maranhão</option>
                                        <option value="Mato Grosso">Mato Grosso</option>
                                        <option value="Mato Grosso do Sul">Mato Grosso do Sul</option>
                                        <option value="Mina Gerais">Minas Gerais</option>
                                        <option value="Pará">Pará</option>
                                        <option value="Para Paraíba">Paraíba</option>
                                        <option value="Paraná">Paraná</option>
                                        <option value="Pernambuco">Pernambuco</option>
                                        <option value="Piauí">Piauí</option>
                                        <option value="Rio de Janeiro">Rio de Janeiro</option>
                                        <option value="Rio Grande do Norte">Rio Grande do Norte</option>
                                        <option value="Rio Grande do Sul">Rio Grande do Sul</option>
                                        <option value="Rondônia">Rondônia</option>
                                        <option value="Roraima">Roraima</option>
                                        <option value="Santa Catarina">Santa Catarina</option>
                                        <option value="São Paulo">São Paulo</option>
                                        <option value="Sergipe">Sergipe</option>
                                        <option value="Tocantins">Tocantins</option>
                                    </select>
                                </div>
                                <div class="clear"></div>
                                  <div class="metade esquerda">
                                    <label>Cidade</label>
                                    <input type="text" placeholder="Cidade" name="e_cidade" id="e_cidade">
                                </div>
                                 <div class="metade direita">
                                    <label>Número</label>
                                    <input type="text" placeholder="Número" name="e_numero" id="e_numero" maxlength="10">
                                </div>
                                <div class="clear"></div>
                                <div class="metade esquerda">
                                    <label>Instituição</label>
                                   {{-- <select name="e_instituicao_id" id="e_instituicao_id">
                                        <option>Instituição</option>
                                        @foreach ($instituicoes as $instituicao)
                                            <option value="{{ $instituicao->id_instituicao }}">
                                                {{ $instituicao->nome_instituicao }}
                                            </option>
                                        @endforeach
                                    </select> --}}
                                    <input type="text" name="e_nome_instituicao" id="e_nome_instituicao" readonly>
                                     <input type="hidden" name="e_instituicao_id" id="e_instituicao_id" value="">
                                </div>
                                 <div class="metade direita">
                                    <label>Endereço</label>
                                    <input type="text" placeholder="Endereço" name="e_rua" id="e_rua">
                                </div>
                                <div class="clear"></div>
                                 <div class="metade esquerda">
                                    <label>CEP</label>
                                    <input type="text" placeholder="CEP" name="e_cep" id="e_cep" class="cep">
                                </div>
                                 <div class="metade direita">
                                    <label>Complemento</label>
                                    <input type="text" placeholder="Complemento" name="e_complemento" id="e_complemento">
                                </div>
                                <div class="clear"></div>
                                 <div class="metade esquerda">
                                    <label>Bairro</label>
                                    <input type="text" placeholder="Bairro" name="e_bairro" id="e_bairro">
                                </div>
                                 <div class="metade direita">
                                    <label>Telefone</label>
                                    <input type="text" placeholder="Telefone" name="e_telefone" id="e_telefone" class="telefone">
                                </div>
                                <div class="clear"></div>
                                 <div class="metade esquerda">
                                    <label>Celular</label>
                                    <input type="text" placeholder="Celular" name="e_celular" id="e_celular" class="telefone">
                                </div>
                                 <div class="metade direita">
                                    <label>E-mail</label>
                                    <input type="email" placeholder="E-mail" name="e_email" id="e_email">
                                </div>
                                <div class="clear"></div>
                                 <div class="metade esquerda">
                                    <label>Cargo</label>
                                    <input type="text" placeholder="Cargo" name="e_cargo" id="e_cargo">
                                </div>
                                {{-- <div class="add-setor click suave">Adicionar</div> --}}
                                 <div class="metade direita">
                                    <label>Formação</label>
                                    <input type="text" placeholder="Formação" name="e_formacao" id="e_formcao">
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
                url: 'orientador-lista',
                dataSrc: ''
            },
            columns: [
                {data: 'id_orientador', width: "60px", className: 'dt-body-center dt-head-center'},
                {data: 'nome_orientador', width: "400px"},
                {data: 'cpf', width: "200px", className: 'dt-body-center dt-head-center'},
                {data: 'rg', width: "200px", className: 'dt-body-center dt-head-center'},
                {data: 'cidade', width: "200px", className: 'dt-body-center dt-head-center'},
                {data: 'instituicao.nome_instituicao', width: "200px", className: 'dt-body-center dt-head-center'},
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
            $("#editar #e_id_orientador").val(data.id_orientador);
            consultar(data.id_orientador);
        });
        var delete_id;
        $(document).on("click", ".deletar", function(){
            delete_id = table.row($(this).parents("tr")).data();
            $("#alerta p").empty();
            $("#alerta p").text("Deseja realmente deletar esta orientador?");
            $("#alerta .opcoes").removeClass("hide");
            $("#alerta").addClass("active");
        });
        $("#alerta .confirmar").click(function(){
            $(this).prop('disabled', true);
            deletar(delete_id.id_orientador);
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
                url: 'orientador',
                data: form,
                type: 'post',
                contentType: false,
                processData: false,
                error: function(){
                    criaAlerta(0, "Falha ao criar orientador!",2000);
                }
            });
            request.done(function(response){
                if(response == "1"){
                    $("#lateral, #lateral .content").removeClass("active");
                    $("#form-criar").reset();
                    $("#form-criar button").prop('disabled', false);
                    criaAlerta(0, "Orientador criado!",5000);
                    recarregar();
                }
            });
        }

        function consultar(id){
            request = $.ajax({
                url: 'orientador/' + id,
                type: 'get',
                error: function(){
                    criaAlerta(0,"Falha na consulta!",2000);
                }
            });
            request.done(function(response){
                $('#form-editar input[name="e_id_orientador"]').val(response.id_orientador);
                $('#form-editar input[name="e_nome"]').val(response.nome_orientador);
                $('#form-editar input[name="e_rg"]').val(response.rg);
                $('#form-editar input[name="e_cpf"]').val(response.cpf);
                $('#form-editar input[name="e_estado"]').val(response.estado);
                $('#form-editar input[name="e_cidade"]').val(response.cidade);
                $('#form-editar input[name="e_nome_instituicao"]').val(response.instituicao.nome_instituicao);
                $('#form-editar input[name="e_instituicao_id"]').val(response.instituicao_id);
                $('#form-editar input[name="e_rua"]').val(response.rua);
                $('#form-editar input[name="e_cep"]').val(response.cep);
                $('#form-editar input[name="e_complemento"]').val(response.complemento);
                $('#form-editar input[name="e_bairro"]').val(response.bairro);
                $('#form-editar input[name="e_numero"]').val(response.numero);
                $('#form-editar input[name="e_telefone"]').val(response.telefone);
                $('#form-editar input[name="e_celular"]').val(response.celular);
                $('#form-editar input[name="e_email"]').val(response.email);
                $('#form-editar input[name="e_cargo"]').val(response.cargo);
                $('#form-editar input[name="e_formacao"]').val(response.formacao);
            });
        }

        function editar(){
            var form = new FormData($("#form-editar"));
            request = $.ajax({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                url: 'orientador',
                data: form,
                type: 'post',
                contentType: false,
                processData: false,
                error: function(){
                    criaAlerta(0,"Falha ao editar orientador!",2000);
                }
            });
            request.done(function(response){
                if(response == "2"){
                    $("#lateral, #lateral .content").removeClass("active");
                    $("#form-editar").reset();
                    $("#form-editar button").prop('disabled', false);
                    criaAlerta(0, "Orientador atualizado!",5000);
                    recarregar();
                }
            });
        }

        function deletar(id){
            request = $.ajax({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                url: 'orientador/' + id,
                type: 'delete',
                error: function(){
                    criaAlerta(0, "Falha ao deletar orientador!",2000);
                }
            });
            request.done(function(response){
                if(response == "1"){
                    $("#alerta .opcoes").addClass("hide");
                    $("#alerta p").text("Orientador deletado!");
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
