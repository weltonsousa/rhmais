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
        $orientadores = Orientador::all();
        return view('orientador.index', compact('orientadores'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $estados = DB::table("estado")->pluck("nome", "id");
        $instituicoes = Instituicao::all(['id', 'nome_instituicao']);
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
        $request->validate([
            'nome' => 'required',
        ]);

        $orientadoress = new Orientador();
        $orientadoress->nome_orientador = $request->get('nome');
        $orientadoress->email = $request->get('email');
        $orientadoress->rg = $request->get('rg');
        $orientadoress->cpf = $request->get('cpf');
        $orientadoress->telefone = $request->get('telefone');
        $orientadoress->celular = $request->get('celular');
        $orientadoress->cidade = $request->get('cidade');
        $orientadoress->estado = $request->get('estado');
        $orientadoress->formacao = $request->get('formacao');
        $orientadoress->cep = $request->get('cep');
        $orientadoress->rua = $request->get('rua');
        $orientadoress->bairro = $request->get('bairro');
        $orientadoress->cep = $request->get('cep');
        $orientadoress->numero = $request->get('numero');
        $orientadoress->complemento = $request->get('complemento');
        $orientadoress->cargo = $request->get('cargo');
        $orientadoress->instituicao_id = $request->get('instituicao_id');
        $orientadoress->save();

        return redirect()->route('orientador.index')
            ->with('success', 'CADASTRADOR COM SUCESSO.');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Orientador  $orientador
     * @return \Illuminate\Http\Response
     */
    public function show(Orientador $orientador)
    {
        //
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

        $orientadoress = Orientador::find($id);
        $orientadoress->nome_orientador = $request->get('nome');
        $orientadoress->email = $request->get('email');
        $orientadoress->rg = $request->get('rg');
        $orientadoress->cpf = $request->get('cpf');
        $orientadoress->telefone = $request->get('telefone');
        $orientadoress->celular = $request->get('celular');
        $orientadoress->cidade = $request->get('cidade');
        $orientadoress->estado = $request->get('estado');
        $orientadoress->formacao = $request->get('formacao');
        $orientadoress->cep = $request->get('cep');
        $orientadoress->rua = $request->get('rua');
        $orientadoress->bairro = $request->get('bairro');
        $orientadoress->cep = $request->get('cep');
        $orientadoress->numero = $request->get('numero');
        $orientadoress->complemento = $request->get('complemento');
        $orientadoress->cargo = $request->get('cargo');
        $orientadoress->instituicao_id = $request->get('instituicao_id');
        $orientadoress->save();

        $request->session()->flash('success', 'ATUALIZADO COM SUCESSO');
        return redirect('orientador');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Orientador  $orientador
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request, $id)
    {
        if (TceContrato::where('orientador_id', $id)->first()) {
            $request->session()->flash('warning', 'ORIENTADOR NÃO PODE SER REMOVIDO');
            return redirect('orientador');
        } else {
            $orientador = Orientador::find($id);
            $orientador->delete();
            $request->session()->flash('warning', 'REMOVIDO COM SUCESSO');
            return redirect('orientador');
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
}
