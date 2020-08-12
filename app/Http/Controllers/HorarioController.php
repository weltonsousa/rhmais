<?php

namespace App\Http\Controllers;

use App\Empresa;
use App\Horario;
use App\TceContrato;
use Illuminate\Http\Request;

class HorarioController extends Controller
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
        $horarios = Horario::all();
        return view('horario.index', compact('horarios'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $empresas = Empresa::all(['id', 'nome_fantasia']);
        return view('horario.create', compact('empresas'));
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
            'descricao' => 'required',
        ]);

        $horario = new Horario();
        $horario->descricao = $request->get('descricao');
        $horario->qtd_horas = $request->get('qtd_horas');
        $horario->empresa_id = $request->get('empresa_id');
        $horario->save();

        return redirect()->route('horario.index')
            ->with('success', 'CADASTRADO COM SUCESSO.');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Horario  $horario
     * @return \Illuminate\Http\Response
     */
    public function show(Horario $horario)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Horario  $horario
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $horarios = Horario::find($id);
        return view('horario.edit', compact('horarios'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Horario  $horario
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'descricao' => 'required',
        ]);

        $horario = Horario::find($id);
        $horario->descricao = $request->get('descricao');
        $horario->qtd_horas = $request->get('qtd_horas');
        $horario->empresa_id = $request->get('empresa_id');
        $horario->save();

        $request->session()->flash('success', 'ATUALIZADO COM SUCESSO.');
        return redirect('horario');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Horario  $horario
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request, $id)
    {
        if (TceContrato::where('horario_id', $id)->first()) {
            $request->session()->flash('warning', 'HORÁRIO NÃO PODE SER REMOVIDO');
            return redirect('horario');
        } else {
            $horario = Horario::find($id);
            $horario->delete();
            $request->session()->flash('warning', 'REMOVIDO COM SUCESSO');
            return redirect('horario');
        }
    }
}
