<?php

namespace App\Http\Controllers;

use App\Beneficio;
use App\TceContrato;
use Illuminate\Http\Request;

class BeneficioController extends Controller
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
        $beneficios = Beneficio::all();
        return view('beneficio.index', compact('beneficios'));
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('beneficio.create');
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

        $beneficio = new Beneficio();
        $beneficio->nome = $request->get('nome');
        $beneficio->sigla = $request->get('sigla');
        $beneficio->tipo = $request->get('tipo');
        $beneficio->save();

        return redirect()->route('beneficio.index')
            ->with('success', 'CADASTRADO COM SUCESSO');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Beneficio  $beneficio
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $beneficios = Beneficio::find($id);
        return view('beneficio.edit', ['beneficios' => $beneficios]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Beneficio  $beneficio
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'nome' => 'required',
        ]);

        $beneficio = Beneficio::find($id);
        $beneficio->nome = $request->get('nome');
        $beneficio->sigla = $request->get('sigla');
        $beneficio->tipo = $request->get('tipo');
        $beneficio->save();

        $request->session()->flash('success', 'ATUALIZADO COM SUCESSO');
        return redirect('beneficio');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Beneficio  $beneficio
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request, $id)
    {
        if (TceContrato::where('beneficio_id', $id)->first()) {
            $request->session()->flash('warning', 'BENEFÍCIO NÃO PODE SER REMOVIDO');
            return redirect('beneficio');
        } else {
            $beneficio = Beneficio::find($id);
            $beneficio->delete();
            $request->session()->flash('warning', 'BENEFÍCIO REMOVIDO');
            return redirect('beneficio');
        }
    }

    public function beneficioAjax()
    {
        $beneficio = Beneficio::pluck('nome', 'id');
        return json_encode($beneficio);
    }
}
