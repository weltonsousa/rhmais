<?php

namespace App\Http\Controllers;

use App\Rhmais;
use Illuminate\Http\Request;

class RhmaisController extends Controller
{
    public function index()
    {
        $dados = Rhmais::all();
        return view('rhmais.index', compact('dados'));
    }

    public function update(Request $request, $id_rhmais)
    {
        $dados = Rhmais::find($id_rhmais);
        $dados->razao_social = $request->razao_social;
        $dados->cnpj = $request->cnpj;
        $dados->endereco = $request->endereco;
        $dados->numero = $request->numero;
        $dados->complemento = $request->complemento;
        $dados->cep = $request->cep;
        $dados->bairro = $request->bairro;
        $dados->cidade = $request->cidade;
        $dados->estado = $request->estado;
        $dados->representante = $request->representante;
        $dados->email = $request->email;
        $dados->telefone = $request->telefone;
        $dados->save();

        $request->session()->flash('success', 'ATUALIZADO COM SUCESSO.');
        return redirect('rhmais');
    }
}
