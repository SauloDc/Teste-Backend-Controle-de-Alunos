<!DOCTYPE html>
<html lang="bt-br">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.5.2/css/bootstrap.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/1.10.24/css/dataTables.bootstrap4.min.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/responsive/2.2.7/css/responsive.bootstrap4.min.css">
    <link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">

    <title>@yield('title')</title>
</head>

<body>

    <nav class="navbar navbar-expand-lg navbar-dark bg-primary">
        <div class="container">
            <a class=" ml-3 navbar-brand" href="{{ route('escola.index') }}">Escolas</a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#nav" aria-controls="nav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="nav">
                <ul class="navbar-nav mr-auto">
                    <li class="ml-3 nav-item active">
                        <a class="nav-link" href="{{ route('turma.index') }}">Turmas <span class="sr-only">(current)</span></a>
                    </li>
                    <li class="ml-3 nav-item active">
                        <a class="nav-link" href="{{ route('aluno.index') }}">Alunos<span class="sr-only">(current)</span></a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>
    <div class="container">
        <div class="card-body">
            @yield('content')
        </div>
    </div>

    <script src="https://code.jquery.com/jquery-3.5.1.js"></script>
    <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
    <script src="https://cdn.datatables.net/1.10.24/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.10.24/js/dataTables.bootstrap4.min.js"></script>
    <script src="https://cdn.datatables.net/responsive/2.2.7/js/dataTables.responsive.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://kit.fontawesome.com/609f1c09b3.js" crossorigin="anonymous"></script>
    <script src="{{ asset('js/app.js') }}"></script>
</body>

</html>