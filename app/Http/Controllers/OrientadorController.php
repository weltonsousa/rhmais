<?php

namespace App\Http\Controllers;

use App\Instituicao;
use App\Orientador;
use App\TceContrato;
use DB;
use Illuminate\Http\Request;

class OrientadorController extends Controller
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
        $orientador = Orientador::all();
        $instituicoes = Instituicao::all();
        return view('orientador.index', compact('orientador', 'instituicoes'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $estados = DB::table("estado")->pluck("nome", "id");
        $instituicoes = Instituicao::all(['id_instituicao', 'nome_instituicao']);
        return view('orientador.create', compact('estados', 'cursos', 'instituicoes'));
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
        // ]);

        // $orientador = new Orientador();
        // $orientador->nome_orientador = $request->get('nome');
        // $orientador->email = $request->get('email');
        // $orientador->rg = $request->get('rg');
        // $orientador->cpf = $request->get('cpf');
        // $orientador->telefone = $request->get('telefone');
        // $orientador->celular = $request->get('celular');
        // $orientador->cidade = $request->get('cidade');
        // $orientador->estado = $request->get('estado');
        // $orientador->formacao = $request->get('formacao');
        // $orientador->cep = $request->get('cep');
        // $orientador->rua = $request->get('rua');
        // $orientador->bairro = $request->get('bairro');
        // $orientador->cep = $request->get('cep');
        // $orientador->numero = $request->get('numero');
        // $orientador->complemento = $request->get('complemento');
        // $orientador->cargo = $request->get('cargo');
        // $orientador->instituicao_id = $request->get('instituicao_id');
        // $orientador->save();

        // return redirect()->route('orientador.index')
        //     ->with('success', 'CADASTRADOR COM SUCESSO.');

        if ($request->has("e_id_orientador")) {
            $orientador = Orientador::find($request->e_id_orientador);
            $orientador->nome_orientador = $request->e_nome;
            $orientador->email = $request->e_email;
            $orientador->rg = $request->e_rg;
            $orientador->cpf = $request->e_cpf;
            $orientador->telefone = $request->e_telefone;
            $orientador->celular = $request->e_celular;
            $orientador->cidade = $request->e_cidade;
            $orientador->estado = $request->e_estado;
            $orientador->formacao = $request->e_formacao;
            $orientador->cep = $request->e_cep;
            $orientador->rua = $request->e_rua;
            $orientador->bairro = $request->e_bairro;
            $orientador->cep = $request->e_cep;
            $orientador->numero = $request->e_numero;
            $orientador->complemento = $request->e_complemento;
            $orientador->cargo = $request->e_cargo;
            $orientador->instituicao_id = $request->e_instituicao_id;
            $orientador->save();

            return "2";

        } else {
            $orientador = new Orientador();
            $orientador->nome_orientador = $request->nome;
            $orientador->email = $request->email;
            $orientador->rg = $request->rg;
            $orientador->cpf = $request->cpf;
            $orientador->telefone = $request->telefone;
            $orientador->celular = $request->celular;
            $orientador->cidade = $request->cidade;
            $orientador->estado = $request->estado;
            $orientador->formacao = $request->formacao;
            $orientador->cep = $request->cep;
            $orientador->rua = $request->rua;
            $orientador->bairro = $request->bairro;
            $orientador->cep = $request->cep;
            $orientador->numero = $request->numero;
            $orientador->complemento = $request->complemento;
            $orientador->cargo = $request->cargo;
            $orientador->instituicao_id = $request->instituicao_id;
            $orientador->save();

            return "1";
        }

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Orientador  $orientador
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        // $orientador = DB::table('orientador')
        //     ->join('instituicao', 'orientador.instituicao_id', '=', 'instituicao.id_instituicao')
        //     ->where('orientador.id_orientador', '=', $id)
        //     ->select('orientador.*', 'instituicao.nome_instituicao')
        //     ->get();

        $orientador = Orientador::with('instituicao')->find($id);

        return $orientador;

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Orientador  $orientador
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $orientador = Orientador::find($id);
        $instituicoes = Instituicao::all(['id_instituicao', 'nome_instituicao']);

        return view('orientador.edit', compact('orientador', 'instituicoes'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Orientador  $orientador
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'nome' => 'required',
        ]);

        $orientador = Orientador::find($id);
        $orientador->nome_orientador = $request->get('nome');
        $orientador->email = $request->get('email');
        $orientador->rg = $request->get('rg');
        $orientador->cpf = $request->get('cpf');
        $orientador->telefone = $request->get('telefone');
        $orientador->celular = $request->get('celular');
        $orientador->cidade = $request->get('cidade');
        $orientador->estado = $request->get('estado');
        $orientador->formacao = $request->get('formacao');
        $orientador->cep = $request->get('cep');
        $orientador->rua = $request->get('rua');
        $orientador->bairro = $request->get('bairro');
        $orientador->cep = $request->get('cep');
        $orientador->numero = $request->get('numero');
        $orientador->complemento = $request->get('complemento');
        $orientador->cargo = $request->get('cargo');
        $orientador->instituicao_id = $request->get('instituicao_id');
        $orientador->save();

        $request->session()->flash('success', 'ATUALIZADO COM SUCESSO');
        return redirect('orientador');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Orientador  $orientador
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        // if (TceContrato::where('orientador_id', $id)->first()) {
        //     $request->session()->flash('warning', 'ORIENTADOR NÃO PODE SER REMOVIDO');
        //     return redirect('orientador');
        // } else {
        //     $orientador = Orientador::find($id);
        //     $orientador->delete();
        //     $request->session()->flash('warning', 'REMOVIDO COM SUCESSO');
        //     return redirect('orientador');
        // }
        if (TceContrato::where('orientador_id', $id)->first()) {
            return "2";
        } else {
            Orientador::destroy($id);
            return "1";
        }
    }

    public function orientadorAjax($id)
    {

        $orientador = DB::table('orientador')
            ->join('instituicao', 'instituicao.id_instituicao', '=', 'orientador.instituicao_id')
            ->where("orientador.instituicao_id", $id)
            ->select("orientador.id_orientador", "orientador.nome_orientador")
            ->get();

        return json_encode($orientador);
    }
    public function carregarOrientador()
    {
        // $orientador = DB::table('orientador')
        //     ->join('instituicao', 'orientador.instituicao_id', '=', 'instituicao.id_instituicao')
        //     ->get();

        return Orientador::with('instituicao')->get();

        // return $orientador;
    }
}
