<?php

namespace App\Http\Controllers;

use App\Seguradora;
use App\TceContrato;
use Illuminate\Http\Request;

class SeguradoraController extends Controller
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
        $seguros = Seguradora::all();
        return view('seguro.index', compact('seguros'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('seguro.create');
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

        $seguradora = new Seguradora();
        $seguradora->nome_seguradora = $request->get('nome');
        $seguradora->n_apolice = $request->get('n_apolice');
        $seguradora->cobertura = $request->get('cobertura');
        $seguradora->save();

        return redirect()->route('seguro.index')
            ->with('success', 'CADASTRADO COM SUCESSO.');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Seguradora  $seguradora
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $seguro = Seguradora::find($id);
        return view('seguro.edit', compact('seguro'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Seguradora  $seguradora
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'nome' => 'required',
        ]);

        $seguradora = Seguradora::find($id);
        $seguradora->nome_seguradora = $request->get('nome');
        $seguradora->n_apolice = $request->get('n_apolice');
        $seguradora->cobertura = $request->get('cobertura');
        $seguradora->save();
        $request->session()->flash('success', 'ATUALIZADO COM SUCESSO.');
        return redirect('seguro');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Seguradora  $seguradora
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request, $id)
    {
        if (TceContrato::where('apolice_id', $id)->first()) {
            $request->session()->flash('warning', 'SEGURO NÃO PODE SER REMOVIDO');
            return redirect('seguro');
        } else {

            $seguro = Seguradora::find($id);
            $seguro->delete();
            $request->session()->flash('warning', 'REMOVIDO COM SUCESSO.');
            return redirect('seguro');
        }
    }
}
