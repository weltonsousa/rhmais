<?php

namespace App\Http\Controllers;

use App\Atividade;
use App\Beneficio;
use App\Empresa;
use App\Estagiario;
use App\Horario;
use App\Instituicao;
use App\Orientador;
use App\Seguradora;
use App\Setor;
use App\Supervisor;
use App\TceAditivo;
use App\TceContrato;
use Carbon\Carbon;
use DB;
use Illuminate\Http\Request;

class TceAditivoController extends Controller
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
        $tcesad = DB::table('tce_contrato')
            ->join('estagiario', 'estagiario.id', '=', 'tce_contrato.estagiario_id')
            ->join('empresa', 'empresa.id', '=', 'tce_contrato.empresa_id')
            ->join('instituicao', 'instituicao.id', '=', 'tce_contrato.instituicao_id')
            ->select(
                'estagiario.nome',
                'estagiario.id As estagiario_id',
                'empresa.nome_fantasia',
                'instituicao.nome_instituicao',
                'tce_contrato.bolsa',
                'tce_contrato.data_inicio',
                'tce_contrato.data_fim',
                'tce_contrato.contrato',
                'tce_contrato.assinado',
                'tce_contrato.obrigatorio',
                'tce_contrato.id',
                'tce_contrato.aditivo'
            )
            ->get();
        return view('tce_aditivo.index', compact('tcesad'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'estagiario_id' => 'required|unique:tce_aditivo',
            'empresa_id' => 'required',
            'instituicao_id' => 'required',
        ]);

        $date_doc = $request->get('data_doc');
        $date_inicio = $request->get('data_inicio');
        $date_fim = $request->get('data_fim');

        $valor = str_replace(',', '.', str_replace('.', '', $request->bolsa));

        $contrato = new TceAditivo();
        $contrato->estagiario_id = $request->get('estagiario_id');
        $contrato->empresa_id = $request->get('empresa_id');
        $contrato->instituicao_id = $request->get('instituicao_id');
        $contrato->data_doc = Carbon::createFromFormat('d/m/Y', $date_doc)->format('Y-m-d');
        $contrato->data_inicio = Carbon::createFromFormat('d/m/Y', $date_inicio)->format('Y-m-d');
        $contrato->data_fim = Carbon::createFromFormat('d/m/Y', $date_fim)->format('Y-m-d');
        $contrato->beneficio_id = $request->get('beneficio_id');
        $contrato->apolice_id = $request->get('apolice_id');
        $contrato->horario_id = $request->get('horario_id');
        $contrato->setor_id = $request->get('setor_id');
        $contrato->atividade_id = $request->get('atividade_id');
        $contrato->orientador_id = $request->get('orientador_id');
        $contrato->supervisor_id = $request->get('supervisor_id');
        $contrato->bolsa = $valor;
        $contrato->obrigatorio = $request->get('obrigatorio');
        $contrato->obs = $request->get('obs');
        $contrato->save();

        $tce_contrato = TceContrato::where('estagiario_id', $request->estagiario_id)
            ->update(['aditivo' => 1, 'bolsa' => $valor]);

        return redirect()->route('tce_aditivo.index')
            ->with('success', 'CADASTRADO COM SUCESSO');

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\TceAditivo  $tceAditivo
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {

        $tceAditivo = DB::table('tce_contrato')
            ->join('estagiario', 'estagiario.id', '=', 'tce_contrato.estagiario_id')
            ->join('empresa', 'empresa.id', '=', 'tce_contrato.empresa_id')
            ->join('instituicao', 'instituicao.id', '=', 'tce_contrato.instituicao_id')
            ->where('tce_contrato.id', '=', $id)
            ->get();

        $estagiarios = Estagiario::all();
        $instituicoes = Instituicao::all();
        $empresas = Empresa::all();
        $supervisor = Supervisor::all();
        $horarios = Horario::all();
        $atividades = Atividade::all();
        $orientador = Orientador::all();
        $apolices = Seguradora::all();
        $beneficios = Beneficio::all();
        $setores = Setor::all();

        return view('tce_aditivo.edit', compact('tceAditivo', 'estagiarios', 'instituicoes', 'empresas', 'supervisor', 'horarios', 'orientador', 'atividades', 'apolices', 'beneficios', 'setores', 'atividades'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\TceAditivo  $tceAditivo
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'estagiario_id' => 'required',
            'empresa_id' => 'required',
            'instituicao_id' => 'required',
        ]);

        $date_doc = $request->get('data_doc');
        $date_inicio = $request->get('data_inicio');
        $date_fim = $request->get('data_fim');

        $valor = str_replace(',', '.', str_replace('.', '', $request->bolsa));

        $contrato = TceContrato::find($id);
        $contrato->estagiario_id = $request->get('estagiario_id');
        $contrato->empresa_id = $request->get('empresa_id');
        $contrato->instituicao_id = $request->get('instituicao_id');
        $contrato->data_doc = Carbon::createFromFormat('d/m/Y', $date_doc)->format('Y-m-d');
        $contrato->data_inicio = Carbon::createFromFormat('d/m/Y', $date_inicio)->format('Y-m-d');
        $contrato->data_fim = Carbon::createFromFormat('d/m/Y', $date_fim)->format('Y-m-d');
        $contrato->beneficio_id = $request->get('beneficio_id');
        $contrato->apolice_id = $request->get('apolice_id');
        $contrato->horario_id = $request->get('horario_id');
        $contrato->setor_id = $request->get('setor_id');
        $contrato->atividade_id = $request->get('atividade_id');
        $contrato->orientador_id = $request->get('orientador_id');
        $contrato->supervisor_id = $request->get('supervisor_id');
        $contrato->bolsa = $valor;
        $contrato->obrigatorio = $request->get('obrigatorio');
        $contrato->obs = $request->get('obs');
        $contrato->aditivo = 1;
        $contrato->save();

        return redirect()->route('tce_aditivo.index')
            ->with('success', 'ATUALIZADO COM SUCESSO');

    }

}
