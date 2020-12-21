<?php

namespace App\Http\Controllers;

use App\Motivo;
use Illuminate\Http\Request;

class MotivoController extends Controller
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
        $motivos = Motivo::all();
        return view('motivo.index', compact('motivos'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('motivo.create');
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

        // $motivo = new Motivo();
        // $motivo->nome_motivo = $request->get('nome');
        // $motivo->descricao = $request->get('descricao');
        // $motivo->save();

        // return redirect()->route('motivo.index')
        //     ->with('success', 'CADASTRADO COM SUCESSO');

        if ($request->has("e_id_motivo")) {
            $motivo = Motivo::find($request->e_id_motivo);
            $motivo->nome_motivo = $request->e_nome;
            $motivo->descricao = $request->e_descricao;
            $motivo->save();
            return "2";

        } else {
            $motivo = new Motivo();
            $motivo->nome_motivo = $request->nome;
            $motivo->descricao = $request->descricao;
            $motivo->save();
            return "1";
        }

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Motivo  $motivo
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $motivo = Motivo::find($id);
        return view('motivo.edit', compact('motivo', $motivo));
    }

    public function show($id)
    {
        $motivo = Motivo::find($id);
        return $motivo;
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Motivo  $motivo
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'nome' => 'required',
        ]);

        $motivo = Motivo::find($id);
        $motivo->nome_motivo = $request->get('nome');
        $motivo->descricao = $request->get('descricao');
        $motivo->save();

        $request->session()->flash('success', 'ATUALIZADO COM SUCESSO');
        return redirect('motivo');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Motivo  $motivo
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request, $id)
    {
        // $motivo->delete();
        // $request->session()->flash('warning', 'REMOVIDO COM SUCESSO');
        // return redirect('motivo');

        Motivo::delete($id);
        return "1";
    }

    public function carregarMotivo()
    {
        return Motivo::all();
    }
}
