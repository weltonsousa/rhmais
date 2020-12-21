<?php

namespace App\Http\Controllers;

use App\TceRescisao;
use Carbon\Carbon;
use DB;
use Illuminate\Http\Request;

class TceRescisaoController extends Controller
{
    public function __contruct()
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
        // $rescisao = DB::table('tce_rescisao')
        //     ->join('estagiario', 'estagiario.id_estagiario', '=', 'tce_rescisao.estagiario_id')
        //     ->join('empresa', 'empresa.id_empresa', '=', 'tce_rescisao.empresa_id')
        //     ->join('instituicao', 'instituicao.id_instituicao', '=', 'tce_rescisao.instituicao_id')
        //     ->select(
        //         'estagiario.nome',
        //         'empresa.nome_fantasia',
        //         'instituicao.nome_instituicao',
        //         'tce_rescisao.id_tce_rescisao',
        //         'tce_rescisao.bolsa',
        //         'tce_rescisao.data_inicio',
        //         'tce_rescisao.data_fim'
        //     )
        //     ->get();

        // return view('tce_rescisao.index', compact('rescisao'));
        return view('tce_rescisao.index');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // $request->validate([
        //     'estagiario_id' => 'required|unique:tce_rescisao',
        //     'empresa_id' => 'required',
        //     'instituicao_id' => 'required',
        // ]);

        // $date_inicio = $request->get('data_inicio');
        // $date_fim = $request->get('data_fim');
        // $date_contrato = $request->get('data_contrato');
        // $ultimo_dia = $request->get('ultimo_dia');
        // $data_doc = $request->get('data_doc');

        // $valor = str_replace(',', '.', str_replace('.', '', $request->bolsa));
        // $valor = str_replace(',', '.', $request->bolsa);

        // $tce = new TceRescisao();
        // $tce->estagiario_id = $request->get('estagiario_id');
        // $tce->empresa_id = $request->get('empresa_id');
        // $tce->instituicao_id = $request->get('instituicao_id');
        // $tce->data_inicio = Carbon::createFromFormat('d/m/Y', $date_inicio)->format('Y-m-d');
        // $tce->data_fim = Carbon::createFromFormat('d/m/Y', $date_fim)->format('Y-m-d');
        // $tce->data_contrato = Carbon::createFromFormat('d/m/Y', $date_contrato)->format('Y-m-d');
        // $tce->ultimo_dia = Carbon::createFromFormat('d/m/Y', $ultimo_dia)->format('Y-m-d');
        // $tce->data_doc = Carbon::createFromFormat('d/m/Y', $data_doc)->format('Y-m-d');
        // $tce->horario_id = $request->get('horario_id');
        // $tce->apolice_id = $request->get('apolice_id');
        // $tce->beneficio_id = $request->get('beneficio_id');
        // $tce->atividade_id = $request->get('atividade_id');
        // $tce->setor_id = $request->get('setor_id');
        // $tce->supervisor_id = $request->get('supervisor_id');
        // $tce->bolsa = $valor;
        // $tce->motivo_id = $request->get('motivo_id');
        // $tce->obs = $request->get('obs');
        // $tce->ativo = 1;

        // if ($tce->ativo = 1) {
        //     DB::update('update tce_contrato set ativo = 2 where estagiario_id = ?', [$request->get('estagiario_id')]);
        //     DB::update('update recesso set ativo = 2 where estagiario_id = ?', [$request->get('estagiario_id')]);
        //     DB::update('update plano_estagio set ativo = 2 where estagiario_id = ?', [$request->get('estagiario_id')]);
        //     DB::update('update estagiario set ativo = 2 where id_estagiario = ?', [$request->get('estagiario_id')]);
        // }
        // $tce->save();

        // return redirect()->route('tce_rescisao.index')
        //     ->with('success', 'CADASTRADO COM SUCESSO.');

        $valor = str_replace(',', '.', $request->res_bolsa);

        $tce = new TceRescisao();
        $tce->estagiario_id = $request->res_estagiario_id;
        $tce->empresa_id = $request->res_empresa_id;
        $tce->instituicao_id = $request->res_instituicao_id;
        $tce->data_inicio = Carbon::createFromFormat('d/m/Y', $request->res_data_inicio)->format('Y-m-d');
        $tce->data_fim = Carbon::createFromFormat('d/m/Y', $request->res_data_fim)->format('Y-m-d');
        $tce->data_contrato = Carbon::createFromFormat('d/m/Y', $request->res_data_contrato)->format('Y-m-d');
        $tce->ultimo_dia = Carbon::createFromFormat('d/m/Y', $request->res_ultimo_dia)->format('Y-m-d');
        $tce->data_doc = Carbon::createFromFormat('d/m/Y', $request->res_data_doc)->format('Y-m-d');
        $tce->horario = $request->res_horario;
        $tce->seguro = $request->res_seguro;
        $tce->beneficio = $request->res_beneficio;
        $tce->atividade = $request->res_atividade;
        $tce->supervisor_id = $request->res_supervisor_id;
        $tce->tce_contrato_id = $request->res_tce_contrato_id;
        $tce->bolsa = $valor;
        $tce->motivo = $request->res_motivo;
        $tce->obs = $request->res_obs;
        $tce->ativo = 1;
        $tce->save();

        DB::update('update tce_contrato set ativo = 2 where estagiario_id = ?', [$request->res_estagiario_id]);
        DB::update('update recesso set ativo = 2 where estagiario_id = ?', [$request->res_estagiario_id]);
        DB::update('update plano_estagio set ativo = 2 where estagiario_id = ?', [$request->res_estagiario_id]);
        DB::update('update estagiario set ativo = 2 where id_estagiario = ?', [$request->res_estagiario_id]);

        return "1";
    }

    public function carregarRescisao()
    {
        return TceRescisao::with("estagiario")->with("empresa")->with("instituicao")->get();
    }
}
