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

        // $request->validate([
        //     'nome' => 'required',
        // ]);

        // $setor = new Setor();
        // $setor->nome_setor = $request->get('nome');
        // $setor->sigla = $request->get('sigla');

        // $setor->save();

        // return redirect()->route('setor.index')
        //     ->with('success', 'CADASTRADO COM SUCESSO');

        if ($request->has("e_id_setor")) {
            $setor = Setor::find($request->e_id_setor);
            $setor->nome_setor = $request->e_nome_setor;
            $setor->sigla = $request->e_sigla;
            $setor->save();
            return "2";

        } else {
            $setor = new Setor();
            $setor->nome_setor = $request->nome_setor;
            $setor->sigla = $request->sigla;
            $setor->save();
            return "1";
        }

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
        $setor->nome_setor = $request->get('nome');
        $setor->sigla = $request->get('sigla');
        $setor->save();

        $request->session()->flash('success', 'ATUALIZADO COM SUCESSO');
        return redirect('setor');
    }

    public function show($id)
    {
        $setor = Setor::find($id);
        return $setor;
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Setor  $setor
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request, $id)
    {
        // if (TceContrato::where('setor_id', $id)->first()) {
        //     $request->session()->flash('warning', 'SETOR NÃO PODE SER REMOVIDO');
        //     return redirect('setor');
        // } else {
        //     $setor = Setor::find($id);
        //     $setor->delete();
        //     $request->session()->flash('warning', 'REMOVIDO COM SUCESSO');
        //     return redirect('setor');
        // }

        if (TceContrato::where('setor_id', $id)->first()) {
            return "2";
        } else {
            Setor::destroy($id);
            return "1";
        }
    }

    public function setorAjax()
    {
        $setor = Setor::pluck('nome_setor', 'id_setor');
        return json_encode($setor);
    }

    public function editar($id)
    {
        $setor = Setor::find($id);
        return response()->json($setor);
    }

    public function carregarSetor()
    {
        return Setor::All();
    }
}
