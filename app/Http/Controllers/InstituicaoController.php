<?php

namespace App\Http\Controllers;

use App\Cce;
use App\Estado;
use App\Instituicao;
use Illuminate\Http\Request;

class InstituicaoController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $instituicoes = Instituicao::all();
        return view('instituicao.index', compact('instituicoes', $instituicoes));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $instituicoes = Instituicao::all();
        return view('instituicao.create', compact('instituicoes'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, Instituicao $instituicoes)
    {
        // $request->validate([
        //     'nome_instituicao' => 'required',
        //     'cnpj' => 'required',
        // ]);

        // $instituicoes = new Instituicao();
        // $instituicoes->razao_social = $request->get('razao_social');
        // $instituicoes->nome_instituicao = $request->get('nome_instituicao');
        // $instituicoes->cnpj = $request->get('cnpj');
        // $instituicoes->insc_estadual = $request->get('insc_estadual');
        // $instituicoes->mantenedora = $request->get('mantenedora');
        // $instituicoes->telefone = $request->get('telefone');
        // $instituicoes->site_url = $request->get('site_url');
        // $instituicoes->cidade = $request->get('cidade');
        // $instituicoes->estado = $request->get('estado');
        // $instituicoes->nome_contato = $request->get('nome_contato');
        // $instituicoes->nome_rep = $request->get('nome_rep');
        // $instituicoes->cargo_rep = $request->get('cargo_rep');
        // $instituicoes->rg_rep = $request->get('rg_rep');
        // $instituicoes->cpf_rep = $request->get('cpf_rep');
        // $instituicoes->email_contato = $request->get('email_contato');
        // $instituicoes->email_rep = $request->get('email_rep');
        // $instituicoes->celular_rep = $request->get('cel_rep');
        // $instituicoes->celular_contato = $request->get('celular_contato');
        // $instituicoes->cep = $request->get('cep');
        // $instituicoes->rua = $request->get('rua');
        // $instituicoes->bairro = $request->get('bairro');
        // $instituicoes->numero = $request->get('numero');
        // $instituicoes->complemento = $request->get('complemento');
        // $instituicoes->save();

        // return redirect()->route('instituicao.index')
        //     ->with('success', 'CADASTRADO COM SUCESSO');

        if ($request->has("e_id_instituicao")) {
            $instituicoe = Instituicao::find($request->e_id_instituicao);
            $instituicoe->razao_social = $request->e_razao_social;
            $instituicoe->nome_instituicao = $request->e_nome_instituicao;
            $instituicoe->cnpj = $request->e_cnpj;
            $instituicoe->insc_estadual = $request->e_insc_estadual;
            $instituicoe->mantenedora = $request->e_mantenedora;
            $instituicoe->telefone = $request->e_telefone;
            $instituicoe->site_url = $request->e_site_url;
            $instituicoe->cidade = $request->e_cidade;
            $instituicoe->estado = $request->e_estado;
            $instituicoe->nome_contato = $request->e_nome_contato;
            $instituicoe->nome_rep = $request->e_nome_rep;
            // $instituicoe->cargo_rep = $request->e_cargo_rep;
            $instituicoe->rg_rep = $request->e_rg_rep;
            $instituicoe->cpf_rep = $request->e_cpf_rep;
            $instituicoe->email_contato = $request->e_email_contato;
            $instituicoe->email_rep = $request->e_email_rep;
            $instituicoe->celular_rep = $request->e_celular_rep;
            $instituicoe->celular_contato = $request->e_celular_contato;
            $instituicoe->cep = $request->e_cep;
            $instituicoe->rua = $request->e_rua;
            $instituicoe->bairro = $request->e_bairro;
            $instituicoe->numero = $request->e_numero;
            $instituicoe->complemento = $request->e_complemento;
            $instituicoe->save();

            return "2";
        } else {

            $instituicoe = new Instituicao();
            $instituicoe->razao_social = $request->razao_social;
            $instituicoe->nome_instituicao = $request->nome_instituicao;
            $instituicoe->cnpj = $request->cnpj;
            $instituicoe->insc_estadual = $request->insc_estadual;
            $instituicoe->mantenedora = $request->mantenedora;
            $instituicoe->telefone = $request->telefone;
            $instituicoe->site_url = $request->site_url;
            $instituicoe->cidade = $request->cidade;
            $instituicoe->estado = $request->estado;
            $instituicoe->nome_contato = $request->nome_contato;
            $instituicoe->nome_rep = $request->nome_rep;
            // $instituicoe->cargo_rep = $request->cargo_rep;
            $instituicoe->rg_rep = $request->rg_rep;
            $instituicoe->cpf_rep = $request->cpf_rep;
            $instituicoe->email_contato = $request->email_contato;
            $instituicoe->email_rep = $request->email_rep;
            $instituicoe->celular_rep = $request->celular_rep;
            $instituicoe->celular_contato = $request->celular_contato;
            $instituicoe->cep = $request->cep;
            $instituicoe->rua = $request->rua;
            $instituicoe->bairro = $request->bairro;
            $instituicoe->numero = $request->numero;
            $instituicoe->complemento = $request->complemento;
            $instituicoe->save();

            return "1";
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Instituicao  $instituicao
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $instituicao = Instituicao::find($id);

        return $instituicao;
        // return view('instituicao.show', compact('instituicao', $instituicao));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Instituicao  $instituicao
     * @return \Illuminate\Http\Response
     */
    public function edit(Instituicao $instituicao)
    {
        $estados = Estado::all();
        return view('instituicao.edit', compact('instituicao', 'estados', $instituicao));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Instituicao  $instituicao
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {

        $request->validate([
            'razao_social' => 'required',
            'cnpj' => 'required',
        ]);

        $instituicoes = Instituicao::find($id);
        $instituicoes->razao_social = $request->get('razao_social');
        $instituicoes->nome_instituicao = $request->get('nome_instituicao');
        $instituicoes->cnpj = $request->get('cnpj');
        $instituicoes->insc_estadual = $request->get('insc_estadual');
        $instituicoes->mantenedora = $request->get('mantenedora');
        $instituicoes->telefone = $request->get('telefone');
        $instituicoes->site_url = $request->get('site_url');
        $instituicoes->cidade = $request->get('cidade');
        $instituicoes->estado = $request->get('estado');
        $instituicoes->nome_contato = $request->get('nome_contato');
        $instituicoes->nome_rep = $request->get('nome_rep');
        $instituicoes->cargo_rep = $request->get('cargo_rep');
        $instituicoes->rg_rep = $request->get('rg_rep');
        $instituicoes->cpf_rep = $request->get('cpf_rep');
        $instituicoes->email_contato = $request->get('email_contato');
        $instituicoes->email_rep = $request->get('email_rep');
        $instituicoes->celular_rep = $request->get('cel_rep');
        $instituicoes->celular_contato = $request->get('celular_contato');
        $instituicoes->cep = $request->get('cep');
        $instituicoes->rua = $request->get('rua');
        $instituicoes->bairro = $request->get('bairro');
        $instituicoes->numero = $request->get('numero');
        $instituicoes->complemento = $request->get('complemento');
        $instituicoes->save();

        $request->session()->flash('success', 'ATUALIZADO COM SUCESSO');
        return redirect('instituicao');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Instituicao  $instituicoes
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request, $id)
    {
        // if ($instituicoes = Cce::where('instituicao_id', $id)->first()) {
        //     $request->session()->flash('warning', 'INSTITUIÇÃO POSSUI CONTRATO ATIVO');
        //     return redirect('instituicao');
        // } else {
        //     $instituicoes = Instituicao::find($id);
        //     $instituicoes->delete();
        //     $request->session()->flash('warning', 'REMOVIDO COM SUCESSO!');
        //     return redirect('instituicao');
        // }

        if ($instituicoes = Cce::where('instituicao_id', $id)->first()) {
            return "2";
        } else {
            Instituicao::destroy($id);
            return "1";
        }
    }

    public function carregarInstituicao()
    {
        return Instituicao::all();
    }
}
