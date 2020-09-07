<?php

namespace App\Http\Controllers;

use App\Atividade;
use App\Empresa;
use App\TceContrato;
use Illuminate\Http\Request;

class AtividadeController extends Controller
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
        $atividades = Atividade::all();
        return view('atividade.index', compact('atividades'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $empresas = Empresa::all(['id_empresa', 'nome_fantasia']);
        return view('atividade.create', compact('empresas'));
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
            'empresa_id' => 'required',
        ]);

        $atividades = new Atividade();
        $atividades->nome_atividade = $request->get('nome');
        $atividades->empresa_id = $request->get('empresa_id');
        $atividades->save();

        return redirect()->route('atividade.index')
            ->with('success', 'CADASTRADO COM SUCESSO');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Atividade  $atividade
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $atividades = Atividade::find($id);
        return view('atividade.edit', compact('atividades'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Atividade  $atividade
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'empresa_id' => 'required',
            'nome' => 'required',
        ]);

        $atividades = Atividade::find($id);
        $atividades->nome_atividade = $request->get('nome');
        $atividades->empresa_id = $request->get('empresa_id');
        $atividades->save();

        $request->session()->flash('success', 'ATUALIZADO COM SUCESSO');
        return redirect('atividade');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Atividade  $atividade
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request, $id)
    {
        if (TceContrato::where('atividade_id', $id)->first()) {
            $request->session()->flash('warning', 'ATIVIDADE NÃO PODE SER REMOVIDO');
            return redirect('atividade');
        } else {
            $atividade = Atividade::find($id);
            $atividade->delete();
            $request->session()->flash('warning', 'REMOVIDO COM SUCESSO');
            return redirect('atividade');
        }
    }
}
