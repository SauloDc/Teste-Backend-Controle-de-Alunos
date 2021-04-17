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
        $alunos_turma = aluno_turma::all();
        foreach ($alunos_turma as $turma) {
            if($turma == $id){
                array_push($alunosDestaTurma, Aluno::find($id));
            }
        }
        return $alunosDestaTurma;
    }  

    public  function aluno(){
        return $this->hasMany(Aluno::class);
    }

    public  function turma(){
        return $this->hasMany(Turma::class);
    }

}
