@extends('layouts.base')
@section('title', 'Editar Aluno')

@section('content')
    <form class="mt-4" action="{{ route('aluno.update', $aluno->id) }}" method="post"> 
        @method('PUT')
        @include('alunos._partials.form')
    </form>
@endsection

