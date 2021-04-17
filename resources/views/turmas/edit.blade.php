@extends('layouts.base')
@section('title', 'Editar Turma')

@section('content')
    <form class="mt-4" action="{{ route('turma.update', $turma->id) }}" method="post"> 
        @method('PUT')
        @include('turmas._partials.form')
    </form>
@endsection