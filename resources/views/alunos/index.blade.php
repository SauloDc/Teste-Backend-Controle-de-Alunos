@extends('layouts.base')
@section('title', 'Alunos')

@section('content')

<nav class="navbar justify-content-between">
    <h2 class="my-auto">Alunos</h2>
    <form class="form-inline" action="{{ route('aluno.create') }}" method="get">
        <button class="btn btn-success" type="submit">Criar Aluno</button>
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
        @foreach($alunos as $aluno)
        <tr>
            <td>{{ $aluno->id }}</td>
            <td>{{ $aluno->nome }}</td>
            <td>{{ $aluno->telefone }}</td>
            <td>{{ $aluno->email }}</td>
            <td>{{ date('d/m/Y', strtotime($aluno->dataNascimento)) }}</td>
            <td>{{ $aluno->genero }}</td>
            <td class="text-center" style="display:blocks;">
                <a class="btn btn-primary" href="{{route('aluno.show', $aluno->id)}}" title="Mostrar"><i class="far fa-eye text-white"></i></a>
                <a class="btn btn-success" href="{{route('aluno.edit', $aluno->id)}}" title="Editar"><i class="far fa-edit text-white"></i></a>
                <form action="{{route('aluno.destroy', $aluno->id)}}" method="post" style="display:inline">
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