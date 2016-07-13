<form action="bill/add" method="post">
    <div class="row">
        <div class="col-sm-4 form-group">
            <label class="control-label">Tipo de saída</label>
            <select name="id_type" class="form-control">
                {foreach $types as $type}
                    <option value="{$type->get('id')}">{$type->get('name')}</option>
                {/foreach}
            </select>
        </div>

        <div class="col-sm-4 form-group">
            <label class="control-label">Dia de pagamento</label>
            <input type="number" min="1" max="31" name="day" class="form-control">
        </div>

        <div class="col-sm-4 form-group">
            <label class="control-label">Valor (aprox.)</label>
            <input type="text" class="form-control mask-money" name="value">
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