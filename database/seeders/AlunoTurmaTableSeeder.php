<?php

namespace Database\Seeders;

use App\Models\Aluno;
use App\Models\aluno_turma;
use App\Models\Turma;
use Illuminate\Database\Seeder;

class AlunoTurmaTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $turmas = Turma::all();
        foreach ($turmas as $turma) {
            $alunos = Aluno::all()->where('escola_id', '=', $turma->escola_id);
            foreach ($alunos as $aluno) {
                $aluno->turma()->attach($turma);
            }
        }
    }
}
