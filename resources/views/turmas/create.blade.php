@extends('layouts.base')
@section('title', 'Criar Turma')

@section('content')
<form class="mt-4" action="{{ route('turma.store') }}" method="post">
    <div class="card form-group">
        <h3 class="m-3">Criação de Turma</h3>
        @include('turmas._partials.form')
    </div>
</form>
@endsection