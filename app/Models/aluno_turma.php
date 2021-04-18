<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class aluno_turma extends Model
{
    use HasFactory;

    protected $table = 'aluno_turma';
    protected $fillable = [
        'aluno_id',
        'turma_id'
    ];

    public static function alunosDestaTurma($id)
    {
        $alunosDestaTurma = [];
        $alunos_turma = aluno_turma::all()->where('turma_id', '=', $id);

        foreach ($alunos_turma as $aluno_turma){
            array_push($alunosDestaTurma, Aluno::find($aluno_turma->aluno_id));
        }

        return $alunosDestaTurma;
    }

    public  function aluno()
    {
        return $this->hasMany(Aluno::class);
    }

    public  function turma()
    {
        return $this->hasMany(Turma::class);
    }
}
