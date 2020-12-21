<?php

namespace App\Http\Controllers;

use App\Cau;
use App\Empresa;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class EmpresaController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $empresas = Empresa::all();
        return view('empresa.index', compact('empresas', $empresas));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $estados = DB::table("estado")->pluck("nome", "id");
        $empresas = Empresa::all();
        return view('empresa.create', compact('estados', 'empresas'));
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
        //     'nome_fantasia' => 'required',
        //     'cnpj' => 'required',
        // ]);

        // $valor = str_replace(',', '.', str_replace('.', '', $request->custo_unitario));

        // $empresas = new Empresa();
        // $empresas->razao_social = $request->get('razao_social');
        // $empresas->nome_fantasia = $request->get('nome_fantasia');
        // $empresas->cnpj = $request->get('cnpj');
        // $empresas->insc_estadual = $request->get('insc_estadual');
        // $empresas->telefone = $request->get('telefone');
        // $empresas->site_url = $request->get('site_url');
        // $empresas->cidade = $request->get('cidade');
        // $empresas->estado = $request->get('estado');
        // $empresas->nome_rep = $request->get('nome_rep');
        // $empresas->rg_rep = $request->get('rg_rep');
        // $empresas->cpf_rep = $request->get('cpf_rep');
        // $empresas->email_rep = $request->get('email_rep');
        // $empresas->celular = $request->get('celular');
        // $empresas->celular_rep = $request->get('celular_rep');
        // $empresas->cep = $request->get('cep');
        // $empresas->rua = $request->get('rua');
        // $empresas->bairro = $request->get('bairro');
        // $empresas->cep = $request->get('cep');
        // $empresas->numero = $request->get('numero');
        // $empresas->complemento = $request->get('complemento');
        // $empresas->nome_contato = $request->get('nome_contato');
        // $empresas->email_contato = $request->get('email_contato');
        // $empresas->data_estagiario = $request->get('data_estagiario');
        // $empresas->data_fechamento = $request->get('data_fechamento');
        // $empresas->data_boleto = $request->get('data_boleto');
        // $empresas->custo_unitario = $valor;
        // $empresas->ativo = $request->get('ativo');
        // $empresas->save();

        // return redirect()->route('empresa.index')
        //     ->with('success', 'CADASTRADO COM SUCESSO');

        if ($request->has("e_id_empresa")) {
            // $valor = str_replace(',', '.', str_replace('.', '', $request->e_custo_unitario));
            $valor = str_replace(',', '.', $request->e_custo_unitario);

            $empresas = Empresa::find($request->e_id_empresa);
            $empresas->razao_social = $request->e_razao_social;
            $empresas->nome_fantasia = $request->e_nome_fantasia;
            $empresas->cnpj = $request->e_cnpj;
            $empresas->insc_estadual = $request->e_insc_estadual;
            $empresas->telefone = $request->e_telefone;
            $empresas->site_url = $request->e_site_url;
            $empresas->cidade = $request->e_cidade;
            $empresas->estado = $request->e_estado;
            $empresas->nome_rep = $request->e_nome_rep;
            $empresas->rg_rep = $request->e_rg_rep;
            $empresas->cpf_rep = $request->e_cpf_rep;
            $empresas->email_rep = $request->e_email_rep;
            $empresas->celular = $request->e_celular;
            $empresas->celular_rep = $request->e_celular_rep;
            $empresas->cep = $request->e_cep;
            $empresas->rua = $request->e_rua;
            $empresas->bairro = $request->e_bairro;
            $empresas->cep = $request->e_cep;
            $empresas->numero = $request->e_numero;
            $empresas->complemento = $request->e_complemento;
            $empresas->nome_contato = $request->e_nome_contato;
            $empresas->email_contato = $request->e_email_contato;
            $empresas->data_estagiario = $request->e_data_estagiario;
            $empresas->data_fechamento = $request->e_data_fechamento;
            $empresas->data_boleto = $request->e_data_boleto;
            $empresas->custo_unitario = $valor;
            $empresas->ativo = $request->e_ativo;
            $empresas->save();

            return "2";
        } else {

            // $valor = str_replace(',', '.', str_replace('.', '', $request->custo_unitario));
            $valor = str_replace(',', '.', $request->custo_unitario);

            $empresas = new Empresa();
            $empresas->razao_social = $request->razao_social;
            $empresas->nome_fantasia = $request->nome_fantasia;
            $empresas->cnpj = $request->cnpj;
            $empresas->insc_estadual = $request->insc_estadual;
            $empresas->telefone = $request->telefone;
            $empresas->site_url = $request->site_url;
            $empresas->cidade = $request->cidade;
            $empresas->estado = $request->estado;
            $empresas->nome_rep = $request->nome_rep;
            $empresas->rg_rep = $request->rg_rep;
            $empresas->cpf_rep = $request->cpf_rep;
            $empresas->email_rep = $request->email_rep;
            $empresas->celular = $request->celular;
            $empresas->celular_rep = $request->celular_rep;
            $empresas->cep = $request->cep;
            $empresas->rua = $request->rua;
            $empresas->bairro = $request->bairro;
            $empresas->cep = $request->cep;
            $empresas->numero = $request->numero;
            $empresas->complemento = $request->complemento;
            $empresas->nome_contato = $request->nome_contato;
            $empresas->email_contato = $request->email_contato;
            $empresas->data_estagiario = $request->data_estagiario;
            $empresas->data_fechamento = $request->data_fechamento;
            $empresas->data_boleto = $request->data_boleto;
            $empresas->custo_unitario = $valor;
            $empresas->ativo = $request->ativo;
            $empresas->save();

            return "1";
        }

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Empresa  $empresas
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        // $empresa = Empresa::where('id_empresa', $id)->first();
        // if ($empresa) {
        //     echo "<h2>ID da empresa: {$empresa->id_empresa}</h2>";
        //     echo "<h2>Nome da empresa: {$empresa->nome_fantasia}</h2>";
        // }

        // $estagiario = $empresa->estagios()->first();

        // if ($estagiario) {
        //     echo "<h2>ID do estagiario: {$estagiario->id_estagiario}</h2>";
        //     echo "<h2>Nome do estagiario: {$estagiario->nome}</h2>";
        // }

        // $instituicao = $estagiario->instituicao()->first();

        // if ($instituicao) {
        //     echo "<h2>ID do estagiario: {$instituicao->id_instituicao}</h2>";
        //     echo "<h2>Nome do estagiario: {$instituicao->nome}</h2>";
        // }

        // return view('empresa.show', compact('empresa', $empresa));

        $empresa = Empresa::find($id);

        return $empresa;
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Empresa  $empresa
     * @return \Illuminate\Http\Response
     */
    public function edit(Empresa $empresa)
    {
        return view('empresa.edit', compact('empresa', $empresa));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Empresa  $empresas
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'nome_fantasia' => 'required',
            'cnpj' => 'required',
        ]);

        $valor = str_replace(',', '.', str_replace('.', '', $request->custo_unitario));

        $empresas = Empresa::find($id);
        $empresas->razao_social = $request->get('razao_social');
        $empresas->nome_fantasia = $request->get('nome_fantasia');
        $empresas->cnpj = $request->get('cnpj');
        $empresas->insc_estadual = $request->get('insc_estadual');
        $empresas->telefone = $request->get('telefone');
        $empresas->site_url = $request->get('site_url');
        $empresas->cidade = $request->get('cidade');
        $empresas->estado = $request->get('estado');
        $empresas->nome_rep = $request->get('nome_rep');
        $empresas->rg_rep = $request->get('rg_rep');
        $empresas->cpf_rep = $request->get('cpf_rep');
        $empresas->email_rep = $request->get('email_rep');
        $empresas->celular = $request->get('celular');
        $empresas->celular_rep = $request->get('celular_rep');
        $empresas->cep = $request->get('cep');
        $empresas->rua = $request->get('rua');
        $empresas->bairro = $request->get('bairro');
        $empresas->cep = $request->get('cep');
        $empresas->numero = $request->get('numero');
        $empresas->complemento = $request->get('complemento');
        $empresas->nome_contato = $request->get('nome_contato');
        $empresas->email_contato = $request->get('email_contato');
        $empresas->data_estagiario = $request->get('data_estagiario');
        $empresas->data_fechamento = $request->get('data_fechamento');
        $empresas->data_boleto = $request->get('data_boleto');
        $empresas->custo_unitario = $valor;
        if ($empresas->ativo == 'on') {
            $empresas->ativo = 1;
        }
        $empresas->save();

        $request->session()->flash('success', 'ATUALIZADO COM SUCESSO');
        return redirect('empresa');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Empresa  $empresas
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request, $id)
    {
        // if ($empresa = Cau::where('empresa_id', $id)->first()) {
        //     $request->session()->flash('warning', 'EMPRESA POSSUI CONTRATO ATIVO');
        //     return redirect('empresa');
        // } else {
        //     $empresa = Empresa::find($id);
        //     $empresa->delete();
        //     $request->session()->flash('warning', 'REMOVIDO COM SUCESSO');
        //     return redirect('empresa');
        // }

        if ($empresa = Cau::where('empresa_id', $id)->first()) {
            return "2";
        } else {
            Empresa::destroy($id);
            return "1";
        }
    }

    public function carregarEmpresa()
    {
        return Empresa::all();
    }
}
