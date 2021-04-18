<?php

namespace App\Http\Controllers;

use App\Models\aluno_turma;
use App\Models\Escola;
use App\Models\Turma;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

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
        return (view('turmas.index', ['turmas' => $turmas]));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $escolas = Escola::all();
        return view('turmas.create', ['escolas' => $escolas]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $turma = $request->all();
        
        Validator::make($request->all(), [
            'serie' => [
                function ($attribute, $value, $fail) use ($turma) {
                    if ($turma['nivel'] == 'Ensino Médio' && ($value > 3 || $value < 1)) {
                        $fail('Turmas do Ensino Médio podem ter as series 1º, 2º ou 3º');
                    }
                    else if ($turma['nivel'] == 'Ensino Fundamental' && ($value > 9 || $value < 1)) {
                        $fail('Turmas do Ensino Fundamental podem ter as series  1º, 2º ou 3º ... 9º');
                    }
                },
            ],
        ])->validate();

        Turma::create($turma);
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
        $escolas = Escola::all();
        return view('turmas.edit', ['turma' => $turma, 'escolas' => $escolas]);
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
        $edit = $request->all();
        
        Validator::make($request->all(), [
            'serie' => [
                function ($attribute, $value, $fail) use ($edit) {
                    if ($edit['nivel'] == 'Ensino Médio' && ($value > 3 || $value < 1)) {
                        $fail('Turmas do Ensino Médio podem ter as series 1º, 2º ou 3º');
                    }
                    else if ($edit['nivel'] == 'Ensino Fundamental' && ($value > 9 || $value < 1)) {
                        $fail('Turmas do Ensino Fundamental podem ter as series  1º, 2º ou 3º ... 9º');
                    }
                },
            ],
        ])->validate();

        $turma = Turma::find($id);
        $turma->update($request->all());
        return redirect(route('turma.index'));
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
        return redirect(route('turma.index'));
    }
}
