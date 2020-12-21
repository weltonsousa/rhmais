@extends('layout/app-new')
@section('titulo','Estagiários | RH MAIS')

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
                                <h2>Estagiários</h2>
                                <div class="clearfix"></div>
                                </div>
                                <div class="x_content">
                                    <div id="modulo">
                                        <table id="tLista" style="padding-top: 16px;" class="stripe">
                                            <thead>
                                                <tr>
                                                    <td class="mini-title upper">#</td>
                                                    <td class="mini-title upper">Nome</td>
                                                    <td class="mini-title upper">Unidade</td>
                                                    <td class="mini-title upper">Tel. Celular</td>
                                                    <td class="mini-title upper">CPF</td>
                                                    <td class="mini-title upper">Cidade</td>
                                                    <td class="mini-title upper">Dt. Nascimento</td>
                                                    <td class="mini-title upper">Escolaridade</td>
                                                    <td class="mini-title upper">Término Curso</td>
                                                    <td class="mini-title upper">Ações</td>
                                                </tr>
                                            </thead>
                                            <tbody></tbody>
                                        </table>
                                </div>

                        <div id="lateral" class="suave">
                            <div class="overlay suave"></div>
                            <div id="criar" class="content suave">
                            <h4 class="barlow">Cadastrar Estagiário<i class="material-icons click suave fechar">close</i></h4>
                            <form id="form-criar" method="POST">
                                <div class="tab">
                                    <div class="metade esquerda">
                                        <label>Nome Completo</label>
                                        <input type="text" placeholder="Nome Completo" name="nome" id="nome" oninput="this.className = ' ' ">
                                    </div>
                                    <div class="metade direita">
                                        <label>Email</label>
                                        <input type="email" placeholder="Email" name="email" id="email" oninput="this.className = ' ' ">
                                    </div>
                                     <div class="clear"></div>
                                    <div class="metade esquerda">
                                        <label>RG</label>
                                        <input type="text" placeholder="RG" name="rg" id="rg" class="rg" oninput="this.className = ' ' ">
                                    </div>
                                    <div class="metade direita">
                                        <label>CPF</label>
                                        <input type="text" placeholder="CPF" name="cpf" id="cpf" class="cpf" oninput="this.className = ' ' ">
                                    </div>
                                     <div class="clear"></div>
                                    <div class="metade esquerda">
                                        <label>Telefone</label>
                                        <input type="text" placeholder="Telefone" name="telefone" id="telefone" class="telefone" oninput="this.className = ' ' ">
                                    </div>
                                    <div class="metade direita">
                                        <label>Celular</label>
                                        <input type="text" placeholder="Celular" name="celular" id="celular" class="telefone" oninput="this.className = ' ' ">
                                    </div>
                                      <div class="clear"></div>
                                    <div class="metade esquerda">
                                        <label>Data de Nascimento</label>
                                        <input type="text" placeholder="Data de Nascimento" name="data_nascimento" id="data_nascimento" class="data" oninput="this.className = ' ' ">
                                   </div>
                                  <div class="metade direita">
                                        <label>Bairro</label>
                                    <input type="text" placeholder="Bairro" name="bairro" id="bairro" oninput="this.className = ' ' ">
                                </div>
                                 <div class="clear"></div>
                                 <div class="metade esquerda">
                                    <label>Endereço</label>
                                    <input type="text" placeholder="Endereço" name="rua" id="rua" oninput="this.className = ' ' ">
                                </div>
                                 <div class="metade direita">
                                     <label>Complemento</label>
                                     <input type="text" placeholder="Complemento" name="complemento" id="complemento" oninput="this.className = ' ' ">
                                </div>
                                 <div class="clear"></div>
                                 <div class="metade esquerda">
                                     <label>CEP</label>
                                     <input type="text" placeholder="CEP" name="cep" id="cep" class="cep" oninput="this.className = ' ' ">
                                </div>
                                <div class="metade direita">
                                    <label>Número</label>
                                    <input type="text" placeholder="Número" name="numero" id="numero" maxlength="10" oninput="this.className = ' ' ">
                                </div>
                                 <div class="clear"></div>
                                 <div class="metade esquerda">
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
                                 <div class="metade direita">
                                    <label>Cidade</label>
                                    <input type="text" placeholder="Cidade" name="cidade" id="cidade" oninput="this.className = ' ' ">
                                </div>
                                </div>
                                 <div class="clear"></div>
                                {{-- Etapa 2 --}}
                                <div class="tab">
                                 <div class="metade esquerda">
                                    <label>Unidade</label>
                                   <select name="empresa_id" id="empresa_id">
                                        @foreach ($empresas as $empresa)
                                            <option value="{{ $empresa->id_empresa }}">
                                                {{ $empresa->nome_fantasia }}
                                            </option>
                                        @endforeach
                                    </select>
                                </div>
                                 <div class="metade direita">
                                     <label>Sexo</label>
                                   <select name="sexo" id="sexo">
                                       <option>Masculino</option>
                                        <option>Feminino</option>
                                    </select>
                                </div>
                                 <div class="clear"></div>
                                 <div class="metade esquerda">
                                    <label>Filiação Pai</label>
                                    <input type="text" placeholder="Filiação Pai" name="pai" id="pai" oninput="this.className = ' ' ">
                                </div>
                                 <div class="metade direita">
                                    <label>Filiação Mãe</label>
                                    <input type="text" placeholder="Filiação Mãe" name="mae" id="mae"  oninput="this.className = ' ' ">
                                </div>
                                 <div class="clear"></div>
                                 <div class="metade esquerda">
                                    <label>CTPS</label>
                                    <input type="text" placeholder="CTPS" name="ctps" id="cpts" oninput="this.className = ' ' ">
                                </div>
                                 <div class="metade direita">
                                    <label>Série CTPS</label>
                                    <input type="text" placeholder="Série CTPS" name="serie_ctps" id="serie_ctps" oninput="this.className = ' ' ">
                                </div>
                                 <div class="clear"></div>
                                 <div class="metade esquerda">
                                    <label>Número PIS</label>
                                    <input type="text" placeholder="Número PIS" name="numero_pis" id="numero_pis"  oninput="this.className = ' ' ">
                                </div>
                                 <div class="metade direita">
                                    <label>Nacionalidade</label>
                                    <select name="nacionalidade" id="nacionalidade">
                                        <option>Brasileiro(a)</option>
                                    </select>
                                </div>
                                </div>
                                <div class="tab">
                                    <div class="metade esquerda">
                                        <label for="">Operador</label>
                                      <input type="text" value="{{ Auth::user()->name }}" readonly placeholder="Responsável" name="agent_int" id="agent_int">
                                </div>
                                 <div class="metade direita">
                                    <label>Ptd. de Deficiência</label>
                                     <select name="deficiencia" id="deficiencia">
                                         <option value="1">Sim</option>
                                        <option value="2">Não</option>
                                     </select>
                                </div>
                                  <div class="clear"></div>
                                 <div class="metade esquerda">
                                      <label>Nível</label>
                                      <select name="nivel" id="nivel">
                                          @foreach ($cursos as $key)
                                              <option value="{{ $key->nivel }}">{{ $key->nivel }}</option>
                                          @endforeach
                                      </select>
                                </div>
                                 <div class="metade direita">
                                    <label>Curso</label>
                                    <select name="curso" id="curso">
                                        @foreach ($cursos as $key)
                                            <option value="{{ $key->nome_curso }}">{{ $key->nome_curso }}</option>
                                        @endforeach
                                    </select>
                                </div>
                                 <div class="clear"></div>
                                {{-- <div class="checkbox-round"> --}}
                                <div class="metade esquerda">
                                    <label>Período</label>
                                    <select name="periodo" id="periodo">
                                        <option value="1º Período">1º Período</option>
                                        <option value="2º Período">2º Período</option>
                                        <option value="3º Período">3º Período</option>
                                        <option value="4º Período">4º Período</option>
                                        <option value="5º Período">5º Período</option>
                                        <option value="6º Período">6º Período</option>
                                        <option value="7º Período">7º Período</option>
                                        <option value="8º Período">8º Período</option>
                                        <option value="9º Período">9º Período</option>
                                        <option value="10º Período">10º Período</option>
                                    </select>
                                </div>
                                <div class="metade direita">
                                    <label>Instituição de Ensino</label>
                                    <select  name="instituicao_id" id="instituicao_id">
                                        @foreach ($instituicoes as $inst)
                                            <option value="{{ $inst->id_instituicao }}">{{ $inst->nome_instituicao }}
                                            </option>
                                        @endforeach
                                    </select>
                                </div>
                                 <div class="clear"></div>
                                <div class="metade esquerda">
                                    <label> Dt. Término do Curso </label>
                                    <input type="text" placeholder="Data Término do Curso" name="termino_curso" id="termino_curso" class="data" oninput="this.className = ' ' ">
                                </div>
                                <div class="metade direita">
                                    <label>Matrícula </label>
                                      <input type="text" placeholder="Matrícula" name="matricula" id="matricula"  oninput="this.className = ' ' ">
                                </div>
                                 <div class="clear"></div>
                                 <div class="metade esquerda">
                                    <label>Banco/Agência</label>
                                      <input type="text" placeholder="Banco/Agência" name="banco" id="banco"  oninput="this.className = ' ' ">
                                </div>
                                 <div class="metade direita">
                                    <label>Conta</label>
                                      <input type="text" placeholder="Conta" name="conta" id="conta"  oninput="this.className = ' ' ">
                                </div>
                                 <div class="clear"></div>
                                 <div class="metade esquerda">
                                    <label>Código da vaga</label>
                                      <input type="text" placeholder="Código da vaga" name="codigo_vaga" id="codigo_vaga"  oninput="this.className = ' ' ">
                                </div>
                                 <div class="metade direita">
                                     <label>
                                           <input type="checkbox" name="ativo"> Está Ativo
                                       </label>
                                    </div>
                                    <div class="clear"></div>
                                    <div class="metade esquerda">
                                        <label>Observação</label>
                                          <textarea class="form-control" placeholder="Observação" name="obs" id="obs"></textarea>
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
                                <h4 class="barlow">Editar Estagiário<i class="material-icons click suave fechar">close</i></h4>
                                <form id="form-editar" method="post">
                                <div class="e_tab">
                                        <input type="hidden" name="e_id_estagiario" id="e_id_estagiario" value="">
                                        <input type="hidden" name="e_instituicao_id" id="e_instituicao_id" value="">
                                    <div class="metade esquerda">
                                        <label>Nome Completo</label>
                                        <input type="text" placeholder="Nome Completo" name="e_nome" id="e_nome" oninput="this.className = ' ' ">
                                    </div>
                                    <div class="metade direita">
                                        <label>Email</label>
                                        <input type="email" placeholder="Email" name="e_email"e_ id="e_email" oninput="this.className = ' ' ">
                                    </div>
                                     <div class="clear"></div>
                                    <div class="metade esquerda">
                                        <label>RG</label>
                                        <input type="text" placeholder="RG" name="e_rg" id="e_rg" class="rg" oninput="this.className = ' ' ">
                                    </div>
                                    <div class="metade direita">
                                        <label>CPF</label>
                                        <input type="text" placeholder="CPF" name="e_cpf" id="e_cpf" class="cpf" oninput="this.className = ' ' ">
                                    </div>
                                     <div class="clear"></div>
                                    <div class="metade esquerda">
                                        <label>Telefone</label>
                                        <input type="text" placeholder="Telefone" name="e_telefone" id="e_telefone" class="telefone" oninput="this.className = ' ' ">
                                    </div>
                                    <div class="metade direita">
                                        <label>Celular</label>
                                        <input type="text" placeholder="Celular" name="e_celular" id="e_celular" class="telefone" oninput="this.className = ' ' ">
                                    </div>
                                      <div class="clear"></div>
                                    <div class="metade esquerda">
                                        <label>Data de Nascimento</label>
                                        <input type="text" placeholder="Data de Nascimento" name="e_data_nascimento" id="e_data_nascimento" class="data"  oninput="this.className = ' ' ">
                                   </div>
                                  <div class="metade direita">
                                        <label>Bairro</label>
                                    <input type="text" placeholder="Bairro" name="e_bairro" id="e_bairro" oninput="this.className = ' ' ">
                                </div>
                                 <div class="clear"></div>
                                 <div class="metade esquerda">
                                    <label>Endereço</label>
                                    <input type="text" placeholder="Endereço" name="e_rua" id="e_rua" oninput="this.className = ' ' ">
                                </div>
                                 <div class="metade direita">
                                     <label>Complemento</label>
                                     <input type="text" placeholder="Complemento" name="e_complemento" id="e_complemento" oninput="this.className = ' ' ">
                                </div>
                                 <div class="clear"></div>
                                 <div class="metade esquerda">
                                     <label>CEP</label>
                                     <input type="text" placeholder="CEP" name="e_cep" id="e_cep" class="cep" oninput="this.className = ' ' ">
                                </div>
                                <div class="metade direita">
                                    <label>Número</label>
                                    <input type="text" placeholder="Número" name="e_numero" id="e_numero" maxlength="10" oninput="this.className = ' ' ">
                                </div>
                                 <div class="clear"></div>
                                 <div class="metade esquerda">
                                     <label>Estado</label>
                                        <select name="e_estado" id="e_estado" oninput="this.className = ' ' ">
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
                                    <label>Unidade</label>
                                    <input type="text" name="e_nome_fantasia" id="e_nome_fantasia" readonly>
                                </div>
                                 <div class="metade direita">
                                     <label>Sexo</label>
                                   <select name="e_sexo" id="e_sexo">
                                       <option>Masculino</option>
                                        <option>Feminino</option>
                                    </select>
                                </div>
                                 <div class="clear"></div>
                                 <div class="metade esquerda">
                                    <label>Filiação Pai</label>
                                    <input type="text" placeholder="Filiação Pai" name="e_pai" id="e_pai" oninput="this.className = ' ' ">
                                </div>
                                 <div class="metade direita">
                                    <label>Filiação Mãe</label>
                                    <input type="text" placeholder="Filiação Mãe" name="e_mae" id="e_mae"  oninput="this.className = ' ' ">
                                </div>
                                 <div class="clear"></div>
                                 <div class="metade esquerda">
                                    <label>CTPS</label>
                                    <input type="text" placeholder="CTPS" name="e_ctps" id="e_cpts" oninput="this.className = ' ' ">
                                </div>
                                 <div class="metade direita">
                                    <label>Série CTPS</label>
                                    <input type="text" placeholder="Série CTPS" name="e_serie_ctps" id="e_serie_ctps" oninput="this.className = ' ' ">
                                </div>
                                 <div class="clear"></div>
                                 <div class="metade esquerda">
                                    <label>Número PIS</label>
                                    <input type="text" placeholder="Número PIS" name="e_numero_pis" id="e_numero_pis"  oninput="this.className = ' ' ">
                                </div>
                                 <div class="metade direita">
                                    <label>Nacionalidade</label>
                                    <select name="e_nacionalidade" id="e_nacionalidade">
                                        <option>Brasileiro(a)</option>
                                    </select>
                                </div>
                                  <div class="clear"></div>
                                 <div class="metade esquerda">
                                        <label for="">Operador</label>
                                      <input type="text" value="{{ Auth::user()->name }}" readonly placeholder="Responsável" name="pessoa_responsavel" id="pessoa_responsavel">
                                </div>
                                 <div class="metade direita">
                                    <label>Ptd. de Deficiência</label>
                                     <select name="e_deficiencia" id="e_deficiencia">
                                         <option value="1">Sim</option>
                                        <option value="2">Não</option>
                                     </select>
                                </div>
                                  <div class="clear"></div>
                                 <div class="metade esquerda">
                                      <label>Nível</label>
                                      <select name="e_nivel" id="e_nivel">
                                          @foreach ($cursos as $key)
                                              <option value="{{ $key->nivel }}">{{ $key->nivel }}</option>
                                          @endforeach
                                      </select>
                                </div>
                                 <div class="metade direita">
                                    <label>Curso</label>
                                    <select name="e_curso" id="e_curso">
                                        @foreach ($cursos as $key)
                                            <option value="{{ $key->nome_curso }}">{{ $key->nome_curso }}</option>
                                        @endforeach
                                    </select>
                                </div>
                                 <div class="clear"></div>
                                {{-- <div class="checkbox-round"> --}}
                                <div class="metade esquerda">
                                    <label>Período</label>
                                    <select name="e_periodo" id="e_periodo">
                                        <option value="1º Período">1º Período</option>
                                        <option value="2º Período">2º Período</option>
                                        <option value="3º Período">3º Período</option>
                                        <option value="4º Período">4º Período</option>
                                        <option value="5º Período">5º Período</option>
                                        <option value="6º Período">6º Período</option>
                                        <option value="7º Período">7º Período</option>
                                        <option value="8º Período">8º Período</option>
                                        <option value="9º Período">9º Período</option>
                                        <option value="10º Período">10º Período</option>
                                    </select>
                                </div>
                                <div class="metade direita">
                                    <label>Instituição de Ensino</label>
                                    <input type="text" name="e_instituicao_ensino" id="e_instituicao_ensino" readonly>
                                </div>
                                 <div class="clear"></div>
                                <div class="metade esquerda">
                                    <label> Dt.Término do Curso </label>
                                    <input type="text" placeholder="Dt. Término do Curso" name="e_termino_curso" id="e_termino_curso" class="data"  oninput="this.className = ' ' ">
                                </div>
                                <div class="metade direita">
                                    <label>Matrícula </label>
                                      <input type="text" placeholder="Matrícula" name="e_matricula" id="e_matricula"  oninput="this.className = ' ' ">
                                </div>
                                 <div class="clear"></div>
                                 <div class="metade esquerda">
                                    <label>Banco/Agência</label>
                                      <input type="text" placeholder="Banco/Agência" name="e_banco" id="e_banco"  oninput="this.className = ' ' ">
                                </div>
                                 <div class="metade direita">
                                    <label>Conta</label>
                                      <input type="text" placeholder="Conta" name="e_conta" id="e_conta"  oninput="this.className = ' ' ">
                                </div>
                                 <div class="clear"></div>
                                 <div class="metade esquerda">
                                    <label>Código da vaga</label>
                                      <input type="text" placeholder="Código da vaga" name="e_codigo_vaga" id="e_codigo_vaga"  oninput="this.className = ' ' ">
                                </div>
                                 <div class="metade direita">
                                     <label>
                                           <input type="checkbox" name="e_curso"  checked="checked"> Está Ativo
                                       </label>
                                    </div>
                                    <div class="clear"></div>
                                    <div class="metade esquerda">
                                        <label>Observação</label>
                                          <textarea class="form-control" placeholder="Observação" name="e_obs" id="e_obs"></textarea>
                                    </div>
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
                url: 'estagiario-lista',
                dataSrc: ''
            },
            columns: [
                {data: 'id_estagiario', width: "60px", className: 'dt-body-center dt-head-center'},
                {data: 'nome', width: "400px"},
                {data: 'empresa.nome_fantasia', width: "200px", className: 'dt-body-center dt-head-center'},
                {data: 'celular', width: "200px", className: 'dt-body-center dt-head-center'},
                {data: 'cpf', width: "200px", className: 'dt-body-center dt-head-center'},
                {data: 'cidade', width: "200px", className: 'dt-body-center dt-head-center'},
                {data: 'data_nascimento', width: "200px", className: 'dt-body-center dt-head-center'},
                //     render: function(data){
                //             return  moment(data).format('DD/MM/YYYY');
                //     }
                // },
                {data: 'curso', width: "200px", className: 'dt-body-center dt-head-center'},
                {data: 'termino_curso', width: "200px", className: 'dt-body-center dt-head-center'},
                //       render: function(data){
                //             return  moment(data).format('DD/MM/YYYY');
                //     }
                // },
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
            $("#editar #e_id_estagiario").val(data.id_estagiario);
            consultar(data.id_estagiario);
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
                url: 'estagiario',
                data: form,
                type: 'post',
                contentType: false,
                processData: false,
                error: function(){
                    criaAlerta(0, "Falha ao criar estagiário!",2000);
                }
            });
            request.done(function(response){
                if(response == "1"){
                    $("#lateral, #lateral .content").removeClass("active");
                    $("#form-criar")[0].reset();
                    $("#form-criar button").prop('disabled', false);
                    criaAlerta(0, "Estagiário criado!",5000);
                    recarregar();
                }
            });
        }

        function consultar(id){
            request = $.ajax({
                url: 'estagiario/' + id,
                type: 'get',
                error: function(){
                    criaAlerta(0,"Falha na consulta!",2000);
                }
            });
            request.done(function(response){
                $('#form-editar input[name="e_id_estagiario"]').val(response.id_estagiario);
                $('#form-editar input[name="e_instituicao_id"]').val(response.instituicao_id);
                $('#form-editar input[name="e_nome"]').val(response.nome);
                $('#form-editar input[name="e_email"]').val(response.email);
                $('#form-editar input[name="e_rg"]').val(response.rg);
                $('#form-editar input[name="e_cpf"]').val(response.cpf);
                $('#form-editar input[name="e_telefone"]').val(response.telefone);
                $('#form-editar input[name="e_celular"]').val(response.celular);
                $('#form-editar input[name="e_data_nascimento"]').val(response.data_nascimento);
                $('#form-editar input[name="e_bairro"]').val(response.bairro);
                $('#form-editar input[name="e_rua"]').val(response.rua);
                $('#form-editar input[name="e_complemento"]').val(response.complemento);
                $('#form-editar input[name="e_cep"]').val(response.cep);
                $('#form-editar input[name="e_numero"]').val(response.numero);
                $('#form-editar input[name="e_estado"]').val(response.estado);
                $('#form-editar input[name="e_cidade"]').val(response.cidade);
                $('#form-editar input[name="e_nome_fantasia"]').val(response.empresa.nome_fantasia);
                $('#form-editar input[name="e_sexo"]').val(response.sexo);
                $('#form-editar input[name="e_pai"]').val(response.pai);
                $('#form-editar input[name="e_mae"]').val(response.mae);
                $('#form-editar input[name="e_ctps"]').val(response.ctps);
                $('#form-editar input[name="e_serie_ctps"]').val(response.serie_ctps);
                $('#form-editar input[name="e_numero_pis"]').val(response.numero_pis);
                $('#form-editar input[name="e_nacionalidade"]').val(response.nacionalidade);
                $('#form-editar input[name="e_agente_it"]').val(response.agent_int);
                $('#form-editar input[name="e_deficiencia"]').val(response.deficiencia);
                $('#form-editar input[name="e_curso"]').val(response.curso);
                $('#form-editar input[name="e_nivel"]').val(response.nivel);
                $('#form-editar input[name="e_periodo"]').val(response.periodo);
                $('#form-editar input[name="e_instituicao_ensino"]').val(response.instituicao.nome_instituicao);
                $('#form-editar input[name="e_matricula"]').val(response.matricula);
                $('#form-editar input[name="e_termino_curso"]').val(response.termino_curso);
                $('#form-editar input[name="e_banco"]').val(response.banco);
                $('#form-editar input[name="e_conta"]').val(response.conta);
                $('#form-editar input[name="e_codigo_vaga"]').val(response.codigo_vaga);
                $('#form-editar input[name="e_conta"]').val(response.conta);
                $('#form-editar input[name="e_senha"]').val(response.senha);
                $('#form-editar input[name="e_obs"]').val(response.obs);
                $('#form-editar input[name="e_ativo"]').val(response.ativo);

            });
        }

        function editar(){
            var form = new FormData($("#form-editar")[0]);
            request = $.ajax({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                url: 'estagiario',
                data: form,
                type: 'post',
                contentType: false,
                processData: false,
                error: function(){
                    criaAlerta(0,"Falha ao editar estagiário!",2000);
                }
            });
            request.done(function(response){
                if(response == "2"){
                    $("#lateral, #lateral .content").removeClass("active");
                    $("#form-editar")[0].reset();
                    $("#form-editar button").prop('disabled', false);
                    criaAlerta(0, "Estagiário atualizado!",5000);
                    recarregar();
                }
            });
        }

        function deletar(id){
            request = $.ajax({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                url: 'estagiario/' + id,
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
