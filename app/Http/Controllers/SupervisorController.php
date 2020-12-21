<?php

namespace App\Http\Controllers;

use App\Empresa;
use App\Supervisor;
use App\TceContrato;
use DB;
use Illuminate\Http\Request;

class SupervisorController extends Controller
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
        $supervisores = Supervisor::all();
        $empresas = Empresa::all();
        return view('supervisor.index', compact('supervisores', 'empresas'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $empresas = Empresa::all(['id_empresa', 'nome_fantasia']);
        return view('supervisor.create', compact('empresas', 'cursos'));
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
        //     'email' => 'required',
        // ]);

        // $supervisores = new Supervisor();
        // $supervisores->nome_supervisor = $request->get('nome');
        // $supervisores->email = $request->get('email');
        // $supervisores->rg = $request->get('rg');
        // $supervisores->cpf = $request->get('cpf');
        // $supervisores->telefone = $request->get('telefone');
        // $supervisores->celular = $request->get('celular');
        // $supervisores->cidade = $request->get('cidade');
        // $supervisores->estado = $request->get('estado');
        // $supervisores->formacao = $request->get('formacao');
        // $supervisores->cep = $request->get('cep');
        // $supervisores->rua = $request->get('rua');
        // $supervisores->complemento = $request->get('complemento');
        // $supervisores->bairro = $request->get('bairro');
        // $supervisores->numero = $request->get('numero');
        // $supervisores->cargo = $request->get('cargo');
        // $supervisores->id_profissional = $request->get('id_profissional');
        // $supervisores->empresa_id = $request->get('empresa_id');
        // $supervisores->save();

        // return redirect()->route('supervisor.index')
        //     ->with('success', 'CADASTRADOR COM SUCESSO');

        if ($request->has("e_id_supervisor")) {
            $supervisor = Supervisor::find($request->e_id_supervisor);
            $supervisor->nome_supervisor = $request->e_nome;
            $supervisor->email = $request->e_email;
            $supervisor->rg = $request->e_rg;
            $supervisor->cpf = $request->e_cpf;
            $supervisor->telefone = $request->e_telefone;
            $supervisor->celular = $request->e_celular;
            $supervisor->cidade = $request->e_cidade;
            $supervisor->estado = $request->e_estado;
            $supervisor->formacao = $request->e_formacao;
            $supervisor->cep = $request->e_cep;
            $supervisor->rua = $request->e_rua;
            $supervisor->bairro = $request->e_bairro;
            $supervisor->cep = $request->e_cep;
            $supervisor->numero = $request->e_numero;
            $supervisor->complemento = $request->e_complemento;
            $supervisor->cargo = $request->e_cargo;
            $supervisor->empresa_id = $request->e_empresa_id;
            $supervisor->save();

            return "2";

        } else {
            $supervisor = new Supervisor();
            $supervisor->nome_supervisor = $request->nome;
            $supervisor->email = $request->email;
            $supervisor->rg = $request->rg;
            $supervisor->cpf = $request->cpf;
            $supervisor->telefone = $request->telefone;
            $supervisor->celular = $request->celular;
            $supervisor->cidade = $request->cidade;
            $supervisor->estado = $request->estado;
            $supervisor->formacao = $request->formacao;
            $supervisor->cep = $request->cep;
            $supervisor->rua = $request->rua;
            $supervisor->bairro = $request->bairro;
            $supervisor->cep = $request->cep;
            $supervisor->numero = $request->numero;
            $supervisor->complemento = $request->complemento;
            $supervisor->cargo = $request->cargo;
            $supervisor->empresa_id = $request->empresa_id;
            $supervisor->save();

            return "1";
        }

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Supervisor  $supervisor
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $supervisor = Supervisor::find($id);
        $empresa = Empresa::all(['id_empresa', 'nome_fantasia']);

        return view('supervisor.edit', compact('supervisor', 'empresa'));
    }

    public function show($id)
    {
        // $supervisor = DB::table('supervisor')
        //     ->join('empresa', 'supervisor.empresa_id', '=', 'empresa.id_empresa')
        //     ->where('supervisor.id_supervisor', '=', $id)
        //     ->select('supervisor.*', 'empresa.nome_fantasia')
        //     ->get();

        $supervisor = Supervisor::with('empresa')->find($id);
        return $supervisor;

    }
    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Supervisor  $supervisor
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'nome' => 'required',
        ]);

        $supervisores = Supervisor::find($id);
        $supervisores->nome_supervisor = $request->get('nome');
        $supervisores->email = $request->get('email');
        $supervisores->rg = $request->get('rg');
        $supervisores->cpf = $request->get('cpf');
        $supervisores->telefone = $request->get('telefone');
        $supervisores->celular = $request->get('celular');
        $supervisores->cidade = $request->get('cidade');
        $supervisores->estado = $request->get('estado');
        $supervisores->formacao = $request->get('formacao');
        $supervisores->cep = $request->get('cep');
        $supervisores->rua = $request->get('rua');
        $supervisores->complemento = $request->get('complemento');
        $supervisores->bairro = $request->get('bairro');
        $supervisores->numero = $request->get('numero');
        $supervisores->cargo = $request->get('cargo');
        $supervisores->id_profissional = $request->get('id_profissional');
        $supervisores->save();

        $request->session()->flash('success', 'ATUALIZADO COM SUCESSO');
        return redirect('supervisor');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Supervisor  $supervisor
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request, $id)
    {
        // if (TceContrato::where('supervisor_id', $id)->first()) {
        //     $request->session()->flash('warning', 'SUPERVISOR NÃO PODE SER REMOVIDO');
        //     return redirect('supervisor');
        // } else {
        //     $supervisor = Supervisor::find($id);
        //     $supervisor->delete();
        //     $request->session()->flash('warning', 'REMOVIDO COM SUCESSO');
        //     return redirect('supervisor');
        // }

        if (TceContrato::where('supervisor_id', $id)->first()) {
            return "2";
        } else {
            Supervisor::destroy($id);
            return "1";
        }
    }

    public function supervisorAjax($id)
    {
        $supervisor = DB::table('supervisor')
            ->join('empresa', 'empresa.id', '=', 'supervisor.empresa_id')
            ->where("supervisor.empresa_id", $id)
            ->select("supervisor.id_supervisor", "supervisor.nome_supervisor")
            ->get();

        return json_encode($supervisor);
    }

    public function carregarSupervisor()
    {
        // $supervisor = DB::table('supervisor')
        //     ->join('empresa', 'supervisor.empresa_id', '=', 'empresa.id_empresa')
        //     ->get();

        return Supervisor::with('empresa')->get();

        // return $supervisor;
    }
}
