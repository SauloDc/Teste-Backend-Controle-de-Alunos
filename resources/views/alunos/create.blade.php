@extends('layouts.base')
@section('title', 'Criar Alunos')

@section('content')
    <form class="mt-4" action="{{ route('aluno.store') }}" method="post"> 
        @include('alunos._partials.form')
    </form>
@endsection