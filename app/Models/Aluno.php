<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Aluno extends Model
{
    use HasFactory;
    protected $fillable = [
        'nome',
        'telefone',
        'email',
        'data_nascimento',
        'genero',
        'escola_id'
    ];

    public  function escola()
    {
        return $this->belongsTo(Escola::class);
    }

    public  function turma()
    {
        return $this->belongsToMany(Turma::class)->withTimestamps();
    }
}
