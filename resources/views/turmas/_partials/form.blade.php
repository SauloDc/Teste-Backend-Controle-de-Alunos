@csrf

@error('serie')
<div class="m-3 alert alert-danger alert-dismissible fade show" role="alert">
    {{$message}}
    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
        <span aria-hidden="true">&times;</span>
    </button>
</div>
@enderror

<div class="m-3">
    <div class="form-row">
        <div class="form-group col-md">
            <label>Ano</label>
            <input class="date form-control" type="text" id="datepicker" value="{{ date('Y-m-d', strtotime(@$turma->ano)) ?? old('ano') }}" required>
            <input type="hidden" id="datepicker2" name="ano" value="{{ @$turma->ano ?? old('ano') }}">
        </div>

        <div class="form-group col-md">
            <label>Turno</label>
            <select class="form-control" name="turno" value="{{ $turma->turno ?? old('turno') }}" required>
                <option value="">Escolha o Turno</option>
                <option {{ @$turma->turno === 'Manhã' ? 'selected' : '' }} value="Manhã">Manhã</option>
                <option {{ @$turma->turno === 'Tarde' ? 'selected' : '' }} value="Tarde">Tarde</option>
                <option {{ @$turma->turno === 'Noite' ? 'selected' : '' }} value="Noite">Noite</option>
            </select>
        </div>
    </div>

    <div class="form-row">
        <div class="form-group col-md">
            <label>Serie</label>
            <input type="number" class="form-control" name="serie" min='1' max='9' placeholder="1-9" value="{{ @$turma->serie ?? old('serie') }}" required>
        </div>

        <div class="form-group col-md">
            <label>Nivel</label>
            <select class="form-control" id="nivel" name="nivel" value="{{ $turma->nivel ?? old('nivel') }}" required>
                <option value="">Escolha o Nivel de Ensino</option>
                <option {{ @$turma->nivel === 'Ensino Médio' ? 'selected' : '' }} value="Ensino Médio">Ensino Médio</option>
                <option {{ @$turma->nivel === 'Ensino Fundamental' ? 'selected' : '' }} value="Ensino Fundamental">Ensino Fundamental</option>
            </select>
        </div>
    </div>

    <div class="form-row">
        <div class="form-group col-md">
            <label>Escola</label>
            <select class="form-control" name="escola_id" value="{{ @$turma->escola_id ?? old('escola_id') }}" required>
                <option value="">Escolha a Escola</option>
                @foreach($escolas as $escola)
                <option {{ @$turma->escola_id == $escola->id ? 'selected' : '' }} value="{{ $escola->id }}">{{ $escola->id }} - {{ $escola->nome }}</option>
                @endforeach
            </select>
        </div>
    </div>

    <div class="form-row">
        <button class="col-md btn btn-primary" type="submit">Salvar</button>
    </div>
</div>