<?php

namespace App\Http\Controllers;

use App\BeneficioEstagiario;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class AdicionarBeneficioController extends Controller
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
        $data['users'] = BeneficioEstagiario::orderBy('id', 'desc')->paginate(8);
        return view('folha_pagamento.edit', $data);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $user = BeneficioEstagiario::updateOrCreate(
            ['id' => $request->beneficio_id],
            [
                'estagiario_id' => $request->estagiario_id,
                'referencia' => $request->referencia,
            ]);
        return Response::json($user);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $where = array('id' => $id);
        $user = BeneficioEstagiario::where($where)->first();

        return Response::json($user);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $user = User::where('id', $id)->delete();
        return Response::json($user);
    }
}
