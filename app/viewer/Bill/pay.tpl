<form action="bill/pay/{$bill->get('id')}/{$number}" method="post">
    <div class="row">
        <div class="col-sm-6 form-group">
            <label class="control-label" for="value">Valor</label>
            <input type="text" class="form-control mask-money" name="value" value="R${$bill->get('value', true)}">
        </div>

        <div class="col-sm-6 form-group">
            <label class="control-label" for="observation">Observação</label>
            <input type="text" class="form-control" name="observation">
        </div>
    </div>

    <div class="row">
        <div class="col-sm-12 form-group">
            <label for="destination" class="control-label">Este pagamento será descontado do caixa</label>
            <select required class="form-control" name="destination">
                <option value="bank">Do banco</option>
                <option value="internal">Interno</option>
            </select>
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