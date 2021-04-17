@extends('layouts.base')
@section('title', 'Criar Escolas')

@section('content')
<form class="mt-4" action="{{ route('escola.store') }}" method="post"> 
    @include('escolas._partials.form')
</form>
@endsection