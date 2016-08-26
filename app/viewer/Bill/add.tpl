<form action="bill/add" method="post">

    <div class="row">
        <div class="col-sm-12 form-group">
            <label class="radio-inline"><input type="radio" checked name="is_variable" value="0">Conta fixa</label>
            <label class="radio-inline"><input type="radio" name="is_variable" value="1">Conta variável</label>
            <span id="variable">
                <label class="radio-inline">
                    Perdurará por <input type="text" size="2" name="qttInstallments"> meses
                </label>
            </span>
        </div>
    </div>

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
            <label id="valueLabel" class="control-label">Valor (aprox.)</label>
            <input type="text" class="form-control mask-money" name="value">
        </div>
    </div>

    <div class="row">
        <div class="col-sm-12 form-group">
            <label class="control-label" for="description">Descrição da conta</label>
            <input type="text" class="form-control" name="description">
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