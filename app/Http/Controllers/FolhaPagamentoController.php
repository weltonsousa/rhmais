<?php

namespace App\Http\Controllers;

use App\BeneficioEstagiario;
use App\Empresa;
use App\Estagiario;
use App\FolhaPagamento;
use DB;
use Illuminate\Http\Request;

class FolhaPagamentoController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $referencia = request("referencia");
        $unidades = request('unidade_id');

        if (request('unidade_id') !== null || request('referencia') !== null) {

            $folhas = DB::table('folha_pagamento')
                ->join('empresa', 'empresa.id_empresa', '=', 'folha_pagamento.empresa_id')
                ->select('folha_pagamento.id_folha_pagamento', 'folha_pagamento.referencia', 'folha_pagamento.estagiario_id', 'folha_pagamento.empresa_id',
                    'folha_pagamento.valor_bolsa', 'folha_pagamento.faltas', 'folha_pagamento.valor_liquido', 'folha_pagamento.status', 'folha_pagamento.ativo')
                ->where("empresa_id", $unidades)
                ->where("referencia", $referencia)
                ->get();

            $unidade = DB::table('empresa')->get();

            $periodos = DB::table("folha_pagamento")->select(DB::raw('count(*) as periodo, referencia'))
                ->where('referencia', '<>', 1)
                ->groupBy('referencia')
                ->get();

            return view('folha_pagamento.index', [
                'periodos' => $periodos,
                'unidades' => $empresas = Empresa::where('id_empresa', request('unidades_id'))->get(),
                'folhas' => $folhas,
                'estagiarios' => $estagiarios = Estagiario::all(),
                'empresas' => $unidade,
                'referencia' => $referencia,
            ]);

        } else {

            $unidades = DB::table('cau')->join('empresa', 'empresa.id_empresa', '=', 'cau.empresa_id')->select('empresa.id_empresa', 'empresa.nome_fantasia', 'cau.data_inicio', 'cau.data_fim', 'cau.situacao', 'cau.id_cau')->get();
            $estagiarios = DB::table('estagiario')->get();
            $contratos = DB::table("tce_contrato")->get();

            foreach ($estagiarios as $estagiario) {
                if (!DB::table('folha_pagamento')->where([['estagiario_id', '=', $estagiario->id_estagiario], ['referencia', '=', date("Y/m")]])->get()->first()) {
                    $contrato_do_estagiario = DB::table('tce_contrato')->where('estagiario_id', $estagiario->id_estagiario)->where('ativo', 1)->get()->first();
                    if ($contrato_do_estagiario) {
                        DB::insert('insert into folha_pagamento (referencia, estagiario_id, empresa_id, valor_bolsa, faltas, valor_liquido, status, created_at, updated_at) values (?, ?, ?, ?, ?, ?, ?, ?, ?)', [date("Y/m"), $estagiario->id_estagiario, $estagiario->empresa_id, $contrato_do_estagiario->bolsa, 0, $contrato_do_estagiario->bolsa, 0, date("Y-m-d H:i:s"), date("Y-m-d H:i:s")]);
                    }
                }
            }

            $data = date("Y/m");
            $folhas = DB::table("folha_pagamento")->where('referencia', '=', $data)->get();
            $periodos = DB::table("folha_pagamento")->select(DB::raw('count(*) as periodo, referencia'))
                ->where('referencia', '<>', 1)
                ->groupBy('referencia')
                ->get();
            $empresas = DB::table('empresa')->get();
        }
        return view('folha_pagamento.index', [
            'unidades' => $unidades,
            'folhas' => $folhas,
            'estagiarios' => $estagiarios,
            'empresas' => $empresas,
            'periodos' => $periodos,
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\FolhaPagamento  $folhaPagamento
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $folha = DB::table('folha_pagamento')->where('id_folha_pagamento', $id)->get()->first();
        $empresa = DB::table('empresa')->where('id_empresa', $folha->empresa_id)->get()->first();
        $estagiario = DB::table('estagiario')->where('id_estagiario', $folha->estagiario_id)->get()->first();
        $contrato = DB::table('tce_contrato')->where('estagiario_id', $folha->estagiario_id)->get()->first();
        $beneficios = DB::table('beneficio')->get();

        $mesAtual = date("m");
        $users = DB::table('beneficio_estagiario')->where('estagiario_id', $folha->estagiario_id)->get();

        $mes = date("m");
        if ($mes == 1 || $mes == 3 || $mes == 5 || $mes == 7 || $mes == 8 || $mes == 10 || $mes == 12) {
            $dias_considerados = 31;
        } else if ($mes == 2) {
            $dias_considerados = 28;
        } else {
            $dias_considerados = 30;
        }

        return view('folha_pagamento.edit', ['folha' => $folha, 'empresa' => $empresa, 'estagiario' => $estagiario, 'contrato' => $contrato, 'dias_considerados' => $dias_considerados, 'beneficios' => $beneficios, 'users' => $users]);
    }

    public function editar(Request $request)
    {
        $folha = DB::table('folha_pagamento')->where('id_folha_pagamento', $request->folha_id)->get()->first();
        $beneficios = DB::table('beneficio_estagiario')->where('folha_id', '=', $request->folha_id)->get();
        $update = DB::update('update folha_pagamento set faltas = ? where id_folha_pagamento = ?', [$request->dias_falta, $request->folha_id]);

        if ($beneficios) {
            $credito = BeneficioEstagiario::where('folha_id', '=', $request->folha_id)->where('tipo', '=', 1)->sum('valor');
            $debito = BeneficioEstagiario::where('folha_id', '=', $request->folha_id)->where('tipo', '=', 2)->sum('valor');
            $data = DB::table('folha_pagamento')->where('id_folha_pagamento', $request->folha_id)->select('valor_bolsa', 'faltas')->get();

            foreach ($data as $da) {
                $bolsa = $da->valor_bolsa;
                $falta = $da->faltas;
            }

            $r_bolsa = $bolsa / 30;
            $r_bolsa = round($r_bolsa, 1);
            $faltaMes = $r_bolsa * $falta;
            $debito_credito = ($credito - $debito);
            $valor_debito = $debito + $faltaMes;
            $valor_credito = $credito + $bolsa;
            $resultado = ($bolsa + $debito_credito) - $faltaMes;

            DB::update('update folha_pagamento set valor_liquido = ?, valor_desconto = ?, valor_credito = ?, valor_falta = ?, status =1 where id_folha_pagamento = ?', [$resultado, $valor_debito, $valor_credito, $faltaMes, $folha->id_folha_pagamento]);

            return redirect()->route('folha_pagamento.index', ['referencia' => $folha->referencia, 'unidade_id' => $folha->empresa_id])
                ->with('success', 'ATUALIZADO COM SUCESSO');

        }
    }

}
