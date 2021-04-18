@extends('layouts.base')
@section('title', 'Criar Escolas')

@section('content')
<form class="mt-4" action="{{ route('escola.store') }}" method="post">
    <div class="card form-group ">
        <h3 class="m-3">Criação de Escola</h3>
        @include('escolas._partials.form')
    </div>
</form>
@endsection