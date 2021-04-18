@extends('layouts.base')
@section('title', 'Editar Aluno')

@section('content')
<form class="mt-4" action="{{ route('aluno.update', $aluno->id) }}" method="post">
    <div class="card form-group">
        <h3 class="m-3">Editar Aluno</h3>
        @method('PUT')
        @include('alunos._partials.form')
    </div>    
</form>
@endsection