@extends('layouts.base')
@section('title', 'Criar Turma')

@section('content')
<form class="mt-4" action="{{ route('turma.store') }}" method="post"> 
    @include('turmas._partials.form')
</form>
@endsection