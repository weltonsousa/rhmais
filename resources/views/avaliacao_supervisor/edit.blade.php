@extends('layout/app')
@section('titulo','EDITAR AVALIAÇÃO SUPERVISOR(A)')
@section('conteudo')
    <div class="container body">
      <div class="main_container">
        <div class="col-md-3 left_col">
          <div class="left_col scroll-view">
          @include('layout.menu.menu')
            <!-- /menu profile quick info -->

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
                    <h2>EDITAR AVALIAÇÃO SUPERVISOR(A)</h2>
                    <div class="clearfix"></div>
                  </div>
                  <div class="x_content">
                <form action="{{ route('cce_convenio.store') }}" id="myForm" role="form" data-toggle="validator" method="post" accept-charset="utf-8">
                  @csrf
                      <!-- SmartWizard html -->
                      <div>
                          <div>
                              <div>
                                    <br>
                                    <div id="form-step-0" role="form" data-toggle="validator">
                                        <div class="row" style="width:960px; margin: 0 auto;">
                                            <div class="col-md-6 col-sm-6 col-xs-12 form-group has-feedback">
                                                <input type="text" class="form-control has-feedback-left" placeholder="Nome Estagiário" name="nome" value="">
                                                <span class="fa fa-user form-control-feedback left" aria-hidden="true"></span>
                                            </div>
                                            <div class="col-md-6 col-sm-6 col-xs-12 form-group has-feedback">
                                                <input type="text" class="form-control has-feedback-left" placeholder="Instituição de Ensino" name="instituicao" value="">
                                                <span class="fa fa-home form-control-feedback left" aria-hidden="true"></span>
                                            </div>
                                            <div class="col-md-6 col-sm-6 col-xs-12 form-group has-feedback">
                                                <input type="text" class="form-control has-feedback-left" placeholder="Unidade Concedente" name="unidade_concedente" value="">
                                                <span class="fa fa-home form-control-feedback left" aria-hidden="true"></span>
                                            </div>
                                            <div class="col-md-6 col-sm-6 col-xs-12 form-group has-feedback">
                                                <input type="text" class="form-control has-feedback-left" placeholder="Supervisor Estágio" name="super_estagio" value="">
                                                <span class="fa fa-user form-control-feedback left" aria-hidden="true"></span>
                                            </div>
                                            <div class="col-md-6 col-sm-6 col-xs-12 form-group has-feedback">
                                                <input type="text" class="form-control has-feedback-left" placeholder="Periodo Avaliativo" name="periodo_avaliativo" value="">
                                                <span class="fa fa-calendar form-control-feedback left" aria-hidden="true"></span>
                                            </div>
                                            <div class="col-md-6 col-sm-6 col-xs-12 form-group has-feedback">
                                                <input type="text" class="form-control has-feedback-left" placeholder="Data Documento" name="data_documento" value="">
                                                <span class="fa fa-calendar form-control-feedback left" aria-hidden="true"></span>
                                            </div>


                                            <div class="col-md-12 col-sm-12 col-xs-12 form-group has-feedback">
                                                <label for="">Descreva as Principais Atividades Desenvolvidas:</label>
                                                <textarea class="form-control" placeholder="observação" name="obs">
                                                </textarea>
                                            </div>

                                            <div class="col-md-12 col-sm-6 col-xs-12 form-group has-feedback">
                                                <br>
                                              <div class="checkbox">
                                              <hr style="border:0.5px solid #2A3F54;">
                                              <label>1. Assiduidade: Constância e pontualidade no cumprimento dos horários e dias trabalhados.*</label>
                                              <br><br>
                                                <label>
                                                  <input type="checkbox" class="flat"  name="insuficiente"> Insuficiente
                                                </label>
                                                <label>
                                                  <input type="checkbox" class="flat" name="regular"> Regular
                                                </label>
                                                <label>
                                                  <input type="checkbox" class="flat" name="bom"> Bom
                                                </label>
                                                <label>
                                                  <input type="checkbox" class="flat" name="otimo"> Ótimo
                                                </label>
                                              </div>
                                            </div>
                                            <div class="col-md-12 col-sm-6 col-xs-12 form-group has-feedback">
                                              <div class="checkbox">
                                              <hr style="border:0.5px solid #2A3F54;">
                                              <label> 2. Disciplina: Facilidade em aceitar e seguir instruções de superiores e
                                              acatar regularmente as normas da Entidade.*</label>
                                              <br><br>
                                              <label>
                                                  <input type="checkbox" class="flat"  name="insuficiente"> Insuficiente
                                                </label>
                                                <label>
                                                  <input type="checkbox" class="flat" name="regular"> Regular
                                                </label>
                                                <label>
                                                  <input type="checkbox" class="flat" name="bom"> Bom
                                                </label>
                                                <label>
                                                  <input type="checkbox" class="flat" name="otimo"> Ótimo
                                                </label>
                                              </div>
                                            </div>
                                            <div class="col-md-12 col-sm-6 col-xs-12 form-group has-feedback">
                                              <div class="checkbox">
                                              <hr style="border:0.5px solid">
                                              <label> 3. Sociabilidade e Desembaraço: Facilidade e espontaneidade
                                              com que age frente a pessoas, fatos e situações.*</label>
                                              <br><br>
                                              <label>
                                                  <input type="checkbox" class="flat"  name="insuficiente"> Insuficiente
                                                </label>
                                                <label>
                                                  <input type="checkbox" class="flat" name="regular"> Regular
                                                </label>
                                                <label>
                                                  <input type="checkbox" class="flat" name="bom"> Bom
                                                </label>
                                                <label>
                                                  <input type="checkbox" class="flat" name="otimo"> Ótimo
                                                </label>
                                              </div>
                                            </div>
                                            <div class="col-md-12 col-sm-6 col-xs-12 form-group has-feedback">
                                              <div class="checkbox">
                                              <hr style="border:0.5px solid">
                                              <label> 4. Rendimento no Estágio: Qualidade, rapidez, precisão com as
                                              quais executa as tarefas integrantes do programa de estágio.*</label>
                                              <br><br>
                                              <label>
                                                  <input type="checkbox" class="flat"  name="insuficiente"> Insuficiente
                                                </label>
                                                <label>
                                                  <input type="checkbox" class="flat" name="regular"> Regular
                                                </label>
                                                <label>
                                                  <input type="checkbox" class="flat" name="bom"> Bom
                                                </label>
                                                <label>
                                                  <input type="checkbox" class="flat" name="otimo"> Ótimo
                                                </label>
                                              </div>
                                            </div>
                                            <div class="col-md-12 col-sm-6 col-xs-12 form-group has-feedback">
                                              <div class="checkbox">
                                              <hr style="border:0.5px solid #2A3F54;">
                                              <label> 5. Facilidade de Compreensão: Rapidez e facilidade em interpretar,
                                              pôr em prática ou entender instruções e informações verbais ou escritas.*</label>
                                              <br><br>
                                              <label>
                                                  <input type="checkbox" class="flat"  name="insuficiente"> Insuficiente
                                                </label>
                                                <label>
                                                  <input type="checkbox" class="flat" name="regular"> Regular
                                                </label>
                                                <label>
                                                  <input type="checkbox" class="flat" name="bom"> Bom
                                                </label>
                                                <label>
                                                  <input type="checkbox" class="flat" name="otimo"> Ótimo
                                                </label>
                                              </div>

                                            </div>
                                            <div class="col-md-12 col-sm-6 col-xs-12 form-group has-feedback">
                                              <div class="checkbox">
                                              <hr style="border:0.5px solid #2A3F54;">
                                              <label> 6. Nível de Conhecimento Teórico: Conhecimento demonstrado no cumprimento
                                              do programa de estágio, tendo em vista sua escolaridade.*</label>
                                              <br><br>
                                              <label>
                                                  <input type="checkbox" class="flat"  name="insuficiente"> Insuficiente
                                                </label>
                                                <label>
                                                  <input type="checkbox" class="flat" name="regular"> Regular
                                                </label>
                                                <label>
                                                  <input type="checkbox" class="flat" name="bom"> Bom
                                                </label>
                                                <label>
                                                  <input type="checkbox" class="flat" name="otimo"> Ótimo
                                                </label>
                                              </div>
                                            </div>

                                            <div class="col-md-12 col-sm-6 col-xs-12 form-group has-feedback">
                                              <div class="checkbox">
                                              <hr style="border:0.5px solid #2A3F54;">
                                              <label> 7. Organização e Métodos no Trabalho: Uso de meios racionais, visando melhorar
                                              a organização do seu trabalho.*</label>
                                              <br><br>
                                              <label>
                                                  <input type="checkbox" class="flat"  name="insuficiente"> Insuficiente
                                                </label>
                                                <label>
                                                  <input type="checkbox" class="flat" name="regular"> Regular
                                                </label>
                                                <label>
                                                  <input type="checkbox" class="flat" name="bom"> Bom
                                                </label>
                                                <label>
                                                  <input type="checkbox" class="flat" name="otimo"> Ótimo
                                                </label>
                                              </div>
                                            </div>
                                            <div class="col-md-12 col-sm-6 col-xs-12 form-group has-feedback">
                                              <div class="checkbox">
                                              <hr style="border:0.5px solid #2A3F54;">
                                              <label> 8. Iniciativa - Independência: Capacidade de procurar
                                              novas soluções, sem prévia orientação, dentro de padrões adequados.*</label>
                                              <br><br>
                                              <label>
                                                  <input type="checkbox" class="flat"  name="insuficiente"> Insuficiente
                                                </label>
                                                <label>
                                                  <input type="checkbox" class="flat" name="regular"> Regular
                                                </label>
                                                <label>
                                                  <input type="checkbox" class="flat" name="bom"> Bom
                                                </label>
                                                <label>
                                                  <input type="checkbox" class="flat" name="otimo"> Ótimo
                                                </label>
                                              </div>
                                            </div>
                                            <div class="col-md-12 col-sm-6 col-xs-12 form-group has-feedback">
                                              <div class="checkbox">
                                              <hr style="border:0.5px solid #2A3F54;">
                                              <label> 9. Cooperação : Atuação junto a outras pessoas no sentido de contribuir para o alcance de
                                              um objetivo comum. Influência positiva no grupo.*</label>
                                              <br><br>
                                              <label>
                                                  <input type="checkbox" class="flat"  name="insuficiente"> Insuficiente
                                                </label>
                                                <label>
                                                  <input type="checkbox" class="flat" name="regular"> Regular
                                                </label>
                                                <label>
                                                  <input type="checkbox" class="flat" name="bom"> Bom
                                                </label>
                                                <label>
                                                  <input type="checkbox" class="flat" name="otimo"> Ótimo
                                                </label>
                                              </div>
                                            </div>
                                            <div class="col-md-12 col-sm-6 col-xs-12 form-group has-feedback">
                                              <div class="checkbox">
                                              <hr style="border:0.5px solid #2A3F54;">
                                              <label> 10. Responsabilidade: Capacidade de assumir o próprio trabalho e
                                               zelar pelos bens e equipamentos da Entidade.*</label>
                                              <br><br>
                                              <label>
                                                  <input type="checkbox" class="flat"  name="insuficiente"> Insuficiente
                                                </label>
                                                <label>
                                                  <input type="checkbox" class="flat" name="regular"> Regular
                                                </label>
                                                <label>
                                                  <input type="checkbox" class="flat" name="bom"> Bom
                                                </label>
                                                <label>
                                                  <input type="checkbox" class="flat" name="otimo"> Ótimo
                                                </label>
                                              </div>
                                            </div>

                                            <div class="col-md-12 col-sm-12 col-xs-12 form-group has-feedback">
                                                <button type="submit" class="btn btn-success">Gerar Auto-Avaliação</button>
                                                <button class="btn btn-primary">Cancelar</button>
                                            </div>
                                        </div>
                                    </div>
                              </div>
                          </div>
                      </div>
                     </div>
                      </form>
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
@endsection