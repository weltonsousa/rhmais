@extends('layout/app-new')
@section('titulo','Instituição de Ensino | RH MAIS')

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
                        {{-- @include('layout.alerta.flash-message') --}}
                            <div class="x_panel">
                                <div class="x_title" id="modulo">
                                <h3 class="barlow">
                                    <div class="click suave criar"><i class="material-icons">add_circle</i><span class="mini-title">Adicionar<span></div>
                                </h3>
                                <h2>Instituição de Ensino</h2>
                                <div class="clearfix"></div>
                                </div>
                                <div class="x_content">
                                    <div id="modulo">
                                        <table id="tLista" style="padding-top: 16px;" class="stripe">
                                            <thead>
                                                <tr>
                                                    <td class="mini-title upper">#</td>
                                                    <td class="mini-title upper">Nome</td>
                                                    <td class="mini-title upper">Complemento</td>
                                                    <td class="mini-title upper">Cidade</td>
                                                    <td class="mini-title upper">Endereço</td>
                                                    <td class="mini-title upper">CNPJ</td>
                                                    <td class="mini-title upper">Ações</td>
                                                </tr>
                                            </thead>
                                            <tbody></tbody>
                                        </table>
                                </div>

                        <div id="lateral" class="suave">
                            <div class="overlay suave"></div>
                            <div id="criar" class="content suave">
                            <h4 class="barlow">Cadastrar Instituição<i class="material-icons click suave fechar">close</i></h4>
                            <form id="form-criar" method="POST">
                                <div class="tab">
                                    <div class="metade esquerda">
                                        <label>CNPJ</label>
                                        <input type="text" placeholder="CNPJ" name="cnpj" id="cnpj" class="cnpj" oninput="this.className = ' ' ">
                                    </div>
                                    <div class="metade direita">
                                        <label>Razão Social</label>
                                        <input type="text" placeholder="Razão Social" name="razao_social" id="razao_social" oninput="this.className = ' ' ">
                                    </div>
                                     <div class="clear"></div>
                                    <div class="metade esquerda">
                                        <label>Instituição</label>
                                        <input type="text" placeholder="Instituição" name="nome_instituicao" id="nome_instituicao" oninput="this.className = ' ' ">
                                    </div>
                                    <div class="metade direita">
                                        <label>Mantenedora</label>
                                        <input type="text" placeholder="Mantenedora" name="mantenedora" id="mantenedora" oninput="this.className = ' ' ">
                                    </div>
                                     <div class="clear"></div>
                                    <div class="metade esquerda">
                                        <label>Insc. Estadual</label>
                                        <input type="text" placeholder="Insc. Estadual" name="insc_estadual" id="insc_estadual" class="numero" oninput="this.className = ' ' ">
                                    </div>
                                    <div class="metade direita">
                                        <label>Site</label>
                                        <input type="text" placeholder="Endereço Site" name="site_url" id="site_url" oninput="this.className = ' ' ">
                                    </div>
                                </div>
                                 <div class="clear"></div>
                                {{-- Etapa 2 --}}
                                <div class="tab">
                                    <div class="metade esquerda">
                                        <label>Estado</label>
                                        <select name="estado" id="estado" oninput="this.className = ' ' ">
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
                                  <div class="metade direita">
                                    <label>Cidade</label>
                                    <input type="text" placeholder="Cidade" name="cidade" id="cidade" oninput="this.className = ' ' ">
                                </div>
                                 <div class="clear"></div>
                                 <div class="metade esquerda">
                                    <label>Bairro</label>
                                    <input type="text" placeholder="Bairro" name="bairro" id="bairro" oninput="this.className = ' ' ">
                                </div>
                                 <div class="metade direita">
                                    <label>Endereço</label>
                                    <input type="text" placeholder="Endereço" name="rua" id="rua" oninput="this.className = ' ' ">
                                </div>
                                 <div class="clear"></div>
                                 <div class="metade esquerda">
                                    <label>Complemento</label>
                                    <input type="text" placeholder="Complemento" name="complemento" id="complemento" oninput="this.className = ' ' ">
                                </div>
                                 <div class="metade direita">
                                    <label>Número</label>
                                    <input type="text" placeholder="Número" name="numero" id="numero" maxlength="10" oninput="this.className = ' ' ">
                                </div>
                                 <div class="clear"></div>
                                 <div class="metade esquerda">
                                    <label>CEP</label>
                                    <input type="text" placeholder="CEP" name="cep" id="cep" class="cep" oninput="this.className = ' ' ">
                                </div>
                                 <div class="metade direita">
                                    <label>Telefone</label>
                                    <input type="text" placeholder="Telefone" name="telefone" id="telefone" class="telefone" oninput="this.className = ' ' ">
                                </div>
                                 <div class="clear"></div>
                             </div>
                                <div class="tab">
                                 <div class="metade esquerda">
                                    <label>Nome contato</label>
                                    <input type="text" placeholder="Nome Contato" name="nome_contato" id="nome_contato" oninput="this.className = ' ' ">
                                </div>
                                 <div class="metade direita">
                                    <label>Email Contato</label>
                                    <input type="email" placeholder="Email Contato" name="email_contato" id="email_contato" oninput="this.className = ' ' ">
                                </div>
                                 <div class="clear"></div>
                                 <div class="metade esquerda">
                                    <label>Celular Contato</label>
                                    <input type="text" placeholder="Celular Contato" name="celular_contato" id="celular_contato" class="telefone" oninput="this.className = ' ' ">
                                </div>
                                 <div class="metade direita">
                                    <label>Celular Representante</label>
                                    <input type="text" placeholder="Celular Representante" name="celular_rep" id="celular_rep" class="telefone" oninput="this.className = ' ' ">
                                </div>
                                 <div class="clear"></div>
                                 <div class="metade esquerda">
                                    <label>Nome Representante</label>
                                    <input type="text" placeholder="Nome Representante" name="nome_rep" id="nome_rep" oninput="this.className = ' ' ">
                                </div>
                                 <div class="metade direita">
                                    <label>Email Representante</label>
                                    <input type="email" placeholder="Email Representante" name="email_rep" id="email_rep" oninput="this.className = ' ' ">
                                </div>
                                 <div class="clear"></div>
                                 <div class="metade esquerda">
                                    <label>CPF Representante</label>
                                    <input type="text" placeholder="CPF Representante" name="cpf_rep" id="cpf_re"  class="cpf" oninput="this.className = ' ' ">
                                </div>
                                 <div class="metade direita">
                                    <label>RG Representante</label>
                                    <input type="text" placeholder="RG Representante" name="rg_rep" id="rg_rep" class="rg" oninput="this.className = ' ' ">
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
                                <span class="step"></span>
                                </div>
                            </form>
                        </div>
                            <div id="editar" class="content suave">
                                <h4 class="barlow">Editar Instituição<i class="material-icons click suave fechar">close</i></h4>
                                <form id="form-editar" method="post">
                                <div class="e_tab">
                                        <input type="hidden" name="e_id_instituicao" id="e_id_instituicao" value="">
                                    <div class="metade esquerda">
                                        <label>CNPJ</label>
                                        <input type="text" placeholder="CNPJ" name="e_cnpj" id="e_cnpj" class="cnpj" oninput="this.className = ' ' ">
                                    </div>
                                    <div class="metade direita">
                                        <label>Razão Social</label>
                                        <input type="text" placeholder="Razão Social" name="e_razao_social" id="e_razao_social" oninput="this.className = ' ' ">
                                    </div>
                                     <div class="clear"></div>
                                    <div class="metade esquerda">
                                        <label>Instituição</label>
                                        <input type="text" placeholder="Instituição" name="e_nome_instituicao" id="e_nome_instituicao" oninput="this.className = ' ' ">
                                    </div>
                                    <div class="metade direita">
                                        <label>Mantenedora</label>
                                        <input type="text" placeholder="Mantenedora" name="e_mantenedora" id="e_mantenedora" oninput="this.className = ' ' ">
                                    </div>
                                     <div class="clear"></div>
                                    <div class="metade esquerda">
                                        <label>Insc. Estadual</label>
                                        <input type="text" placeholder="Insc. Estadual" name="e_insc_estadual" id="e_e_insc_estadual" oninput="this.className = ' ' ">
                                    </div>
                                    <div class="metade direita">
                                        <label>Site</label>
                                        <input type="text" placeholder="Site" name="e_site_url" id="e_site_url" oninput="this.className = ' ' ">
                                    </div>
                                     <div class="clear"></div>
                                {{-- </div> --}}
                                    <div class="metade esquerda">
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
                                     <div class="metade direita">
                                        <label>Cidade</label>
                                        <input type="text" placeholder="Cidade" name="e_cidade" id="e_cidade" oninput="this.className = ' ' ">
                                    </div>
                                     <div class="clear"></div>
                                    <div class="metade esquerda">
                                        <label>Bairro</label>
                                         <input type="text" placeholder="Bairro" name="e_bairro" id="e_bairro" oninput="this.className = ' ' ">
                                    </div>
                                    <div class="metade direita">
                                        <label>Endereço</label>
                                         <input type="text" placeholder="Endereço" name="e_rua" id="e_rua" oninput="this.className = ' ' ">
                                    </div>
                                     <div class="clear"></div>
                                    <div class="metade esquerda">
                                        <label>Complemento</label>
                                         <input type="text" placeholder="Complemento" name="e_complemento" id="e_complemento" oninput="this.className = ' ' ">
                                    </div>
                                    <div class="metade direita">
                                        <label>Número</label>
                                         <input type="text" placeholder="Número" name="e_numero" id="e_numero" maxlength="10" oninput="this.className = ' ' ">
                                    </div>
                                    <div class="clear"></div>
                                </div>
                                <div class="metade esquerda">
                                        <label>CEP</label>
                                        <input type="text" placeholder="CEP" name="e_cep" id="e_cep" class="cep" oninput="this.className = ' ' ">
                                </div>
                                  <div class="metade direita">
                                        <label>Telefone</label>
                                        <input type="text" placeholder="Telefone" name="e_telefone" id="e_telefone" class="telefone" oninput="this.className = ' ' ">
                                    </div>
                                    <div class="clear"></div>
                                    <div class="metade esquerda">
                                    <label>Nome contato</label>
                                    <input type="text" placeholder="Nome Contato" name="e_nome_contato" id="e_nome_contato" oninput="this.className = ' ' ">
                                </div>
                                 <div class="metade direita">
                                    <label>Email Contato</label>
                                    <input type="email" placeholder="Email Contato" name="e_email_contato" id="e_email_contato" oninput="this.className = ' ' ">
                                </div>
                                 <div class="clear"></div>
                                 <div class="metade esquerda">
                                    <label>Celular Contato</label>
                                    <input type="text" placeholder="Celular Contato" name="e_celular_contato" id="e_celular_contato" class="telefone" oninput="this.className = ' ' ">
                                </div>
                                 <div class="metade direita">
                                    <label>Celular Representante</label>
                                    <input type="text" placeholder="Celular Representante" name="e_celular_rep" id="e_celular_rep" class="telefone" oninput="this.className = ' ' ">
                                </div>
                                 <div class="clear"></div>
                                 <div class="metade esquerda">
                                    <label>Nome Representante</label>
                                    <input type="text" placeholder="Nome Representante" name="e_nome_rep" id="e_nome_rep" oninput="this.className = ' ' ">
                                </div>
                                 <div class="metade direita">
                                    <label>Email Representante</label>
                                    <input type="email" placeholder="Email Representante" name="e_email_rep" id="e_email_rep" oninput="this.className = ' ' ">
                                </div>
                                 <div class="clear"></div>
                                 <div class="metade esquerda">
                                    <label>CPF Representante</label>
                                    <input type="text" placeholder="CPF Representante" name="e_cpf_rep" id="e_cpf_re"  class="cpf" oninput="this.className = ' ' ">
                                </div>
                                 <div class="metade direita">
                                    <label>RG Representante</label>
                                    <input type="text" placeholder="RG Representante" name="e_rg_rep" id="e_rg_rep" class="rg" oninput="this.className = ' ' ">
                                </div>
                                <button type="submit"  id="save" class="click suave">Salvar <i class="material-icons">save</i></button>
                               </div>

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
                url: 'instituicao-lista',
                dataSrc: ''
            },
            columns: [
                {data: 'id_instituicao', width: "60px", className: 'dt-body-center dt-head-center'},
                {data: 'razao_social', width: "400px"},
                {data: 'nome_instituicao', width: "200px", className: 'dt-body-center dt-head-center'},
                {data: 'cidade', width: "200px", className: 'dt-body-center dt-head-center'},
                {data: 'rua', width: "200px", className: 'dt-body-center dt-head-center'},
                {data: 'cnpj', width: "200px", className: 'dt-body-center dt-head-center'},
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
            $("#editar #e_id_instituicao").val(data.id_instituicao);
            consultar(data.id_instituicao);
        });
        var delete_id;
        $(document).on("click", ".deletar", function(){
            delete_id = table.row($(this).parents("tr")).data();
            $("#alerta p").empty();
            $("#alerta p").text("Deseja realmente deletar esta Instituicao?");
            $("#alerta .opcoes").removeClass("hide");
            $("#alerta").addClass("active");
        });
        $("#alerta .confirmar").click(function(){
            $(this).prop('disabled', true);
            deletar(delete_id.id_instituicao);
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
                url: 'instituicao',
                data: form,
                type: 'post',
                contentType: false,
                processData: false,
                error: function(){
                    criaAlerta(0, "Falha ao criar instituicao!",2000);
                }
            });
            request.done(function(response){
                if(response == "1"){
                    $("#lateral, #lateral .content").removeClass("active");
                    $("#form-criar")[0].reset();
                    $("#form-criar button").prop('disabled', false);
                    criaAlerta(0, "instituicao criado!",5000);
                    recarregar();
                }
            });
        }

        function consultar(id){
            request = $.ajax({
                url: 'instituicao/' + id,
                type: 'get',
                error: function(){
                    criaAlerta(0,"Falha na consulta!",2000);
                }
            });
            request.done(function(response){
                $('#form-editar input[name="e_id_instituicao"]').val(response.id_instituicao);
                 $('#form-editar input[name="e_cnpj"]').val(response.cnpj);
                $('#form-editar input[name="e_nome_instituicao"]').val(response.nome_instituicao);
                $('#form-editar input[name="e_razao_social"]').val(response.razao_social);
                $('#form-editar input[name="e_mantenedora"]').val(response.mantenedora);
                 $('#form-editar input[name="e_insc_estadual"]').val(response.insc_estadual);
                $('#form-editar input[name="e_site_url"]').val(response.site_url);
                $('#form-editar input[name="e_estado"]').val(response.estado);
                $('#form-editar input[name="e_cidade"]').val(response.cidade);
                $('#form-editar input[name="e_bairro"]').val(response.bairro);
                $('#form-editar input[name="e_rua"]').val(response.rua);
                $('#form-editar input[name="e_complemento"]').val(response.complemento);
                //$('#form-editar input[name="e_instituicao_id"]').val(response.instituicao_id);
                $('#form-editar input[name="e_numero"]').val(response.numero);
                $('#form-editar input[name="e_cep"]').val(response.cep);
                $('#form-editar input[name="e_telefone"]').val(response.telefone);
                $('#form-editar input[name="e_nome_contato"]').val(response.nome_contato);
                $('#form-editar input[name="e_email_contato"]').val(response.email_contato);
                $('#form-editar input[name="e_celular_contato"]').val(response.celular_contato);
                $('#form-editar input[name="e_celular_rep"]').val(response.celular_rep);
                $('#form-editar input[name="e_nome_rep"]').val(response.nome_rep);
                $('#form-editar input[name="e_email_rep"]').val(response.email_rep);
                $('#form-editar input[name="e_cpf_rep"]').val(response.cpf_rep);
                $('#form-editar input[name="e_rg_rep"]').val(response.rg_rep);


            });
        }

        function editar(){
            var form = new FormData($("#form-editar")[0]);
            request = $.ajax({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                url: 'instituicao',
                data: form,
                type: 'post',
                contentType: false,
                processData: false,
                error: function(){
                    criaAlerta(0,"Falha ao editar Instituicao!",2000);
                }
            });
            request.done(function(response){
                if(response == "2"){
                    $("#lateral, #lateral .content").removeClass("active");
                    $("#form-editar")[0].reset();
                    $("#form-editar button").prop('disabled', false);
                    criaAlerta(0, "Instituicao atualizado!",5000);
                    recarregar();
                }
            });
        }

        function deletar(id){
            request = $.ajax({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                url: 'instituicao/' + id,
                type: 'delete',
                error: function(){
                    criaAlerta(0, "Falha ao deletar Instituicao!",2000);
                }
            });
            request.done(function(response){
                if(response == "1"){
                    $("#alerta .opcoes").addClass("hide");
                    $("#alerta p").text("instituicao deletado!");
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
            // document.getElementById("nextBtn").innerHTML = "Submit";
            document.getElementById("save").style.display = "inline";
            document.getElementById("nextBtn").style.display = "none";
        }
        // else {
        //     document.getElementById("nextBtn").innerHTML = "Próximo";
        // }
        // ... and run a function that displays the correct step indicator:
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
</script>
@endsection
