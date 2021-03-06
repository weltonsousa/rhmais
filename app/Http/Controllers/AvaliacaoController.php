<?php

namespace App\Http\Controllers;

use App\Avaliacao;
use App\Empresa;
use App\Estagiario;
use App\Instituicao;
use App\Supervisor;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class AvaliacaoController extends Controller
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
        $estagiarios = DB::table('tce_contrato')
            ->join('estagiario', 'tce_contrato.estagiario_id', '=', 'estagiario.id_estagiario')
            ->get();

        $empresas = DB::table('empresa')
            ->select(
                'empresa.razao_social',
                'empresa.nome_fantasia',
                // 'empresa.cnpj',
                // 'empresa.insc_estadual',
                // 'empresa.telefone',
                'empresa.id_empresa'
                // 'empresa.cidade',
                // 'empresa.estado'
            )
            ->get();

        // $avaliacoes = Avaliacao::all('estagiario_id');


        return view('auto_avaliacao.index', [
            'estagiarios' => $estagiarios,
            // 'instituicoes' => $instituicoes,
            'empresas' => $empresas,
            // 'avaliacoes' => $avaliacoes,
        ]);

    }

    public function buscarAvaliacaoEstagiario(Request $request)
    {
        $idEstagiarios = [];
        $i = 0;
        $estagiarios = DB::table('estagiario')->where([['nome', 'like', '%' . $request->nome . '%']])->get();
        foreach ($estagiarios as $estagiario) {
            $idEstagiarios[$i] = $estagiario->id_estagiario;
            $i++;
        }
        $avaliacoes = DB::table('avaliacao')->where([['estagiario_id', '=', $idEstagiarios]])->get();
        $empresas = DB::table('empresa')->get();
        $instituicoes = DB::table('instituicao')->get();
        $orientadores = DB::table('orientador')->get();

        return view('lista_auto_avaliacao.index', [
            'avaliacoes' => $avaliacoes,
            'empresas' => $empresas,
            'instituicoes' => $instituicoes,
            'estagiarios' => $estagiarios,
            'orientadores' => $orientadores,
        ]);
    }

    public function lista_avaliacao()
    {
        $avaliacoes = DB::table('avaliacao')->get();
        $empresas = DB::table('empresa')->get();
        $instituicoes = DB::table('instituicao')->get();
        $estagiarios = DB::table('estagiario')->get();
        $orientadores = DB::table('orientador')->get();

        // $qAvaliacao = DB::table('avaliacao')->join('estagiario', 'estagiario.id_estagiario', '=', 'avaliacao.estagiario_id')
        //     ->select(DB::raw('count(*) AS qtd, estagiario.id_estagiario', 'ativo'))
        //     ->groupBy('estagiario.id_estagiario')
        // // ->where('tce_contrato.ativo', 1)
        //     ->get();


        return view('lista_auto_avaliacao.index', [
            'avaliacoes' => $avaliacoes,
            'empresas' => $empresas,
            'instituicoes' => $instituicoes,
            'estagiarios' => $estagiarios,
            'orientadores' => $orientadores
        ]);
    }

    public function autoavaliacao()
    {
        $supervisores = DB::table('supervisor')->get();
        $empresas = DB::table('empresa')->get();

        return view('lista_auto_avaliacao.busca-estagiario', [
            'supervisores' => $supervisores,
            'empresas' => $empresas,
        ]);
    }

    public function buscarEstagiarios(Request $request)
    {

        if ($request->empresa_id && !$request->supervisor_id) {
            $estagiarios = DB::table('estagiario')->where([['empresa_id', '=', $request->empresa_id]])->get();
        }

        if ($request->supervisor_id && !$request->empresa_id) {
            $colecaoEstagiarios = DB::table('tce_contrato')->where([['supervisor', '=', $request->supervisor_id], ['estagiario_id', '<>', null]])->get();
            $i = 0;
            foreach ($colecaoEstagiarios as $estagiario) {
                $colecaoIdEstagiarios[$i] = $estagiario->estagiario_id;
                $i++;
            }
            $estagiarios = DB::table('estagiario')->whereIn('id_estagiario', $colecaoIdEstagiarios)->get();
        }

        if ($request->supervisor_id && $request->empresa_id) {
            $colecaoEstagiarios = DB::table('tce_contrato')->where([['supervisor', '=', $request->supervisor_id], ['estagiario_id', '<>', null]])->get();
            $i = 0;
            foreach ($colecaoEstagiarios as $estagiario) {
                $colecaoIdEstagiarios[$i] = $estagiario->estagiario_id;
                $i++;
            }
            $estagiarios = DB::table('estagiario')->where('empresa_id', '=', $request->empresa_id)->whereIn('id_estagiario', $colecaoIdEstagiarios)->get();
        }

        if (!$request->supervisor_id && !$request->empresa_id) {
            $estagiarios = DB::table('estagiario')->get();
        }

        return view('lista_auto_avaliacao.lista-estagiario', ['estagiarios' => $estagiarios]);
    }

    public function assinar_avaliacao_estagiario($id)
    {
        DB::update('update avaliacao set status = 1 where id_avaliacao = ?', [$id]);
        return redirect('/lista_auto_avaliacao');
    }

    public function deletar_avaliacao_estagiario($id)
    {
        DB::delete('delete from `avaliacao` where `avaliacao`.`id_avaliacao` = ?', [$id]);
        return redirect('/lista_auto_avaliacao');
    }
    public function assinar_avaliacao_supervisor($id)
    {
        DB::update('update avaliacao_super set status = 1 where id_avaliacao = ?', [$id]);
        return redirect('/lista_avaliacao_supervisor');
    }

    public function deletar_avaliacao_supervisor($id)
    {
        DB::delete('delete from `avaliacao_super` where `avaliacao_super`.`id_avaliacao_super` = ?', [$id]);
        return redirect('/lista_avaliacao_supervisor');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $estagiarios = DB::table('estagiario')
            ->join('empresa', 'estagiario.empresa_id', '=', 'empresa.id_empresa')
            ->select(
                'estagiario.nome',
                'empresa.nome_fantasia',
                'estagiario.celular',
                'estagiario.cpf',
                'estagiario.data_nascimento',
                'estagiario.id_estagiario',
                'estagiario.ativo',
                'estagiario.curso',
                'estagiario.cidade',
                'estagiario.estado'
            )
            ->get();
        $instituicoes = DB::table('instituicao')
            ->select(
                'instituicao.razao_social',
                'instituicao.nome_instituicao',
                'instituicao.cnpj',
                'instituicao.rua',
                'instituicao.id_instituicao',
                'instituicao.cidade',
                'instituicao.estado'
            )
            ->get();
        $empresas = DB::table('empresa')
            ->select(
                'empresa.razao_social',
                'empresa.nome_fantasia',
                'empresa.cnpj',
                'empresa.insc_estadual',
                'empresa.telefone',
                'empresa.id_empresa',
                'empresa.cidade',
                'empresa.estado'
            )
            ->get();
        $supervisores = DB::table('supervisor')->get();

        return view('auto_avaliacao.create', [
            'estagiarios' => $estagiarios,
            'instituicoes' => $instituicoes,
            'empresas' => $empresas,
            'supervisores' => $supervisores,
        ]);
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
            'estagiario_id' => 'required',
            'empresa_id' => 'required',
        ]);

        $data_doc = $request->get('data_doc');

        $avaliacao = new Avaliacao();
        $avaliacao->estagiario_id = $request->get('estagiario_id');
        $avaliacao->empresa_id = $request->get('empresa_id');
        $avaliacao->instituicao_id = $request->get('instituicao_id');
        $avaliacao->supervisor = $request->get('supervisor');
        $avaliacao->periodo_avaliativo = $request->get('periodo_avaliativo');
        $avaliacao->data_doc = Carbon::createFromFormat('d/m/Y', $date_doc)->format('Y-m-d');
        $avaliacao->obs = $request->get('obs');
        $avaliacao->compromisso = $request->get('compromisso');
        $avaliacao->plano_de_estagio = $request->get('plano_de_estagio');
        $avaliacao->aprendizagem = $request->get('aprendizagem');
        $avaliacao->identificacao = $request->get('identificacao');
        $avaliacao->experiencia = $request->get('experiencia');

        $avaliacao->save();

        return redirect()->route('auto_avaliacao.index')
            ->with('success', 'Realizada com sucesso.');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Avaliacao  $avaliacao
     * @return \Illuminate\Http\Response
     */
    public function show(Avaliacao $avaliacao)
    {
        $empresas = Empresa::all();
        $estagiarios = Estagiario::all();
        $instituicoes = Instituicao::all();
        $supervisores = Supervisor::all();

        return view('auto_avaliacao.show', compact('empresas', 'estagiarios', 'instituicoes', 'supervisores'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Avaliacao  $avaliacao
     * @return \Illuminate\Http\Response
     */
    public function edit(Avaliacao $avaliacao)
    {
        $estagiarios = DB::table('estagiario')
            ->join('empresa', 'estagiario.empresa_id', '=', 'empresa.id')
            ->select(
                'estagiario.nome',
                'empresa.nome_fantasia',
                'estagiario.celular',
                'estagiario.cpf',
                'estagiario.data_nascimento',
                'estagiario.id_estagiario',
                'estagiario.ativo',
                'estagiario.nivel',
                'estagiario.cidade',
                'estagiario.estado'
            )
            ->get();
        $instituicoes = DB::table('instituicao')
            ->select(
                'instituicao.razao_social',
                'instituicao.nome_instituicao',
                'instituicao.cnpj',
                'instituicao.rua',
                'instituicao.id_instituicao',
                'instituicao.cidade',
                'instituicao.estado'
            )
            ->get();
        $empresas = DB::table('empresa')
            ->select(
                'empresa.razao_social',
                'empresa.nome_fantasia',
                'empresa.cnpj',
                'empresa.insc_estadual',
                'empresa.telefone',
                'empresa.id_empresa',
                'empresa.cidade',
                'empresa.estado'
            )
            ->get();
        $supervisores = DB::table('supervisor')->get();

        return view('lista_auto_avaliacao.edit', [
            'estagiarios' => $estagiarios,
            'instituicoes' => $instituicoes,
            'empresas' => $empresas,
            'supervisores' => $supervisores,
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Avaliacao  $avaliacao
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Avaliacao $avaliacao)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Avaliacao  $avaliacao
     * @return \Illuminate\Http\Response
     */
    public function destroy(Avaliacao $avaliacao)
    {
        //
    }

    public function avaliacaoAjax($id)
    {
        $avaliacao = DB::table('estagiario')
            ->join('empresa', 'empresa.id_empresa', '=', 'estagiario.empresa_id')
            ->join('instituicao', 'instituicao.id_instituicao', '=', 'estagiario.instituicao_id')
            ->where("estagiario.id_estagiario", $id)
            ->select("nome_fantasia", "nome_instituicao", "empresa_id", "instituicao_id")
            ->get();
        return json_encode($avaliacao);
    }

    public function supervisorAjax($id)
    {
        $supervisor = DB::table('supervisor')
            ->join('empresa', 'empresa.id_empresa', '=', 'supervisor.empresa_id')
            ->where("empresa.id_empresa", $id)
            ->select("nome", "supervisor.id_supervisor")
            ->get();
        return json_encode($supervisor);

    }
}
