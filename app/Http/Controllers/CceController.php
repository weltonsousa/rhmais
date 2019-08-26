<?php

namespace App\Http\Controllers;

use App\Cce;
use App\Instituicao;
use App\Seguradora;
use DB;
use Illuminate\Http\Request;

class CceController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $cces = DB::table('cce')
            ->join('instituicao', 'instituicao.id', '=', 'cce.instituicao_id')
            ->select(
            'instituicao.id',
            'instituicao.nome_instituicao',
            'cce.data_inicio',
            'cce.data_fim',
            'cce.situacao',
            'cce.id'
            )
            ->get();
        return view('cce_convenio.index',  compact('cces', $cces));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $instituicoes = Instituicao::all();
        $seguro = Seguradora::all();
        return view('cce_convenio.create', compact('instituicoes', 'seguro'));
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
            'instituicao_id' => 'required',
        ]);

        $cce = new cce();
        $cce->instituicao_id = $request->get('instituicao_id');
        $cce->agente_integracao = $request->get('agente_integracao');
        $cce->data_inicio = $request->get('data_inicio');
        $cce->data_fim = $request->get('data_fim');
        $cce->data_doc = $request->get('data_doc');
        $cce->seguro_id = $request->get('seguro_id');
        $cce->obs = $request->get('obs');
        $cce->save();
        return redirect()->route('cce_convenio.index')
            ->with('success', 'Cadastrado com sucesso.');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Cce  $cce
     * @return \Illuminate\Http\Response
     */
    public function show(Cce $cce)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Cce  $cce
     * @return \Illuminate\Http\Response
     */
    public function edit(Cce $cce)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Cce  $cce
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Cce $cce)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Cce  $cce
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request, $id)
    {
        $res = Cce::destroy($id);
        if ($res) {
            $request->session()->flash('warning', 'Removido com sucesso!');
            return redirect('cce_convenio');
        } else {
            $request->session()->flash('warning', 'Removido com sucesso!');
            return redirect('cce_convenio');
        }
    }
}
