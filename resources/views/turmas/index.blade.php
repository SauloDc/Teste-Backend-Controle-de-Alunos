@extends('layouts.base')
@section('title', 'Turmas')

@section('content')

<nav class="navbar justify-content-between">
    <h2 class="my-auto">Turmas</h2>
    <form class="form-inline" action="" method="get">
        <button class="btn btn-success" type="submit">Criar Turma</button>
    </form>
</nav>

<table id="datatable" class="table table-striped table-bordered dt-responsive nowrap" style="width:100%">
    <thead>
        <tr>
            <th>#</th>
            <th>Nome</th>
            <th>Telefone</th>
            <th>E-mail</th>
            <th>Data Nascimento</th>
            <th>Genero</th>
            <th class="text-center">Ações</th>
        </tr>
    </thead>
    <tbody>
        @if(!empty($alunos))
        @foreach($turmas as $turma)
        <tr>
            <td>{{ $turma->id }}</td>
            <td>{{ date('Y', strtotime($turma->ano)) }}</td>
            <td>{{ $turma->nivel }}</td>
            <td>{{ $turma->serie }}ª</td>
            <td>{{ $turma->turno }}</td>
            <td class="text-center" style="display:blocks;">
                <a class="btn btn-primary" href="{{route('Turma.show', $turma->id)}}" title="Mostrar"><i class="far fa-eye text-white"></i></a>
                <a class="btn btn-success" href="{{route('Turma.edit', $turma->id)}}" title="Editar"><i class="far fa-edit text-white"></i></a>
                <form action="{{route('Turma.destroy', $turma->id)}}" method="post" style="display:inline">
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