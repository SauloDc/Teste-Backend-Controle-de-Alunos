@extends('layouts.base')
@section('title', 'Home')

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
            <th>First name</th>
            <th>Last name</th>
            <th>Position</th>
            <th>Office</th>
            <th>Age</th>
            <th>Start date</th>
            <th>Salary</th>
            <th>Extn.</th>
            <th>E-mail</th>
        </tr>
    </thead>
    <tbody>
        @for($i=0 ;$i < 100; $i++) 
            <tr>
                <td>Tiger</td>
                <td>Nixon</td>
                <td>System Architect</td>
                <td>Edinburgh</td>
                <td>61</td>
                <td>2011/04/25</td>
                <td>$320,800</td>
                <td>5421</td>
                <td>t.nixon@datatables.net</td>
            </tr>
        @endfor
    </tbody>
</table>



    <div class="card-body">
        <div class="table-responsive">
            <table class="table table-bordered" width="100%" cellspacing="0">
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
                </tbody>
            </table>
            <nav>
                <div class="pagination justify-content-end">
                    {{ $escolas->links() }}
                </div>
            </nav>
        </div>
    </div>
    @endsection