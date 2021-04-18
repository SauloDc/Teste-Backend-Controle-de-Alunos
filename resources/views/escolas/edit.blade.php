@extends('layouts.base')
@section('title', 'Editar Escolas')

@section('content')
<form class="mt-4" action="{{ route('escola.update', $escola->id) }}" method="post">
    <div class="card form-group ">
        <h3 class="m-3">Editar Escola</h3>
        @method('PUT')
        @include('escolas._partials.form')
    </div>
</form>
@endsection