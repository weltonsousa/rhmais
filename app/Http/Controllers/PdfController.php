<?php

namespace App\Http\Controllers;

use App\Cau;
use App\Empresa;
use App\Instituicao;
use App\Rhmais;
use DB;
use Illuminate\Http\Request;
use PDF;

class PdfController extends Controller
{
    public function __contruct()
    {
        $this->middleware('auth');
    }
    // Contrato CAU
    public function cau($id)
    {
        $contrato = DB::table('cau')
            ->join('empresa', 'cau.empresa_id', '=', 'empresa.id_empresa')
            ->where('cau.id_cau', '=', $id)
            ->get();

        $rhmais = Rhmais::all();

        $data = ['contrato' => $contrato, 'rhmais' => $rhmais];
        $pdf = PDF::loadView('pdf.cau.index', $data);
        return $pdf->stream('cau.pdf');
    }
    // CCE
    public function cce($id)
    {
        $contrato = DB::table('cce')
            ->join('instituicao', 'cce.instituicao_id', '=', 'instituicao.id_instituicao')
            ->where('cce.id_cce', '=', $id)
            ->get();

        $rhmais = Rhmais::all();

        $data = ['contrato' => $contrato, 'rhmais' => $rhmais];
        $pdf = PDF::loadView('pdf.cce.index', $data);
        return $pdf->stream('index.pdf');
    }

    // Plano de Estagio
    public function planoEstagio($id)
    {
        $estagiarios = DB::table('estagiario')
            ->join('plano_estagio', 'estagiario.id_estagiario', '=', 'plano_estagio.estagiario_id')
            ->select(
                'estagiario.nome',
                'estagiario.cpf',
                'estagiario.curso',
                'estagiario.matricula',
                'estagiario.periodo',
                'estagiario.nivel'
            )
            ->where('estagiario.id_estagiario', '=', $id)
            ->get();

        $empresas = DB::table('empresa')
            ->join('plano_estagio', 'empresa.id_empresa', '=', 'plano_estagio.empresa_id')
            ->select(
                'empresa.razao_social',
                'empresa.cnpj',
                'empresa.nome_fantasia',
                'empresa.nome_rep',
                'empresa.cargo_rep',
                'empresa.telefone'
            )
            ->where('plano_estagio.estagiario_id', '=', $id)
            ->get();

        $instituicoes = DB::table('instituicao')
            ->join('plano_estagio', 'instituicao.id_instituicao', '=', 'plano_estagio.instituicao_id')
            ->select(
                'instituicao.razao_social',
                'instituicao.nome_instituicao',
                'instituicao.cnpj',
                'instituicao.nome_rep',
                'instituicao.cargo_rep',
                'instituicao.telefone',
                'instituicao.rua'
            )
            ->where('plano_estagio.estagiario_id', '=', $id)
            ->get();

        $plano = DB::table('plano_estagio')
            ->select('plano', 'atividade', 'obs')
            ->where('plano_estagio.estagiario_id', '=', $id)
            ->get();

        $supervisores = DB::table('supervisor')
            ->join('plano_estagio', 'supervisor.id_supervisor', '=', 'plano_estagio.supervisor_id')
            ->select('supervisor.nome_supervisor', 'supervisor.cargo', 'supervisor.formacao', 'supervisor.email', 'supervisor.telefone')
            ->where('plano_estagio.estagiario_id', '=', $id)
            ->get();

        $tceContrato = DB::table('tce_contrato')
            ->select(
                'tce_contrato.data_inicio',
                'tce_contrato.data_fim',
                'tce_contrato.bolsa',
                'tce_contrato.obrigatorio',
                'tce_contrato.data_doc',
                'tce_contrato.created_at')
            ->where('tce_contrato.estagiario_id', '=', $id)
            ->get();

        $setores = DB::table('setor')
            ->join('plano_estagio', 'setor.id_setor', '=', 'plano_estagio.setor_id')
            ->select('setor.nome_setor')
            ->where('plano_estagio.estagiario_id', '=', $id)
            ->get();

        $data = ['estagiarios' => $estagiarios, 'instituicoes' => $instituicoes,
            'empresas' => $empresas, 'supervisores' => $supervisores,
            'tceContrato' => $tceContrato, 'plano' => $plano, 'setores' => $setores];
        $pdf = PDF::loadView('pdf.plano.index', $data);
        return $pdf->stream('plano_estagio.pdf');
    }

    // Holerite Estagiário
    public function holerite($id)
    {
        $folha = DB::table('estagiario')
            ->join('folha_pagamento', 'estagiario.id_estagiario', '=', 'folha_pagamento.estagiario_id')
            ->join('empresa', 'estagiario.empresa_id', '=', 'empresa.id_empresa')
            ->join('tce_contrato', 'estagiario.id_estagiario', '=', 'tce_contrato.estagiario_id')
            ->where('folha_pagamento.status', '=', 1)
            ->where('folha_pagamento.id_folha_pagamento', '=', $id)
            ->get();

        $beneficio = DB::table('beneficio_estagiario')
            ->join('beneficio', 'beneficio_estagiario.beneficio_id', '=', 'beneficio.id_beneficio')
            ->join('folha_pagamento', 'beneficio_estagiario.folha_id', '=', 'folha_pagamento.id_folha_pagamento')
            ->select('beneficio.nome_beneficio', 'beneficio_estagiario.valor', 'beneficio_estagiario.tipo', 'beneficio_estagiario.beneficio_id')
            ->where('folha_pagamento.id_folha_pagamento', '=', $id)
            ->get();

        $rhmais = Rhmais::all();

        // $beneficios = DB::table('beneficio_estagiario')->where('folha_id', '=', $id)->get();
        // $credito = BeneficioEstagiario::where('folha_id', '=', $id)->where('tipo', '=', 1)->sum('valor');
        // $debito = BeneficioEstagiario::where('folha_id', '=', $id)->where('tipo', '=', 2)->sum('valor');
        $data = DB::table('folha_pagamento')->where('id_folha_pagamento', $id)->select('valor_bolsa', 'faltas')->get();
        $faltas = DB::table('folha_pagamento')->where('id_folha_pagamento', $id)->pluck('faltas');

        // foreach ($data as $da) {
        //     $falta = $da->faltas;
        // }

        $data = [
            'folha' => $folha, 'beneficio' => $beneficio,
            'faltas' => $faltas, 'rhmais' => $rhmais,
        ];

        $pdf = PDF::loadView('pdf.holerite.index', $data);
        return $pdf->stream('holerite.pdf');
    }

    //Holerite geral da empresa
    public function holeriteEmpresa(Request $request)
    {
        $ref = request("referencia");
        $und = request('unidade_id');

        $folha = DB::table('estagiario')
            ->join('empresa', 'estagiario.empresa_id', '=', 'empresa.id_empresa')
            ->join('tce_contrato', 'tce_contrato.estagiario_id', '=', 'estagiario.id_estagiario')
            ->join('folha_pagamento', 'folha_pagamento.estagiario_id', '=', 'estagiario.id_estagiario')
            ->where('folha_pagamento.status', '=', 1)
            ->where('folha_pagamento.empresa_id', '=', $und)
            ->where('folha_pagamento.referencia', '=', $ref)
            ->get();

        $beneficio = DB::table('beneficio_estagiario')
            ->join('beneficio', 'beneficio.id_beneficio', '=', 'beneficio_estagiario.beneficio_id')
            ->join('folha_pagamento', 'beneficio_estagiario.folha_id', '=', 'folha_pagamento.id_folha_pagamento')
            ->where('beneficio_estagiario.referencia', '=', $ref)
            ->get();

        $rhmais = Rhmais::all();

        $data = ['folha' => $folha, 'beneficio' => $beneficio,
            'rhmais' => $rhmais];

        $pdf = PDF::loadView('pdf.holerite_geral.index', $data);
        return $pdf->stream('holerite-geral.pdf');
    }

    // Holerite Rescisao Geral Empresa
    public function holeriteRescisaoGeral(Request $request)
    {
        $ref = request("referencia");
        $und = request('unidade_id');

        if (request('unidade_id') !== null || request('referencia') == !null) {

            $folhas = DB::table('estagiario')
                ->join('folha_rescisao', 'estagiario.id_estagiario', '=', 'folha_rescisao.estagiario_id')
                ->join('empresa', 'estagiario.empresa_id', '=', 'empresa.id_empresa')
                ->join('tce_contrato', 'estagiario.id_estagiario', '=', 'tce_contrato.estagiario_id')
                ->where('folha_rescisao.status', '=', 1)
                ->where('folha_rescisao.empresa_id', '=', $und)
                ->where('folha_rescisao.referencia', '=', $ref)
                ->get();

            $estagiarios = DB::table('estagiario')
                ->join('folha_rescisao', 'estagiario.id_estagiario', '=', 'folha_rescisao.estagiario_id')
                ->where('folha_rescisao.empresa_id', '=', $und)
                ->where('folha_rescisao.referencia', '=', $ref)
                ->get();

            $instituicoes = Instituicao::all();
            $empresas = Empresa::all();

        } else {
            $folhas = DB::table('estagiario')
                ->join('folha_rescisao', 'estagiario.id_estagiario', '=', 'folha_rescisao.estagiario_id')
                ->join('empresa', 'estagiario.empresa_id', '=', 'empresa.id_empresa')
                ->join('tce_contrato', 'estagiario.id_estagiario', '=', 'tce_contrato.estagiario_id')
                ->where('folha_rescisao.status', '=', 1)
                ->where('folha_rescisao.empresa_id', '=', $und)
                ->where('folha_rescisao.referencia', '=', $ref)
                ->get();
        };
        $data = ['folhas' => $folhas,
            'instituicoes' => $instituicoes,
            'motivos' => $motivos = [],
            'atividades' => $atividades = [],
            'tceContrato' => $tceContrato = [],
            'empresas' => $empresas,
            'estagiarios' => $estagiarios,
        ];
        $pdf = PDF::loadView('pdf.holerite_rescisao_geral.index', $data);
        return $pdf->stream('holerite-rescisao.pdf');
    }

    // Holerite Rescisao Estagirio
    public function holeriteRescisao($id)
    {
        $folhaRescisao = DB::table('estagiario')
            ->join('folha_rescisao', 'estagiario.id_estagiario', '=', 'folha_rescisao.estagiario_id')
            ->join('empresa', 'estagiario.empresa_id', '=', 'empresa.id_empresa')
            ->join('tce_rescisao', 'estagiario.id_estagiario', '=', 'tce_rescisao.estagiario_id')
            ->where('folha_rescisao.id_folha_rescisao', '=', $id)
            ->get();

        $tceRescisao = DB::table('estagiario')
            ->join('tce_rescisao', 'estagiario.id_estagiario', '=', 'tce_rescisao.estagiario_id')
            ->join('folha_rescisao', 'estagiario.id_estagiario', '=', 'folha_rescisao.estagiario_id')
            ->where('folha_rescisao.id_folha_rescisao', '=', $id)
            ->get();

        $beneficio = DB::table('beneficio_estagiario')
            ->join('beneficio', 'beneficio_estagiario.beneficio_id', '=', 'beneficio.id_beneficio')
            ->join('folha_rescisao', 'beneficio_estagiario.folha_id', '=', 'folha_rescisao.id_folha_rescisao')
            ->select('beneficio.nome_beneficio', 'beneficio_estagiario.valor', 'beneficio_estagiario.tipo', 'beneficio_estagiario.beneficio_id')
            ->where('folha_rescisao.id_folha_rescisao', '=', $id)
            ->get();

        $rhmais = Rhmais::all();

        // $beneficios = DB::table('beneficio_estagiario')->where('folha_id', '=', $id)->get();
        // $credito = BeneficioEstagiario::where('folha_id', '=', $id)->where('tipo', '=', 1)->sum('valor');
        // $debito = BeneficioEstagiario::where('folha_id', '=', $id)->where('tipo', '=', 2)->sum('valor');
        $data = DB::table('folha_pagamento')->where('id_folha_pagamento', $id)->select('valor_bolsa', 'faltas')->get();
        $faltas = DB::table('folha_pagamento')->where('id_folha_pagamento', $id)->pluck('faltas');

        // foreach ($data as $da) {
        //     $falta = $da->faltas;
        // }

        // $beneficio = [];
        // $faltas = [];
        // $rs_credito = 2.00;
        // $rs_debito = 2.00;

        $data = [
            'tceRescisao' => $tceRescisao,
            'folhaRescisao' => $folhaRescisao,
            'beneficio' => $beneficio,
            'rhmais' => $rhmais,
            'faltas' => $faltas,

        ];
        $pdf = PDF::loadView('pdf.holerite_rescisao.index', $data);
        return $pdf->stream('holerite-rescisao.pdf');
    }

    // Rescisao empresa geral estagiario
    public function rescisaoFolhaGeral(Request $request)
    {
        $ref = request("referencia");
        $und = request('unidade_id');

        if (request('unidade_id') !== null || request('referencia') == !null) {

            $folhaRescisao = DB::table('estagiario')
                ->join('folha_rescisao', 'estagiario.id_estagiario', '=', 'folha_rescisao.estagiario_id')
                ->join('empresa', 'estagiario.empresa_id', '=', 'empresa.id_empresa')
                ->join('tce_rescisao', 'estagiario.id_estagiario', '=', 'tce_rescisao.estagiario_id')
                ->where('folha_rescisao.empresa_id', '=', $und)
                ->where('folha_rescisao.referencia', '=', $ref)
                ->get();

        } else {
            $folhaRescisao = DB::table('estagiario')
                ->join('folha_rescisao', 'estagiario.id_estagiario', '=', 'folha_rescisao.estagiario_id')
                ->join('empresa', 'estagiario.empresa_id', '=', 'empresa.id_empresa')
                ->join('tce_rescisao', 'estagiario.id_estagiario', '=', 'tce_rescisao.estagiario_id')
                ->where('folha_rescisao.empresa_id', '=', $und)
                ->where('folha_rescisao.referencia', '=', $ref)
                ->whereMonth('folha_rescisao.created_at', '=', date('m'))
                ->get();
        }
        $data = ['folhaRescisao' => $folhaRescisao];
        $pdf = PDF::loadView('pdf.valores_rescisao.index', $data);
        return $pdf->stream('index.pdf');
    }

    // Folha da empresa geral
    public function gRelacao(Request $request)
    {
        $ref = request("referencia");
        $und = request('unidade_id');

        if (request('unidade_id') !== null || request('referencia') == !null) {

            $folha = DB::table('estagiario')
                ->join('folha_pagamento', 'estagiario.id_estagiario', '=', 'folha_pagamento.estagiario_id')
                ->join('tce_contrato', 'estagiario.id_estagiario', '=', 'tce_contrato.estagiario_id')
                ->where('folha_pagamento.status', '=', 1)
                ->where('folha_pagamento.empresa_id', '=', $und)
                ->where('folha_pagamento.referencia', '=', $ref)
                ->get();

            $qtd_estagiario = $folha->count();

            $total_liquido = 0;
            foreach ($folha as $valor) {
                $total_liquido += $valor->valor_liquido;
            }
            $total_liquido;

            $empresa = Empresa::where('id_empresa', $und)->get();

        }

        $data = ['folha' => $folha, 'empresa' => $empresa,
            'qtd_estagiario' => $qtd_estagiario, 'total_liquido' => $total_liquido];
        $pdf = PDF::loadView('pdf.folha.index', $data);
        return $pdf->stream('grelacao.pdf');
    }

    // Avaliacao
    public function generateAvaliacao()
    {
        $pdf = PDF::loadView('pdf.avaliacao.index');
        return $pdf->stream('avalicao.pdf');
    }

    // Fechamento folha
    public function generateFechamento($empresa_id)
    {

        $fechamento = DB::table('cobranca')
            ->join('empresa', 'empresa.id_empresa', '=', 'cobranca.empresa_id')
            ->join('cau', 'cobranca.empresa_id', '=', 'empresa.id_empresa')
            ->join('tce_contrato', 'tce_contrato.empresa_id', '=', 'empresa.id_empresa')
            ->join('estagiario', 'estagiario.id_estagiario', '=', 'tce_contrato.estagiario_id')
            ->where('empresa.id_empresa', '=', $empresa_id)
            ->whereMonth('cobranca.created_at', '=', date('m'))
            ->get();

        $data = ['fechamento' => $fechamento];
        $pdf = PDF::loadView('pdf.fechamento.index', $data);
        return $pdf->stream('fechamento.pdf');
    }
// Rescisao contrato TCE
    public function rescisaoTce($id)
    {
        $estagiarios = DB::table('estagiario')
            ->join('tce_rescisao', 'estagiario.id_estagiario', '=', 'tce_rescisao.estagiario_id')
            ->select(
                'estagiario.nome',
                'estagiario.rua',
                'estagiario.numero',
                'estagiario.bairro',
                'estagiario.cidade',
                'estagiario.estado',
                'estagiario.cep',
                'estagiario.telefone',
                'estagiario.celular',
                'estagiario.cpf',
                'estagiario.rg',
                'estagiario.email',
                'estagiario.curso',
                'estagiario.periodo'
            )
            ->where('tce_rescisao.id_tce_rescisao', '=', $id)
            ->get();

        $empresas = DB::table('empresa')
            ->join('tce_rescisao', 'empresa.id_empresa', '=', 'tce_rescisao.empresa_id')
            ->select(
                'empresa.razao_social',
                'empresa.cnpj',
                'empresa.nome_fantasia',
                'empresa.telefone',
                'empresa.numero',
                'empresa.bairro',
                'empresa.cidade',
                'empresa.estado',
                'empresa.cep',
                'empresa.nome_rep',
                'empresa.cargo_rep',
                'empresa.telefone',
                'empresa.rua'
            )
            ->where('tce_rescisao.id_tce_rescisao', '=', $id)
            ->get();

        $instituicoes = DB::table('instituicao')
            ->join('tce_rescisao', 'instituicao.id_instituicao', '=', 'tce_rescisao.instituicao_id')
            ->select(
                'instituicao.razao_social',
                'instituicao.nome_instituicao',
                'instituicao.cnpj',
                'instituicao.numero',
                'instituicao.telefone',
                'instituicao.bairro',
                'instituicao.cidade',
                'instituicao.estado',
                'instituicao.cep',
                'instituicao.nome_rep',
                'instituicao.cargo_rep',
                'instituicao.telefone',
                'instituicao.rua'
            )
            ->where('tce_rescisao.id_tce_rescisao', '=', $id)
            ->get();

        $horarios = DB::table('horario')
            ->join('tce_rescisao', 'horario.id_horario', '=', 'tce_rescisao.horario_id')
            ->select('horario.descricao')
            ->where('tce_rescisao.id_tce_rescisao', '=', $id)
            ->get();

        $atividades = DB::table('atividade')
            ->join('tce_rescisao', 'atividade.id_atividade', '=', 'tce_rescisao.atividade_id')
            ->select('atividade.nome_atividade')
            ->where('tce_rescisao.id_tce_rescisao', '=', $id)
            ->get();

        $seguros = DB::table('seguradora')
            ->join('tce_rescisao', 'seguradora.id_seguradora', '=', 'tce_rescisao.apolice_id')
            ->select('seguradora.nome_seguradora')
            ->where('tce_rescisao.id_tce_rescisao', '=', $id)
            ->get();

        $supervisores = DB::table('supervisor')
            ->join('tce_rescisao', 'supervisor.id_supervisor', '=', 'tce_rescisao.supervisor_id')
            ->select('supervisor.nome_supervisor', 'supervisor.cargo', 'supervisor.formacao', 'supervisor.email')
            ->where('tce_rescisao.id_tce_rescisao', '=', $id)
            ->get();

        $beneficios = DB::table('beneficio')
            ->join('tce_rescisao', 'beneficio.id_beneficio', '=', 'tce_rescisao.beneficio_id')
            ->select('beneficio.nome_beneficio')
            ->where('tce_rescisao.id_tce_rescisao', '=', $id)
            ->get();

        $tceRescisao = DB::table('tce_rescisao')
            ->select(
                'tce_rescisao.data_inicio',
                'tce_rescisao.data_fim',
                'tce_rescisao.bolsa',
                'tce_rescisao.data_doc',
                'tce_rescisao.ultimo_dia',
                'tce_rescisao.created_at')
            ->where('tce_rescisao.id_tce_rescisao', '=', $id)
            ->get();

        $motivos = DB::table('motivo')
            ->join('tce_rescisao', 'motivo.id', '=', 'tce_rescisao.motivo_id')
            ->select('motivo.nome_motivo')
            ->where('tce_rescisao.id_tce_rescisao', '=', $id)
            ->get();

        $data = ['estagiarios' => $estagiarios, 'instituicoes' => $instituicoes,
            'empresas' => $empresas, 'horarios' => $horarios, 'atividades' => $atividades,
            'seguros' => $seguros, 'supervisores' => $supervisores,
            'tceRescisao' => $tceRescisao, 'beneficios' => $beneficios, 'motivos' => $motivos];
        $pdf = PDF::loadView('pdf.tce_rescisao.index', $data);
        return $pdf->stream('tce-rescisao.pdf');
    }

    // Contrato aditivo TCE
    public function contratoAditivoTce($id)
    {

        $contrato = DB::table('tce_contrato')
            ->join('beneficio', 'beneficio.id_beneficio', '=', 'tce_contrato.beneficio_id')
            ->join('atividade', 'atividade.id_atividade', '=', 'tce_contrato.atividade_id')
            ->join('horario', 'horario.id_horario', '=', 'tce_contrato.horario_id')
            ->join('supervisor', 'supervisor.id_supervisor', '=', 'tce_contrato.supervisor_id')
            ->select('tce_contrato.bolsa_aditivo', 'tce_contrato.data_fim', 'atividade.nome_atividade', 'supervisor.nome_supervisor', 'horario.descricao', 'beneficio.nome_beneficio')
            ->where('estagiario_id', '=', $id)->get();
        $aditivo = DB::table('tce_aditivo')
            ->join('beneficio', 'beneficio.id_beneficio', '=', 'tce_aditivo.beneficio_id')
            ->join('atividade', 'atividade.id_atividade', '=', 'tce_aditivo.atividade_id')
            ->join('horario', 'horario.id_horario', '=', 'tce_aditivo.horario_id')
            ->join('supervisor', 'supervisor.id_supervisor', '=', 'tce_aditivo.supervisor_id')
            ->select('tce_aditivo.bolsa', 'tce_aditivo.data_fim', 'atividade.nome_atividade', 'supervisor.nome_supervisor', 'horario.descricao', 'beneficio.nome_beneficio')
            ->where('estagiario_id', '=', $id)->get();

        $tceContrato = DB::table('tce_aditivo')
            ->select(
                'tce_aditivo.data_inicio',
                'tce_aditivo.data_fim',
                'tce_aditivo.bolsa',
                'tce_aditivo.obrigatorio',
                'tce_aditivo.data_doc',
                'tce_aditivo.created_at')
            ->where('tce_aditivo.estagiario_id', '=', $id)
            ->get();

        $estagiarios = DB::table('estagiario')
            ->join('tce_aditivo', 'estagiario.id_estagiario', '=', 'tce_aditivo.estagiario_id')
            ->select(
                'estagiario.nome',
                'estagiario.rua',
                'estagiario.numero',
                'estagiario.bairro',
                'estagiario.cidade',
                'estagiario.estado',
                'estagiario.cep',
                'estagiario.celular',
                'estagiario.cpf',
                'estagiario.rg',
                'estagiario.email',
                'estagiario.curso',
                'estagiario.matricula',
                'estagiario.periodo'
            )
            ->where('tce_aditivo.estagiario_id', '=', $id)
            ->get();

        $empresas = DB::table('empresa')
            ->join('tce_aditivo', 'empresa.id_empresa', '=', 'tce_aditivo.empresa_id')
            ->select(
                'empresa.razao_social',
                'empresa.cnpj',
                'empresa.numero',
                'empresa.bairro',
                'empresa.cidade',
                'empresa.estado',
                'empresa.cep',
                'empresa.nome_rep',
                'empresa.cargo_rep',
                'empresa.telefone',
                'empresa.rua'
            )
            ->where('tce_aditivo.estagiario_id', '=', $id)
            ->get();

        $instituicoes = DB::table('instituicao')
            ->join('tce_aditivo', 'instituicao.id_instituicao', '=', 'tce_aditivo.instituicao_id')
            ->select(
                'instituicao.razao_social',
                'instituicao.cnpj',
                'instituicao.numero',
                'instituicao.bairro',
                'instituicao.cidade',
                'instituicao.estado',
                'instituicao.cep',
                'instituicao.nome_rep',
                'instituicao.cargo_rep',
                'instituicao.telefone',
                'instituicao.rua'
            )
            ->where('tce_aditivo.estagiario_id', '=', $id)
            ->get();

        $horarios = DB::table('horario')
            ->join('tce_aditivo', 'horario.id_horario', '=', 'tce_aditivo.horario_id')
            ->select('horario.descricao')
            ->where('tce_aditivo.estagiario_id', '=', $id)
            ->get();

        $atividades = DB::table('atividade')
            ->join('tce_aditivo', 'atividade.id_atividade', '=', 'tce_aditivo.atividade_id')
            ->select('atividade.nome_atividade')
            ->where('tce_aditivo.estagiario_id', '=', $id)
            ->get();

        $seguros = DB::table('seguradora')
            ->join('tce_aditivo', 'seguradora.id_seguradora', '=', 'tce_aditivo.apolice_id')
            ->select('seguradora.nome_seguradora')
            ->where('tce_aditivo.estagiario_id', '=', $id)
            ->get();

        $supervisores = DB::table('supervisor')
            ->join('tce_aditivo', 'supervisor.id_supervisor', '=', 'tce_aditivo.supervisor_id')
            ->select('supervisor.nome_supervisor', 'supervisor.cargo', 'supervisor.formacao', 'supervisor.telefone', 'supervisor.email')
            ->where('tce_aditivo.estagiario_id', '=', $id)
            ->get();

        $orientadores = DB::table('orientador')
            ->join('tce_aditivo', 'orientador.id_orientador', '=', 'tce_aditivo.orientador_id')
            ->select('orientador.nome_orientador', 'orientador.cargo')
            ->where('tce_aditivo.estagiario_id', '=', $id)
            ->get();

        $beneficios = DB::table('beneficio')
            ->join('tce_aditivo', 'beneficio.id_beneficio', '=', 'tce_aditivo.beneficio_id')
            ->select('beneficio.nome_beneficio')
            ->where('tce_aditivo.estagiario_id', '=', $id)
            ->get();

        $data = ['estagiarios' => $estagiarios, 'instituicoes' => $instituicoes,
            'empresas' => $empresas, 'horarios' => $horarios, 'atividades' => $atividades,
            'seguros' => $seguros, 'supervisores' => $supervisores, 'orientadores' => $orientadores,
            'tceContrato' => $tceContrato, 'beneficios' => $beneficios,
            'contrato' => $contrato, 'aditivo' => $aditivo];
        $pdf = PDF::loadView('pdf.tce_aditivo.index', $data);
        return $pdf->stream('aditivo.pdf');
    }

    // Contrato TCE
    public function contratoTce($id)
    {
        $estagiarios = DB::table('estagiario')
            ->join('tce_contrato', 'estagiario.id_estagiario', '=', 'tce_contrato.estagiario_id')
            ->select(
                'estagiario.nome',
                'estagiario.rua',
                'estagiario.numero',
                'estagiario.bairro',
                'estagiario.cidade',
                'estagiario.estado',
                'estagiario.cep',
                'estagiario.celular',
                'estagiario.cpf',
                'estagiario.rg',
                'estagiario.email',
                'estagiario.curso',
                'estagiario.matricula',
                'estagiario.periodo'
            )
            ->where('estagiario.id_estagiario', '=', $id)
            ->get();

        $empresas = DB::table('empresa')
            ->join('tce_contrato', 'empresa.id_empresa', '=', 'tce_contrato.empresa_id')
            ->select(
                'empresa.razao_social',
                'empresa.cnpj',
                'empresa.numero',
                'empresa.bairro',
                'empresa.cidade',
                'empresa.estado',
                'empresa.cep',
                'empresa.nome_rep',
                'empresa.cargo_rep',
                'empresa.telefone',
                'empresa.rua'
            )
            ->where('tce_contrato.estagiario_id', '=', $id)
            ->get();

        $instituicoes = DB::table('instituicao')
            ->join('tce_contrato', 'instituicao.id_instituicao', '=', 'tce_contrato.instituicao_id')
            ->select(
                'instituicao.razao_social',
                'instituicao.cnpj',
                'instituicao.numero',
                'instituicao.bairro',
                'instituicao.cidade',
                'instituicao.estado',
                'instituicao.cep',
                'instituicao.nome_rep',
                'instituicao.cargo_rep',
                'instituicao.telefone',
                'instituicao.rua'
            )
            ->where('tce_contrato.estagiario_id', '=', $id)
            ->get();

        $horarios = DB::table('horario')
            ->join('tce_contrato', 'horario.id_horario', '=', 'tce_contrato.horario_id')
            ->select('horario.descricao')
            ->where('tce_contrato.estagiario_id', '=', $id)
            ->get();

        $atividades = DB::table('atividade')
            ->join('tce_contrato', 'atividade.id_atividade', '=', 'tce_contrato.atividade_id')
            ->select('atividade.nome_atividade')
            ->where('tce_contrato.estagiario_id', '=', $id)
            ->get();

        $seguros = DB::table('seguradora')
            ->join('tce_contrato', 'seguradora.id_seguradora', '=', 'tce_contrato.apolice_id')
            ->select('seguradora.nome_seguradora')
            ->where('tce_contrato.estagiario_id', '=', $id)
            ->get();

        $supervisores = DB::table('supervisor')
            ->join('tce_contrato', 'supervisor.id_supervisor', '=', 'tce_contrato.supervisor_id')
            ->select('supervisor.nome_supervisor', 'supervisor.cargo', 'supervisor.formacao', 'supervisor.email', 'supervisor.telefone')
            ->where('tce_contrato.estagiario_id', '=', $id)
            ->get();

        $orientadores = DB::table('orientador')
            ->join('tce_contrato', 'orientador.id_orientador', '=', 'tce_contrato.orientador_id')
            ->select('orientador.nome_orientador', 'orientador.cargo')
            ->where('tce_contrato.estagiario_id', '=', $id)
            ->get();

        $beneficios = DB::table('beneficio')
            ->join('tce_contrato', 'beneficio.id_beneficio', '=', 'tce_contrato.beneficio_id')
            ->select('beneficio.nome_beneficio')
            ->where('tce_contrato.estagiario_id', '=', $id)
            ->get();

        $tceContrato = DB::table('tce_contrato')
            ->select(
                'tce_contrato.data_inicio',
                'tce_contrato.data_fim',
                'tce_contrato.bolsa',
                'tce_contrato.obrigatorio',
                'tce_contrato.data_doc',
                'tce_contrato.created_at')
            ->where('tce_contrato.estagiario_id', '=', $id)
            ->get();

        DB::update('update tce_contrato set assinado = 1 where estagiario_id = ?', [$id]);

        $data = ['estagiarios' => $estagiarios, 'instituicoes' => $instituicoes,
            'empresas' => $empresas, 'horarios' => $horarios, 'atividades' => $atividades,
            'seguros' => $seguros, 'supervisores' => $supervisores, 'orientadores' => $orientadores,
            'tceContrato' => $tceContrato, 'beneficios' => $beneficios];
        $pdf = PDF::loadView('pdf.tce.index', $data);
        return $pdf->stream('tce.pdf');
    }
    // eSocial
    public function eSocial()
    {
        $estagiarios = DB::table('estagiario')
            ->join('tce_contrato', 'estagiario.id_estagiario', '=', 'tce_contrato.estagiario_id')
            ->select(
                'estagiario.nome',
                'estagiario.rua',
                'estagiario.numero',
                'estagiario.bairro',
                'estagiario.cidade',
                'estagiario.estado',
                'estagiario.cep',
                'estagiario.celular',
                'estagiario.cpf',
                'estagiario.rg',
                'estagiario.email',
                'estagiario.curso',
                'estagiario.matricula',
                'estagiario.periodo'
            )
        // ->where('estagiario.id_estagiario', '=', $id)
            ->get();

        $empresas = DB::table('empresa')
            ->join('tce_contrato', 'empresa.id_empresa', '=', 'tce_contrato.empresa_id')
            ->select(
                'empresa.razao_social',
                'empresa.cnpj',
                'empresa.numero',
                'empresa.bairro',
                'empresa.cidade',
                'empresa.estado',
                'empresa.cep',
                'empresa.nome_rep',
                'empresa.cargo_rep',
                'empresa.telefone',
                'empresa.rua'
            )
            ->get();

        $instituicoes = DB::table('instituicao')
            ->join('tce_contrato', 'instituicao.id_instituicao', '=', 'tce_contrato.instituicao_id')
            ->select(
                'instituicao.razao_social',
                'instituicao.cnpj',
                'instituicao.numero',
                'instituicao.bairro',
                'instituicao.cidade',
                'instituicao.estado',
                'instituicao.cep',
                'instituicao.nome_rep',
                'instituicao.cargo_rep',
                'instituicao.telefone',
                'instituicao.rua'
            )
            ->get();

        $tceContrato = DB::table('tce_contrato')
            ->select(
                'tce_contrato.data_inicio',
                'tce_contrato.data_fim',
                'tce_contrato.bolsa',
                'tce_contrato.obrigatorio',
                'tce_contrato.data_doc',
                'tce_contrato.created_at')
            ->get();

        $data = ['estagiarios' => $estagiarios, 'instituicoes' => $instituicoes,
            'empresas' => $empresas, 'tceContrato' => $tceContrato];
        $pdf = PDF::loadView('pdf.tce.esocial', $data);
        return $pdf->stream('esocial-pdf.pdf');
    }

}
