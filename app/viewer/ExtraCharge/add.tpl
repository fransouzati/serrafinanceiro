<form action="extraCharge/add/{$id_client}" method="post">
    <div class="row">
        <div class="col-sm-4 form-group">
            <label for="date" class="control-label">Data</label>
            <input required type="text" class="form-control mask-date" name="date">
        </div>

        <div class="col-sm-4 form-group">
            <label for="value" class="control-label">Valor</label>
            <input required class="form-control mask-money" name="value" type="text">
        </div>

        <div class="col-sm-4 form-group">
            <label for="expiry" class="control-label">Validade</label>
            <input required class="form-control mask-date" name="expiry" type="text">
        </div>
    </div>

    <div class="row">
        <div class="col-sm-12 form-group">
            <label class="control-label radio-inline" for="status">
                <input required type="radio" value="0" name="status" checked> Cobrança com pagamento pendente
            </label>
            <label class="control-label radio-inline" for="status">
                <input required type="radio" value="1" name="status"> Cobrança já foi paga
            </label>
        </div>
    </div>

    <div class="row">
        <div class="col-sm-12 form-group">
            <label for="description" class="control-label">Descrição</label>
            <textarea name="description" class="form-control"></textarea>
        </div>
    </div>

    <div class="row">
        <div class="col-sm-offset-4 col-sm-4">
            <button class="btn btn-lg btn-success btn-block">
                Cadastrar
            </button>
        </div>
    </div>
</form>