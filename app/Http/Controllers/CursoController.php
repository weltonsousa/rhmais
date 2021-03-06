<?php

namespace App\Http\Controllers;

use App\Curso;
use Illuminate\Http\Request;

class CursoController extends Controller
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
        $cursos = Curso::all();
        return view('curso.index', compact('cursos'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('curso.create');
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
        //     'nivel' => 'required',
        // ]);

        // $cursos = new Curso();
        // $cursos->nome_curso = $request->get('nome');
        // $cursos->nivel = $request->get('nivel');
        // $cursos->save();

        // return redirect()->route('curso.index')
        //     ->with('success', 'Cadastrado com sucesso.');

        if ($request->has("e_id_curso")) {
            $curso = Curso::find($request->e_id_curso);
            $curso->nome_curso = $request->e_nome_curso;
            $curso->nivel = $request->e_nivel;
            $curso->save();
            return "2";

        } else {
            $curso = new Curso();
            $curso->nome_curso = $request->nome_curso;
            $curso->nivel = $request->nivel;
            $curso->save();
            return "1";
        }

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Curso  $curso
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $cursos = Curso::find($id);
        return view('curso.edit', compact('cursos', $cursos));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Curso  $curso
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'nome' => 'required',
            'nivel' => 'required',
        ]);

        $cursos = Curso::find($id);
        $cursos->nome_curso = $request->get('nome');
        $cursos->nivel = $request->get('nivel');
        $cursos->save();

        $request->session()->flash('success', 'ATUALIZADO COM SUCESSO');
        return redirect('curso');
    }

    public function show($id)
    {
        $curso = Curso::find($id);
        return $curso;
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Curso  $curso
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request, $id)
    {
        // $curso = Curso::find($id);
        // $curso->delete();
        // $request->session()->flash('warning', 'REMOVIDO COM SUCESSO');
        // return redirect('curso');

        Curso::destroy($id);
        return "1";

    }

    public function carregarCurso()
    {
        return Curso::All();
    }
}
