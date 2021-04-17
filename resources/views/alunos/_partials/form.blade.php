@csrf
<div class="card form-group">
    <h3 class="m-3">Criação de Aluno</h3>
    <div class="m-3">
        <div class="form-row">
            <div class="form-group col-md">
                <label>Nome</label>
                <input type="text" class="form-control" name="nome" value="{{@$aluno->nome ?? old('nome')}}" required>
            </div>
            <div class="form-group col-md">
                <label>Email</label>
                <input type="email" class="form-control" name="email" value="{{@$aluno->email ?? old('email')}}" required>
            </div>
        </div>

        <div class="form-row">
            <div class="form-group col-md">
                <label>Telefone</label>
                <input type="text" class="form-control" name="telefone" placeholder="9999-9999" value="{{ @$aluno->telefone ?? old('telefone') }}">
            </div>

            <div class="form-group col-md">
                <label>Data de Nascimento </label>
                <input class="date form-control" type="date" name="data_nascimento" value="{{ date('Y-m-d', strtotime(@$aluno->dataNascimento)) ?? old('dataNascimento') }}">
            </div>

            <div class="form-group col-md">
                <label>Gênero</label>
                <select class="form-control" name="genero" value="{{ @$aluno->sexo ?? old('sexo') }}">
                    <option>Escolha o Genero</option>
                    <option {{ @$aluno->sexo === 'Masculino' ? 'selected' : '' }} value="Masculino">Masculino</option>
                    <option {{ @$aluno->sexo === 'Feminino' ? 'selected' : '' }} value="Feminino">Feminino</option>
                </select>
            </div>
        </div>
        
        <div class="form-row">
            <div class="form-group col-md">
                <label>Escola</label>
                <select class="form-control" name="escola_id" value="{{@$aluno->escola_id ?? old('escola_id') }}">
                    <option>Escolha a Escola</option>
                    @foreach($escolas as $escola)
                    <option {{ @$aluno->escola_id == $escola->id ? 'selected' : '' }} value="{{ $escola->id }}">
                        {{ $escola->id }} - {{ $escola->nome }}
                    </option>
                    @endforeach
                </select>
            </div>
            <div class="form-group col-md">
                <label>Turma</label>
                <select class="form-control" name="turma_id" value="{{@$aluno->turma_id ?? old('turma_id') }}">
                    <option>Escolha a Turma</option>
                    @foreach($turmas as $turma)

                    <option {{ @$turma->id == @$aluno->turma_id ? 'selected' : '' }} value="{{@$turma->id }}">
                        {{ $turma->id }} - Turma de {{ date('Y', strtotime($turma->ano))}} - {{ $turma->turno}}
                    </option>
                    @endforeach
                </select>
            </div>
        </div>
        
        <div class="form-row">
            <button class="col-md btn btn-primary" type="submit">Salvar</button>
        </div>
    </div>
</div>