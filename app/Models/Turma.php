<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Turma extends Model
{
    use HasFactory;

    protected $fillable = [
        'ano',
        'nivel',
        'serie',
        'turno',
        'escola_id'
    ];

    public function escola()
    {
        return $this->belongsTo(Escola::class);
    }

    public  function aluno()
    {
        return $this->belongsToMany(Aluno::class);
    }

}
