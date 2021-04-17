@csrf
<div class="card form-group ">
    <h3 class="m-3">Criação de Escola</h3>
    <div class="m-3">
        <div class="form-row">
            <div class="form-group col-md">
                <label>Nome da Escola</label>
                <input type="text" name="nome" class="form-control" value="{{$escola->nome ?? old('nome')}}" required>
            </div>
        </div>
        <div class="form-row">
            <div class="form-group col-md">
                <label> Endereço</label>
                <input type="text" name="endereco" class="form-control" value="{{$escola->endereco ?? old('endereco')}}" required>
            </div>
        </div>
        <div class="form-row">
            <button class="col-md btn btn-primary" type="submit">Salvar</button>
        </div>
    </div>
</div>