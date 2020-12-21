<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
 */

Auth::routes();
Route::get('/', 'HomeController@index')->name('index');
Route::get('/home', 'HomeController@index')->name('index');
// Route::post('/home', 'HomeController@index')->name('index');
Route::get('/home/grafico', 'HomeController@grafico');
Route::get('infos/{id}', ['uses' => 'FinanceiroController@infos', 'as' => 'financeiro.infos']);
Route::get('cau_assinado/{id}', ['uses' => 'CauController@assinado', 'as' => 'cau_convenio.assinar']);
Route::get('cce_assinado/{id}', ['uses' => 'CceController@assinado', 'as' => 'cce_convenio.assinar']);
Route::get('recesso_assinado/{id}', ['uses' => 'RecessoController@assinado', 'as' => 'recesso_assinado.assinar']);
Route::get('financeiro_fechado/{id}', ['uses' => 'FinanceiroController@assinado', 'as' => 'financeiro.fechar']);
Route::post('editar_folha_pagamento', ['uses' => 'FolhaPagamentoController@editar', 'as' => 'folha_pagamento.editar']);
Route::get('editar_folha_rescisao', ['uses' => 'FolhaRescisaoController@editar', 'as' => 'folha_recisao.editar']);
Route::post('processar', 'FolhaPagamentoController@index')->name('processar');
Route::post('processarFinanceiro', 'FinanceiroController@index')->name('processarFinanceiro');
Route::post('processarRescisao', 'FolhaRescisaoController@index')->name('processarRescisao');
Route::get('editar_contrato/{id}', ['uses' => 'TceContratoController@editar', 'as' => 'editar_contrato.editar']);
Route::get('listar-rescisao', 'FolhaRescisaoController@show')->name('listar-rescisao');

Route::resource('empresa', 'EmpresaController');
Route::resource('estagiario', 'EstagiarioController');
Route::resource('instituicao', 'InstituicaoController');
Route::resource('user_sistema', 'UserController');
Route::resource('curso', 'CursoController');
Route::resource('cidade', 'CidadeController');
Route::resource('beneficio', 'BeneficioController');
Route::resource('seguro', 'SeguradoraController');
Route::resource('setor', 'SetorController');
Route::resource('atividade', 'AtividadeController');
Route::resource('horario', 'HorarioController');
Route::resource('auto_avaliacao', 'AvaliacaoController');
Route::resource('motivo', 'MotivoController');
Route::resource('orientador', 'OrientadorController');
Route::resource('supervisor', 'SupervisorController');
Route::resource('termo_recesso', 'RecessoController');
Route::resource('financeiro', 'FinanceiroController');
Route::resource('avaliacao_supervisor', 'AvaliacaoSuperController');
Route::resource('folha_pagamento', 'FolhaPagamentoController');
Route::resource('folha_rescisao', 'FolhaRescisaoController');
Route::resource('cau', 'CauController');
Route::resource('cce', 'CceController');

/* Requisicao ajax */
Route::get('horario-ajax/ajax/{id}', array('as' => 'horario-ajax.ajax', 'uses' => 'TceContratoController@horarioAjax'));
Route::get('tce-ajax/ajax/{id}', array('as' => 'tce-ajax.ajax', 'uses' => 'TceContratoController@tceAjax'));
Route::get('atividade-ajax/ajax/{id}', array('as' => 'atividade-ajax.ajax', 'uses' => 'TceContratoController@atividadeAjax'));
Route::get('avaliacao-ajax/ajax/{id}', array('as' => 'avaliacao-ajax.ajax', 'uses' => 'AvaliacaoController@avaliacaoAjax'));
Route::get('supervisor-ajax/ajax/{id}', array('as' => 'supervisor-ajax.ajax', 'uses' => 'AvaliacaoController@supervisorAjax'));
Route::get('avaliacao-super-ajax/ajax/{id}', array('as' => 'avaliacao-super-ajax.ajax', 'uses' => 'AvaliacaoSuperController@avaliacaoAjax'));
Route::get('super-ajax/ajax/{id}', array('as' => 'supervisor-ajax.ajax', 'uses' => 'AvaliacaoSuperController@supervisorAjax'));
Route::get('beneficio-ajax', array('as' => 'beneficio-ajax.ajax', 'uses' => 'BeneficioController@beneficioAjax'));
Route::get('setor-ajax', array('as' => 'setor-ajax.ajax', 'uses' => 'SetorController@setorAjax'));
Route::get('orientador-ajax/ajax/{id}', array('as' => 'orientador-ajax.ajax', 'uses' => 'OrientadorController@orientadorAjax'));
Route::get('supervisor-ajax/ajax/{id}', array('as' => 'supervisor-ajax.ajax', 'uses' => 'SupervisorController@supervisorAjax'));
Route::resource('ajax-crud', 'AjaxController');
Route::get('beneficio_estagiario/{id}', ['uses' => 'AjaxController@beneficio_estagiario', 'as' => 'ajax-crud.beneficio_estagiario']);
Route::get('find-ajax/pdf/{id}', array('as' => 'find-ajax.ajax', 'uses' => 'TceAditivoController@contratoAditivoTce'));

/*Gerar PDF*/
Route::get('cau-pdf/{id}', 'PdfController@cau');
Route::get('cce/{id}', 'PdfController@cce');
Route::get('estagio/{id}', 'PdfController@planoEstagio');
Route::get('avaliacao-pdf', 'PdfController@generateAvaliacao');
Route::get('fechamento-pdf/{id}', 'PdfController@generateFechamento');
Route::get('/tce-pdf/{id}', 'PdfController@contratoTce');
Route::get('/aditivo-pdf/{id}', 'PdfController@contratoAditivoTce');
Route::get('rescisao-pdf/{id}', 'PdfController@rescisaoTce');
Route::get('holerite_rescisao/{id}', 'PdfController@holeriteRescisao')->name('holerite_rescisao');
Route::get('holerite/{id}', 'PdfController@holerite')->name('holerite');
Route::post('grecibo', 'PdfController@holeriteEmpresa')->name('grecibo');
Route::post('grelacao', 'PdfController@gRelacao')->name('grelacao');
Route::post('grecibo-rescisao', 'PdfController@holeriteRescisaoGeral')->name('grecibo-rescisao');
Route::post('grelacao-rescisao', 'PdfController@rescisaoFolhaGeral')->name('grelacao-rescisao');
Route::get('/esocial-pdf', 'PdfController@eSocial');

/* rotas tce */
Route::resource('tce_contrato', 'TceContratoController');
Route::resource('tce_rescisao', 'TceRescisaoController');
Route::resource('cau_convenio', 'CauController');
Route::resource('cce_convenio', 'CceController');
Route::resource('tce_aditivo', 'TceAditivoController');
Route::resource('plano_estagio', 'PlanoEstagioController');

/* rotas recesso / ferias */
Route::get('lista_recesso', 'RecessoController@recessoList');
Route::get('lista_auto_avaliacao', ['uses' => 'AvaliacaoController@lista_avaliacao', 'as' => 'lista_auto_avaliacao']);

Route::get('assinar_avaliacao_estagiario/{id}', ['uses' => 'AvaliacaoController@assinar_avaliacao_estagiario', 'as' => 'assinar.avaliacao.estagiario']);
Route::get('assinar_avaliacao_supervisor/{id}', ['uses' => 'AvaliacaoController@assinar_avaliacao_supervisor', 'as' => 'assinar.avaliacao.supervisor']);
Route::get('lista_avaliacao_supervisor', ['uses' => 'AvaliacaoController@lista_avaliacao', 'as' => 'lista_avaliacao_supervisor']);

/*Empresa */
Route::resource('rhmais', 'RhmaisController');
Route::post('rhmais/{id}', 'RhmaisController@update');

/*Nova versão */
Route::get('modal', 'CursoController@index');
Route::get('setor-lista', 'SetorController@carregarSetor');
Route::get('curso-lista', 'CursoController@carregarCurso');
Route::get('motivo-lista', 'MotivoController@carregarMotivo');
Route::get('seguro-lista', 'SeguradoraController@carregarSeguro');
Route::get('user-lista', 'UserController@carregarUser');
Route::get('beneficio-lista', 'BeneficioController@carregarBeneficio');
Route::get('atividade-lista', 'AtividadeController@carregarAtividade');
Route::get('horario-lista', 'HorarioController@carregarHorario');
Route::get('orientador-lista', 'OrientadorController@carregarOrientador');
Route::get('supervisor-lista', 'SupervisorController@carregarSupervisor');
Route::get('instituicao-lista', 'InstituicaoController@carregarInstituicao');
Route::get('empresa-lista', 'EmpresaController@carregarEmpresa');
Route::get('estagiario-lista', 'EstagiarioController@carregarEstagiario');
Route::get('tceContrato-lista', 'TceContratoController@carregarTceContrato');
Route::get('tceRescisao-lista', 'TceRescisaoController@carregarRescisao');
Route::get('cau-lista', 'CauController@carregarCau');
Route::get('cce-lista', 'CceController@carregarCce');
