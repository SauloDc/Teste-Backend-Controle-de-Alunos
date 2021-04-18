<?php

namespace App\Http\Controllers;

use App\Models\Aluno;
use App\Models\aluno_turma;
use App\Models\Escola;
use App\Models\Turma;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;

class AlunoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $alunos = Aluno::all();
        return (view('alunos.index', ['alunos' => $alunos]));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $escolas = Escola::all();
        $turmas = Turma::all();
        return view('alunos.create', ['escolas' => $escolas, 'turmas' => $turmas]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        Validator::make($request->all(), [
            'telefone' => [
                function ($attribute, $value, $fail) {
                    if (!(preg_match('/^(\(\d{2}\))?\d{4,5}-\d{4}$/', $value) > 0) && !is_null($value)) {
                        $fail('o Telefone deve ter o formato (99)99999-9999 ou (99)9999-9999 ou 99999-9999 ou 9999-9999');
                    }
                },
            ],
        ])->validate();

        $turma_id = $request->all()['turma_id'];
        $turma = Turma::find($turma_id);
        $aluno = Aluno::create($request->all());
        $aluno->turma()->attach($turma);
        return redirect(route('aluno.index'));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $aluno = Aluno::find($id);
        return view('alunos.show', ['aluno' => $aluno]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $aluno = Aluno::find($id);
        $escolas = Escola::all();
        $turmas = Turma::all();
        return view('alunos.edit', ['aluno' => $aluno, 'escolas' => $escolas, 'turmas' => $turmas]);
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
        Validator::make($request->all(), [
            'telefone' => [
                function ($attribute, $value, $fail) {
                    if (!(preg_match('/^(\(\d{2}\))?\d{4,5}-\d{4}$/', $value) > 0)) {
                        $fail('o Telefone deve ter o formato (99)99999-9999 ou (99)9999-9999 ou 99999-9999 ou 9999-9999');
                    }
                },
            ],
        ])->validate();

        $aluno = Aluno::find($id);
        $aluno->update($request->all());

        $turma_id = $request->all()['turma_id'];

        $pertenceTurma = aluno_turma::where([
            ['aluno_id', '=', $id],
            ['turma_id', '=', $turma_id]
        ])->count();
        
        if($pertenceTurma == 0){
            $turma = Turma::find($turma_id);
            $aluno->turma()->attach($turma);
        }

        return redirect(route('aluno.index'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $aluno = Aluno::find($id);
        $aluno->delete();
        return redirect(route('aluno.index'));
    }
}
