<?php

use App\Http\Controllers\{AlunoController, AlunoTurmaController, EscolaController, TurmaController};
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return redirect(route('escola.index'));
});

Route::resources([
    'escola' => EscolaController::class,
    'aluno' => AlunoController::class,
    'turma' => TurmaController::class,
    'alunos-turma' => AlunoTurmaController::class
]);
