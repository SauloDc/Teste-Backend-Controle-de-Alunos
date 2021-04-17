<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Escola extends Model
{
    use HasFactory;

    protected $fillable = [
        'nome',
        'endereco'
    ];

    public function turma()
    {
        return $this->hasMany(Turma::class);
    }

    public static function qtdAlunos()
    {
        $qtdAlunos = [];
        $escolas = Escola::paginate(10);
        foreach ($escolas as $escola) {
            $qtdAlunos[$escola->id] =  Aluno::all()->where('escola_id', '=', $escola->id)->count();
        }
        return $qtdAlunos;
    }
}
