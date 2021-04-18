@extends('layouts.base')
@section('title', 'Criar Alunos')

@section('content')
<form class="mt-4" action="{{ route('aluno.store') }}" method="post">
    <div class="card form-group">
        <h3 class="m-3">Criação de Aluno</h3>
        @include('alunos._partials.form')
    </div>
</form>
@endsection