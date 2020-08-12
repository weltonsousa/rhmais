<?php

namespace App\Http\Controllers;

use App\Setor;
use App\TceContrato;
use Illuminate\Http\Request;

class SetorController extends Controller
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
        $setores = Setor::all();
        return view('setor.index', compact('setores'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('setor.create');
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

        $setor = new Setor();
        $setor->nome = $request->get('nome');
        $setor->sigla = $request->get('sigla');

        $setor->save();

        return redirect()->route('setor.index')
            ->with('success', 'CADASTRADO COM SUCESSO');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Setor  $setor
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $setor = Setor::find($id);
        return view('setor.edit', compact('setor', $setor));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Setor  $setor
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'nome' => 'required',
        ]);

        $setor = Setor::find($id);
        $setor->nome = $request->get('nome');
        $setor->sigla = $request->get('sigla');
        $setor->save();

        $request->session()->flash('success', 'ATUALIZADO COM SUCESSO');
        return redirect('setor');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Setor  $setor
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request, $id)
    {
        if (TceContrato::where('setor_id', $id)->first()) {
            $request->session()->flash('warning', 'SETOR NÃO PODE SER REMOVIDO');
            return redirect('setor');
        } else {
            $setor = Setor::find($id);
            $setor->delete();
            $request->session()->flash('warning', 'REMOVIDO COM SUCESSO');
            return redirect('setor');
        }
    }

    public function setorAjax()
    {
        $setor = Setor::pluck('nome', 'id');
        return json_encode($setor);
    }
}
