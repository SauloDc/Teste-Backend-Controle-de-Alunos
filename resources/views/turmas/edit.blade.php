@extends('layouts.base')
@section('title', 'Editar Turma')

@section('content')
<form class="mt-4" action="{{ route('turma.update', $turma->id) }}" method="post">
    <div class="card form-group">
        <h3 class="m-3">Editar Turma</h3>
        @method('PUT')
        @include('turmas._partials.form')
    </div>
</form>
@endsection