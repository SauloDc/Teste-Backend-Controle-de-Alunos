@extends('layouts.base')
@section('title', 'Editar Escolas')

@section('content')
    <form class="mt-4" action="{{ route('escola.update', $escola->id) }}" method="post"> 
        @method('PUT')
        @include('escolas._partials.form')
    </form>
@endsection