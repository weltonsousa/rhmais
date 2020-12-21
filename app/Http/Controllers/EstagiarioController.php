<?php

namespace App\Http\Controllers;

use App\Curso;
use App\Empresa;
use App\Estado;
use App\Estagiario;
use App\Instituicao;
use App\TceContrato;
use Carbon\Carbon;
use DB;
use Illuminate\Http\Request;

class EstagiarioController extends Controller
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
        $estagiarios = Estagiario::all();
        $empresas = Empresa::all();
        $cursos = Curso::all();
        $instituicoes = Instituicao::all();
        return view('estagiario.index', compact('estagiarios', 'empresas', 'cursos', 'instituicoes'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $states = DB::table("estado")->pluck("nome", "id");
        $cursos = Curso::all();
        $instituicoes = Instituicao::all(['id_instituicao', 'nome_instituicao']);
        $empresas = Empresa::all(['id_empresa', 'nome_fantasia']);
        return view('estagiario.create', compact('states', 'empresas', 'cursos', 'instituicoes'));
    }

    public function myform()
    {
        $states = DB::table("estado")->pluck("nome", "id");
        return view('myform', compact('states'));
    }
    /**
     * Get Ajax Request and restun Data
     *
     * @return \Illuminate\Http\Response
     */

    public function myformAjax($id)
    {
        $cities = DB::table("cidade")
            ->where("estado_id", $id)
            ->pluck("nome", "id");
        return json_encode($cities);
    }

    public function endereco($id)
    {
        $estagiarios = DB::table("endereco")
            ->where("estagiario_id", $id)
            ->pluck("cidade", "id");
        return json_encode($estagiarios);
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
        //     'nome' => 'required',
        //     'email' => 'required|email|unique:estagiario,email',
        // ]);
        // $date_nascimento = $request->get('data_nascimento');
        // $date_termino_curso = $request->get('termino_curso');

        // $estagiarios = new Estagiario();
        // $estagiarios->nome = $request->get('nome');
        // $estagiarios->email = $request->get('email');
        // $estagiarios->rg = $request->get('rg');
        // $estagiarios->cpf = $request->get('cpf');
        // $estagiarios->telefone = $request->get('telefone');
        // $estagiarios->celular = $request->get('celular');
        // $estagiarios->data_nascimento = Carbon::createFromFormat('d/m/Y', $date_nascimento)->format('Y-m-d');
        // $estagiarios->ctps = $request->get('ctps');
        // $estagiarios->serie_ctps = $request->get('serie_ctps');
        // $estagiarios->numero_pis = $request->get('numero_pis');
        // $estagiarios->dt_cadastro = $request->get('dt_cadastro');
        // $estagiarios->pessoa_responsavel = $request->get('pessoa_responsavel');
        // $estagiarios->sexo = $request->get('sexo');
        // $estagiarios->cidade = $request->get('cidade');
        // $estagiarios->estado = $request->get('estado');
        // $estagiarios->nacionalidade = $request->get('nacionalidade');
        // $estagiarios->pai = $request->get('pai');
        // $estagiarios->mae = $request->get('mae');
        // $estagiarios->cep = $request->get('cep');
        // $estagiarios->rua = $request->get('rua');
        // $estagiarios->bairro = $request->get('bairro');
        // $estagiarios->cep = $request->get('cep');
        // $estagiarios->numero = $request->get('numero');
        // $estagiarios->complemento = $request->get('complemento');
        // $estagiarios->banco = $request->get('banco');
        // $estagiarios->conta = $request->get('conta');
        // $estagiarios->codigo_vaga = $request->get('codigo_vaga');
        // $estagiarios->senha = $request->get('senha');
        // $estagiarios->curso = $request->get('curso');
        // $estagiarios->nivel = $request->get('nivel');
        // $estagiarios->periodo = $request->get('periodo');
        // $estagiarios->matricula = $request->get('matricula');
        // $estagiarios->obs = $request->get('obs');
        // $estagiarios->empresa_id = $request->get('empresa_id');
        // $estagiarios->instituicao_id = $request->get('instituicao_id');
        // $estagiarios->dt_cadastro = date("Y-m-d");
        // $estagiarios->termino_curso = Carbon::createFromFormat('d/m/Y', $date_termino_curso)->format('Y-m-d');
        // if ($request->ativo == 'on') {
        //     $estagiarios->ativo = 1;
        // }
        // $estagiarios->save();

        // return redirect()->route('estagiario.index')
        //     ->with('success', 'CADASTRADO COM SUCESSO.');

        if ($request->has("e_id_estagiario")) {
            $date_nascimento = $request->e_data_nascimento;
            $date_termino_curso = $request->e_termino_curso;

            $estagiarios = Estagiario::find($request->e_id_estagiario);
            $estagiarios->nome = $request->e_nome;
            $estagiarios->email = $request->e_email;
            $estagiarios->rg = $request->e_rg;
            $estagiarios->cpf = $request->e_cpf;
            $estagiarios->telefone = $request->e_telefone;
            $estagiarios->celular = $request->e_celular;
            $estagiarios->data_nascimento = Carbon::createFromFormat('d/m/Y', $date_nascimento)->format('Y-m-d');
            $estagiarios->ctps = $request->e_ctps;
            $estagiarios->serie_ctps = $request->e_serie_ctps;
            $estagiarios->numero_pis = $request->e_numero_pis;
            $estagiarios->dt_cadastro = $request->e_dt_cadastro;
            $estagiarios->pessoa_responsavel = $request->e_pessoa_responsavel;
            $estagiarios->sexo = $request->e_sexo;
            $estagiarios->cidade = $request->e_cidade;
            $estagiarios->estado = $request->e_estado;
            $estagiarios->nacionalidade = $request->e_nacionalidade;
            $estagiarios->pai = $request->e_pai;
            $estagiarios->mae = $request->e_mae;
            $estagiarios->cep = $request->e_cep;
            $estagiarios->rua = $request->e_rua;
            $estagiarios->bairro = $request->e_bairro;
            $estagiarios->cep = $request->e_cep;
            $estagiarios->numero = $request->e_numero;
            $estagiarios->complemento = $request->e_complemento;
            $estagiarios->banco = $request->e_banco;
            $estagiarios->conta = $request->e_conta;
            $estagiarios->codigo_vaga = $request->e_codigo_vaga;
            $estagiarios->senha = $request->e_senha;
            $estagiarios->curso = $request->e_curso;
            $estagiarios->nivel = $request->e_nivel;
            $estagiarios->periodo = $request->e_periodo;
            $estagiarios->matricula = $request->e_matricula;
            $estagiarios->obs = $request->e_obs;
            // $estagiarios->empresa_id = $request->empresa_id;
            $estagiarios->instituicao_id = $request->e_instituicao_id;
            $estagiarios->dt_cadastro = date("Y-m-d");
            $estagiarios->termino_curso = Carbon::createFromFormat('d/m/Y', $date_termino_curso)->format('Y-m-d');
            if ($request->ativo == 'on') {
                $estagiarios->ativo = 1;
            }
            $estagiarios->save();
            return "2";
        } else {
            $date_nascimento = $request->data_nascimento;
            $date_termino_curso = $request->termino_curso;

            $estagiarios = new Estagiario();
            $estagiarios->nome = $request->nome;
            $estagiarios->email = $request->email;
            $estagiarios->rg = $request->rg;
            $estagiarios->cpf = $request->cpf;
            $estagiarios->telefone = $request->telefone;
            $estagiarios->celular = $request->celular;
            $estagiarios->data_nascimento = Carbon::createFromFormat('d/m/Y', $date_nascimento)->format('Y-m-d');
            $estagiarios->ctps = $request->ctps;
            $estagiarios->serie_ctps = $request->serie_ctps;
            $estagiarios->numero_pis = $request->numero_pis;
            $estagiarios->dt_cadastro = $request->dt_cadastro;
            $estagiarios->pessoa_responsavel = $request->pessoa_responsavel;
            $estagiarios->sexo = $request->sexo;
            $estagiarios->cidade = $request->cidade;
            $estagiarios->estado = $request->estado;
            $estagiarios->nacionalidade = $request->nacionalidade;
            $estagiarios->pai = $request->pai;
            $estagiarios->mae = $request->mae;
            $estagiarios->cep = $request->cep;
            $estagiarios->rua = $request->rua;
            $estagiarios->bairro = $request->bairro;
            $estagiarios->cep = $request->cep;
            $estagiarios->numero = $request->numero;
            $estagiarios->complemento = $request->complemento;
            $estagiarios->banco = $request->banco;
            $estagiarios->conta = $request->conta;
            $estagiarios->codigo_vaga = $request->codigo_vaga;
            $estagiarios->senha = $request->senha;
            $estagiarios->curso = $request->curso;
            $estagiarios->nivel = $request->nivel;
            $estagiarios->periodo = $request->periodo;
            $estagiarios->matricula = $request->matricula;
            $estagiarios->obs = $request->obs;
            $estagiarios->empresa_id = $request->empresa_id;
            $estagiarios->instituicao_id = $request->instituicao_id;
            $estagiarios->dt_cadastro = date("Y-m-d");
            $estagiarios->termino_curso = Carbon::createFromFormat('d/m/Y', $date_termino_curso)->format('Y-m-d');
            if ($request->ativo == 'on') {
                $estagiarios->ativo = 1;
            }
            $estagiarios->save();
            return "1";
        }

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Estagiario  $estagiario
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $estagiario = Estagiario::find($id);
        $estados = DB::table("estado")->pluck("nome", "id");
        $cursos = Curso::all();
        $instituicoes = Instituicao::all(['id_instituicao', 'nome_instituicao']);
        $empresas = Empresa::all(['id_empresa', 'nome_fantasia']);

        return view('estagiario.edit', [
            'estagiario' => $estagiario,
            'empresas' => $empresas,
            'instituicoes' => $instituicoes,
            'cursos' => $cursos,
            'estados' => $estados,
        ]);
    }

    public function show($id)
    {
        $estagiario = Estagiario::with('empresa')->with('instituicao')->find($id);
        return $estagiario;
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Estagiario  $estagiario
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'nome' => 'required',
            'email' => 'required',
        ]);

        $date_nascimento = $request->get('data_nascimento');
        $date_termino_curso = $request->get('termino_curso');

        $estagiarios = Estagiario::find($id);
        $estagiarios->nome = $request->get('nome');
        $estagiarios->email = $request->get('email');
        $estagiarios->rg = $request->get('rg');
        $estagiarios->cpf = $request->get('cpf');
        $estagiarios->telefone = $request->get('telefone');
        $estagiarios->celular = $request->get('celular');
        $estagiarios->data_nascimento = Carbon::createFromFormat('d/m/Y', $date_nascimento)->format('Y-m-d');
        $estagiarios->ctps = $request->get('ctps');
        $estagiarios->serie_ctps = $request->get('serie_ctps');
        $estagiarios->numero_pis = $request->get('numero_pis');
        $estagiarios->dt_cadastro = $request->get('dt_cadastro');
        $estagiarios->pessoa_responsavel = $request->get('pessoa_responsavel');
        $estagiarios->sexo = $request->get('sexo');
        $estagiarios->cidade = $request->get('cidade');
        $estagiarios->estado = $request->get('estado');
        $estagiarios->nacionalidade = $request->get('nacionalidade');
        $estagiarios->pai = $request->get('pai');
        $estagiarios->mae = $request->get('mae');
        $estagiarios->cep = $request->get('cep');
        $estagiarios->rua = $request->get('rua');
        $estagiarios->bairro = $request->get('bairro');
        $estagiarios->cep = $request->get('cep');
        $estagiarios->numero = $request->get('numero');
        $estagiarios->complemento = $request->get('complemento');
        $estagiarios->banco = $request->get('banco');
        $estagiarios->conta = $request->get('conta');
        $estagiarios->codigo_vaga = $request->get('codigo_vaga');
        $estagiarios->senha = $request->get('senha');
        $estagiarios->curso = $request->get('curso');
        $estagiarios->nivel = $request->get('nivel');
        $estagiarios->periodo = $request->get('periodo');
        $estagiarios->obs = $request->get('obs');
        $estagiarios->matricula = $request->get('matricula');
        $estagiarios->empresa_id = $request->get('empresa_id');
        $estagiarios->instituicao_id = $request->get('instituicao_id');
        $estagiarios->dt_cadastro = date("Y-m-d");
        $estagiarios->termino_curso = Carbon::createFromFormat('d/m/Y', $date_termino_curso)->format('Y-m-d');
        if ($request->ativo == 'on') {
            $estagiarios->ativo = 1;
        }
        $estagiarios->save();

        $request->session()->flash('success', 'ATUALIZADO COM SUCESSO.');
        return redirect('estagiario');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Estagiario  $estagiario
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request, $id)
    {
        // if (TceContrato::where('estagiario_id', $id)->first()) {
        //     $request->session()->flash('warning', 'ESTAGIÁRIO POSSUI CONTRATO ATIVO');
        //     return redirect('estagiario');
        // } else {
        //     $estagiario = Estagiario::find($id);
        //     $estagiario->delete();
        //     $request->session()->flash('warning', 'REMOVIDO COM SUCESSO');
        //     return redirect('estagiario');
        // }
        if (TceContrato::where('estagiario_id', $id)->first()) {
            return "2";
        } else {
            Estagiario::destroy($id);
            return "1";
        }
    }

    public function carregarEstagiario()
    {
        // return Estagiario::all();

        return Estagiario::with("empresa")->get();

    }
}
