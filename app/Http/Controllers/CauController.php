<?php

namespace App\Http\Controllers;

use App\Cau;
use App\Empresa;
use Carbon\Carbon;
use DB;
use Illuminate\Http\Request;

class CauController extends Controller
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
        $caus = Cau::all();
        return view('cau_convenio.index', compact('caus'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $empresas = Empresa::all(['id', 'nome_fantasia']);
        return view('cau_convenio.create', compact('empresas'));
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
            'empresa_id' => 'required|unique:cau',
        ]);

        $date_inicio = $request->get('data_inicio');
        $date_fim = $request->get('data_fim');
        $date_doc = $request->get('data_doc');

        $cau = new cau();
        $cau->empresa_id = $request->get('empresa_id');
        $cau->data_inicio = Carbon::createFromFormat('d/m/Y', $date_inicio)->format('Y-m-d');
        $cau->data_fim = Carbon::createFromFormat('d/m/Y', $date_fim)->format('Y-m-d');
        $cau->data_doc = Carbon::createFromFormat('d/m/Y', $date_doc)->format('Y-m-d');
        $cau->obs = $request->get('obs');
        $cau->save();

        $request->session()->flash('success', 'CADASTRADO COM SUCESSO');
        return redirect('cau_convenio');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Cau  $cau
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $cau = Cau::find($id);
        $empresas = DB::table('empresa')->where('id', '=', $cau->empresa_id)->get()->first();
        return view('cau_convenio.edit', compact('cau', 'empresas'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Cau  $cau
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'empresa_id' => 'required',
        ]);

        $date_inicio = $request->get('data_inicio');
        $date_fim = $request->get('data_fim');
        $date_doc = $request->get('data_doc');

        $cau = Cau::find($id);
        $cau->data_inicio = Carbon::createFromFormat('d/m/Y', $date_inicio)->format('Y-m-d');
        $cau->data_fim = Carbon::createFromFormat('d/m/Y', $date_fim)->format('Y-m-d');
        $cau->data_doc = Carbon::createFromFormat('d/m/Y', $date_doc)->format('Y-m-d');
        $cau->obs = $request->get('obs');
        $cau->save();

        $request->session()->flash('success', 'ATUALIZADO COM SUCESSO');
        return redirect('cau_convenio');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Cau  $cau
     * @return \Illuminate\Http\Response
     */
    public function destroy($id, Request $request)
    {
        $cau = Cau::find($id);
        $cau->delete();
        $request->session()->flash('warning', 'REMOVIDO COM SUCESSO');
        return redirect('cau_convenio');
    }

    public function assinado($id)
    {
        DB::update('update cau set situacao = 1 where id = ?', [$id]);
        return redirect('cau_convenio');
    }
}
