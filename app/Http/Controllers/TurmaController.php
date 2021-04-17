<?php

namespace App\Http\Controllers;

use App\Models\Aluno;
use App\Models\aluno_turma;
use App\Models\Escola;
use App\Models\Turma;
use Illuminate\Http\Request;

class TurmaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $turmas = Turma::all();
        // dd($turmas);
        return(view('turmas.index',['turmas' => $turmas]));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $escolas = Escola::all();
        return view('turmas.create',['escolas' => $escolas]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        Turma::create($request->all());
        return redirect(route('turma.index'));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $turma = Turma::find($id);
        $alunos = aluno_turma::alunosDestaTurma($id);
        // $alunos = Aluno::all();
        return view('turmas.show', ['turma' => $turma, 'alunos' => $alunos]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $turma = Turma::find($id);
        return view('turmas.edit', ['turma' => $turma]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $turma = Turma::find($id);
        $turma->update($request->all());
        return redirect(route('turmas.index'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $turma = Turma::find($id);
        $turma->delete();
        return redirect(route('turmas.index'));
    }
}
