@csrf
<div class="card form-group">
    <h3 class="m-3">Criação de Turma</h3>
    <div class="m-3">
        <div class="form-row">
            <div class="form-group col-md">
                <label>Ano</label>
                <input class="date form-control" type="date" name="ano" value="{{ date('Y-m-d', strtotime(@$turma->ano)) ?? old('ano') }}">
            </div>

            <div class="form-group col-md">
                <label>Turno</label>
                <select class="form-control" name="turno" value="{{ $turma->turno ?? old('turno') }}">
                    <option>Escolha o Turno</option>
                    <option {{ @$turma->turno === 'Manhã' ? 'selected' : '' }} value="Manhã">Manhã</option>
                    <option {{ @$turma->turno === 'Tarde' ? 'selected' : '' }} value="Tarde">Tarde</option>
                    <option {{ @$turma->turno === 'Noite' ? 'selected' : '' }} value="Noite">Noite</option>
                </select>
            </div>
        </div>

        <div class="form-row">
            <div class="form-group col-md">
                <label>Nivel</label>
                <select class="form-control" name="nivel" value="{{ $turma->nivel ?? old('nivel') }}">
                    <option>Escolha o Nivel de Ensino</option>
                    <option {{ @$turma->nivel === 'Ensino Médio' ? 'selected' : '' }} value="Ensino Médio">Ensino Médio</option>
                    <option {{ @$turma->nivel === 'Ensino Fundamental' ? 'selected' : '' }} value="Ensino Fundamental">Ensino Fundamental</option>
                </select>
            </div>

            <div class="form-group col-md">
                <label>Serie</label>
                <input type="text" class="form-control" name="serie" placeholder="1 - 9" value="{{ @$turma->serie ?? old('serie') }}">
            </div>
        </div>

        <div class="form-row">
            <div class="form-group col-md">
                <label>Escola</label>
                <select class="form-control" name="escola_id" value="{{ @$turma->escola_id ?? old('escola_id') }}" required>
                    <option>Escolha a Escola</option>
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
</div>