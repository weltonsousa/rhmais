<?php

namespace App\Http\Controllers;

use App\Atividade;
use App\Beneficio;
use App\Empresa;
use App\Estagiario;
use App\Horario;
use App\Instituicao;
use App\Motivo;
use App\Orientador;
use App\Seguradora;
use App\Setor;
use App\Supervisor;
use App\TceContrato;
use Carbon\Carbon;
use DB;
use Illuminate\Http\Request;

class TceContratoController extends Controller
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
        $tces = TceContrato::all();
        $estagiarios = Estagiario::all();
        $beneficios = Beneficio::all();
        $seguros = Seguradora::all();
        $setores = Setor::all();
        $orientadores = Orientador::all();
        $supervisores = Supervisor::all();
        $atividades = Atividade::all();
        $motivos = Motivo::all();
        $horarios = Horario::all();

        return view('tce_contrato.index', compact('tces', 'estagiarios', 'beneficios', 'seguros', 'setores', 'orientadores', 'supervisores', 'atividades', 'motivos', 'horarios'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $empresas = Empresa::all();
        $estagiarios = Estagiario::all();
        $instituicoes = Instituicao::all();
        $beneficios = Beneficio::all();
        $seguros = Seguradora::all();
        $setores = Setor::all();
        $orienta = Orientador::all();
        $super = Supervisor::all();

        return view('tce_contrato.create', compact('empresas', 'instituicoes', 'estagiarios', 'beneficios', 'seguros', 'setores', 'atividades', 'orienta', 'super'));
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
        //     'estagiario_id' => 'required|unique:tce_contrato',
        //     'empresa_id' => 'required',
        //     'instituicao_id' => 'required',
        // ]);

        // $date_doc = $request->get('data_doc');
        // $date_inicio = $request->get('data_inicio');
        // $date_fim = $request->get('data_fim');

        // $bolsa = str_replace(',', '.', str_replace('.', '', $request->bolsa));

        // $contrato = new TceContrato();
        // $contrato->estagiario_id = $request->get('estagiario_id');
        // $contrato->empresa_id = $request->get('empresa_id');
        // $contrato->instituicao_id = $request->get('instituicao_id');
        // $contrato->data_doc = Carbon::createFromFormat('d/m/Y', $date_doc)->format('Y-m-d');
        // $contrato->data_inicio = Carbon::createFromFormat('d/m/Y', $date_inicio)->format('Y-m-d');
        // $contrato->data_fim = Carbon::createFromFormat('d/m/Y', $date_fim)->format('Y-m-d');
        // $contrato->beneficio_id = $request->get('beneficio_id');
        // $contrato->apolice_id = $request->get('apolice_id');
        // $contrato->horario_id = $request->get('horario_id');
        // $contrato->setor_id = $request->get('setor_id');
        // $contrato->atividade_id = $request->get('atividade_id');
        // $contrato->orientador_id = $request->get('orientador_id');
        // $contrato->supervisor_id = $request->get('supervisor_id');
        // $contrato->bolsa = $bolsa;
        // $contrato->obrigatorio = $request->get('obrigatorio');
        // $contrato->obs = $request->get('obs');
        // $contrato->save();

        // return redirect()->route('tce_contrato.index')
        //     ->with('success', 'CADASTRADO COM SUCESSO');

        if ($request->has("e_id_tce_contrato")) {
            // $data_doc = $request->data_doc;
            // $data_inicio = $request->data_inicio;
            // $data_fim = $request->data_fim;

            $bolsa = str_replace(',', '.', $request->e_bolsa);

            $contrato = TceContrato::find($request->e_id_tce_contrato);
            $contrato->estagiario_id = $request->e_estagiario_id;
            $contrato->empresa_id = $request->e_empresa_id;
            $contrato->instituicao_id = $request->e_instituicao_id;
            $contrato->data_doc = Carbon::createFromFormat('d/m/Y', $request->e_data_doc)->format('Y-m-d');
            $contrato->data_inicio = Carbon::createFromFormat('d/m/Y', $request->e_data_inicio)->format('Y-m-d');
            $contrato->data_fim = Carbon::createFromFormat('d/m/Y', $request->e_data_fim)->format('Y-m-d');
            $contrato->beneficio = $request->e_beneficio;
            $contrato->seguro = $request->e_seguro;
            $contrato->horario = $request->e_horario;
            $contrato->setor = $request->e_setor;
            $contrato->atividade = $request->e_atividade;
            $contrato->orientador_id = $request->e_orientador_id;
            $contrato->supervisor_id = $request->e_supervisor_id;
            $contrato->bolsa = $bolsa;
            $contrato->obrigatorio = $request->e_obrigatorio;
            $contrato->obs = $request->e_obs;
            $contrato->save();

            return "2";

        } else {

            $bolsa = str_replace(',', '.', $request->bolsa);

            $contrato = new TceContrato();
            $contrato->estagiario_id = $request->estagiario_id;
            $contrato->empresa_id = $request->empresa_id;
            $contrato->instituicao_id = $request->instituicao_id;
            $contrato->data_doc = Carbon::createFromFormat('d/m/Y', $request->data_doc)->format('Y-m-d');
            $contrato->data_inicio = Carbon::createFromFormat('d/m/Y', $request->data_inicio)->format('Y-m-d');
            $contrato->data_fim = Carbon::createFromFormat('d/m/Y', $request->data_fim)->format('Y-m-d');
            $contrato->beneficio = $request->beneficio;
            $contrato->seguro = $request->seguro;
            $contrato->horario = $request->horario;
            $contrato->setor = $request->setor;
            $contrato->atividade = $request->atividade;
            $contrato->orientador_id = $request->orientador_id;
            $contrato->supervisor_id = $request->supervisor_id;
            $contrato->bolsa = $bolsa;
            $contrato->obrigatorio = $request->obrigatorio;
            $contrato->obs = $request->obs;
            $contrato->save();

            return "1";
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\TceContrato  $tceContrato
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $tceContrato = TceContrato::with('empresa')->with('instituicao')->with('estagiario')->with('supervisor')->find($id);
        return $tceContrato;

        // $orientador = Orientador::all();
        // $supervisor = Supervisor::all();
        // $atividades = Atividade::all();

        // $tceContrato = DB::table('tce_contrato')
        //     ->join('estagiario', 'estagiario.id_estagiario', '=', 'tce_contrato.estagiario_id')
        //     ->join('empresa', 'empresa.id_empresa', '=', 'tce_contrato.empresa_id')
        //     ->join('instituicao', 'instituicao.id_instituicao', '=', 'tce_contrato.instituicao_id')
        //     ->select(
        //         'estagiario.nome',
        //         'estagiario.id_estagiario',
        //         'estagiario.curso',
        //         'empresa.nome_fantasia',
        //         'empresa.id_empresa',
        //         'instituicao.nome_instituicao',
        //         'instituicao.id_instituicao',
        //         'tce_contrato.bolsa',
        //         'tce_contrato.data_inicio',
        //         'tce_contrato.data_fim',
        //         'tce_contrato.contrato',
        //         'tce_contrato.assinado',
        //         'tce_contrato.data_doc',
        //         'tce_contrato.horario_id',
        //         'tce_contrato.apolice_id',
        //         'tce_contrato.setor_id',
        //         'tce_contrato.obrigatorio',
        //         'tce_contrato.supervisor_id',
        //         'tce_contrato.orientador_id',
        //         'tce_contrato.atividade_id',
        //         'tce_contrato.id_tce_contrato'
        //     )
        //     ->where('tce_contrato.id_tce_contrato', '=', $id)
        //     ->get();

        // return view('tce_contrato.show', compact('tceContrato', 'orientador', 'supervisor', 'atividades', $tceContrato));
    }

    //verificar o metodo show que foi mudado para aditivo.
    public function aditivo($id)
    {
        $orientador = Orientador::all();
        $supervisor = Supervisor::all();
        $atividades = Atividade::all();

        $tceContrato = DB::table('tce_contrato')
            ->join('estagiario', 'estagiario.id_estagiario', '=', 'tce_contrato.estagiario_id')
            ->join('empresa', 'empresa.id_empresa', '=', 'tce_contrato.empresa_id')
            ->join('instituicao', 'instituicao.id_instituicao', '=', 'tce_contrato.instituicao_id')
            ->select(
                'estagiario.nome',
                'estagiario.id_estagiario',
                'estagiario.curso',
                'empresa.nome_fantasia',
                'empresa.id_empresa',
                'instituicao.nome_instituicao',
                'instituicao.id_instituicao',
                'tce_contrato.bolsa',
                'tce_contrato.data_inicio',
                'tce_contrato.data_fim',
                'tce_contrato.contrato',
                'tce_contrato.assinado',
                'tce_contrato.data_doc',
                'tce_contrato.horario_id',
                'tce_contrato.apolice_id',
                'tce_contrato.setor_id',
                'tce_contrato.obrigatorio',
                'tce_contrato.supervisor_id',
                'tce_contrato.orientador_id',
                'tce_contrato.atividade_id',
                'tce_contrato.id_tce_contrato'
            )
            ->where('tce_contrato.id_tce_contrato', '=', $id)
            ->get();

        return view('tce_contrato.show', compact('tceContrato', 'orientador', 'supervisor', 'atividades', $tceContrato));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\TceContrato  $tceContrato
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {

        $tceContrato = DB::table('tce_contrato')
            ->join('estagiario', 'estagiario.id_estagiario', '=', 'tce_contrato.estagiario_id')
            ->join('empresa', 'empresa.id_empresa', '=', 'tce_contrato.empresa_id')
            ->join('instituicao', 'instituicao.id_instituicao', '=', 'tce_contrato.instituicao_id')
            ->where('tce_contrato.id_tce_contrato', '=', $id)
            ->get();

        $motivos = Motivo::all();
        $supervisor = Supervisor::all();
        $horarios = Horario::all();
        $apolices = Seguradora::all();
        $beneficios = Beneficio::all();
        $atividades = Atividade::all();
        $setores = Setor::all();

        return view('tce_contrato.edit', compact('tceContrato', 'motivos', 'supervisor', 'horarios', 'apolices', 'beneficios', 'setores', 'atividades'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\TceContrato  $tceContrato
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

        $bolsa = str_replace(',', '.', str_replace('.', '', $request->bolsa));

        $contrato = TceContrato::find($id);
        $contrato->data_doc = Carbon::createFromFormat('d/m/Y', $date_doc)->format('Y-m-d');
        $contrato->data_inicio = Carbon::createFromFormat('d/m/Y', $date_inicio)->format('Y-m-d');
        $contrato->data_fim = Carbon::createFromFormat('d/m/Y', $date_fim)->format('Y-m-d');
        $contrato->beneficio_id = $request->get('beneficio_id');
        $contrato->horario_id = $request->get('horario_id');
        $contrato->setor_id = $request->get('setor_id');
        $contrato->atividade_id = $request->get('atividade_id');
        $contrato->orientador_id = $request->get('orientador_id');
        $contrato->bolsa = $bolsa;
        // $contrato->bolsa_aditivo = $valor_aditivo;
        $contrato->obrigatorio = $request->get('obrigatorio');
        $contrato->obs = $request->get('obs');
        $contrato->save();

        return redirect()->route('tce_contrato.index')
            ->with('success', 'ATUALIZADO COM SUCESSO');

    }

    public function tceAjax($id)
    {
        $contrato = DB::table('estagiario')
            ->join('empresa', 'empresa.id_empresa', '=', 'estagiario.empresa_id')
            ->join('instituicao', 'instituicao.id_instituicao', '=', 'estagiario.instituicao_id')
            ->where("estagiario.id_estagiario", $id)
            ->select("nome_fantasia", "nome_instituicao", "empresa_id", "instituicao_id")
            ->get();
        return json_encode($contrato);
    }

    public function horarios()
    {

        $empresas = Empresa::all();
        return view('home.teste', compact('empresas', $empresas));

    }
    public function horarioAjax($id)
    {
        $horarios = DB::table('horario')
            ->join('empresa', 'empresa.id_empresa', '=', 'horario.empresa_id')
            ->where("empresa.id_empresa", $id)
            ->select("descricao", "horario.id_horario")
            ->get();
        return $horarios;

    }
    public function atividadeAjax($id)
    {
        $atividades = DB::table('atividade')
            ->join('empresa', 'empresa.id_empresa', '=', 'atividade.empresa_id')
            ->where("empresa.id_empresa", $id)
            ->select("nome_atividade", "atividade.id_atividade")
            ->get();
        return $atividades;

    }

    public function editar($id)
    {

        $tceContrato = DB::table('tce_contrato')
            ->join('estagiario', 'estagiario.id_estagiario', '=', 'tce_contrato.estagiario_id')
            ->join('empresa', 'empresa.id_empresa', '=', 'tce_contrato.empresa_id')
            ->join('instituicao', 'instituicao.id_instituicao', '=', 'tce_contrato.instituicao_id')
            ->select('estagiario.nome',
                'estagiario.nome',
                'tce_contrato.id_tce_contrato',
                'tce_contrato.estagiario_id',
                'tce_contrato.empresa_id',
                'tce_contrato.instituicao_id',
                'tce_contrato.bolsa',
                'tce_contrato.data_doc',
                'tce_contrato.data_inicio',
                'tce_contrato.data_fim',
                'empresa.nome_fantasia',
                'instituicao.nome_instituicao'
            )
            ->where('tce_contrato.id_tce_contrato', '=', $id)
            ->get();

        $tce = DB::table('tce_contrato')->where('id_tce_contrato', $id)->get()->first();
        $supervisor = DB::table('supervisor')->where('id_supervisor', $tce->supervisor_id)->get()->first();
        $horarios = DB::table('horario')->where('id_horario', $tce->horario_id)->get()->first();
        $seguros = DB::table('seguradora')->where('id_seguradora', $tce->apolice_id)->get()->first();
        $setores = DB::table('setor')->where('id_setor', $tce->setor_id)->get()->first();
        $beneficios = DB::table('beneficio')->where('id_beneficio', $tce->beneficio_id)->get()->first();
        $orientadores = DB::table('orientador')->where('id_orientador', $tce->orientador_id)->get()->first();
        $atividades = DB::table('atividade')->where('id_atividade', $tce->atividade_id)->get()->first();

        return view('tce_contrato.fields_edit', compact('atividades', 'orientadores', 'tceContrato', 'motivos', 'supervisor', 'horarios', 'seguros', 'beneficios', 'setores'));
    }

    public function carregarTceContrato()
    {
        return TceContrato::with("estagiario")->with("empresa")->with("instituicao")->get();
    }
}
