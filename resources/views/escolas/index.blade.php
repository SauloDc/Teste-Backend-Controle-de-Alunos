@extends('layouts.base')
@section('title', 'Escolas')

@section('content')
<nav class="mt-2 navbar justify-content-between">
    <h2 class="my-auto">Escolas</h2>
    <form class="form-inline" action="" method="get">
        <button class="btn btn-success " type="submit">Criar Escola</button>
    </form>
</nav>
<table id="datatable" class="table table-striped table-bordered dt-responsive nowrap" style="width:100%">
    <thead>
        <tr>
            <th>#</th>
            <th>Escola</th>
            <th>Endereço</th>
            <th>Qtd Alunos</th>
            <th class="text-center">Ações</th>
        </tr>
    </thead>
    <tbody>
        @if(!empty($escolas))
        @foreach($escolas as $escola)
        <tr>
            <td>{{ $escola->id }}</td>
            <td>{{ $escola->nome }}</td>
            <td>{{ $escola->endereco }}</td>
            <td>{{ $qtdAlunos[$escola->id] }}</td>
            <td class="text-center" style="display:blocks;">
                <a class="btn btn-primary" href="{{route('Escola.show', $escola->id)}}" title="Mostrar"><i class="far fa-eye text-white"></i></a>
                <a class="btn btn-success" href="{{route('Escola.edit', $escola->id)}}" title="Editar"><i class="far fa-edit text-white"></i></a>
                <form action="{{route('Escola.destroy', $escola->id)}}" method="post" style="display:inline">
                    @method('DELETE')
                    @csrf
                    <button class=" center btn btn-danger" type="submit" title="Apagar"><i class="far fa-trash-alt text-white"></i></button>
                </form>
            </td>
        </tr>
        @endforeach
        @endif
    </tbody>
</table>

@endsection