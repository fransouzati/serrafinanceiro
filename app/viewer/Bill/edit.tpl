<form action="bill/edit/{$bill->get('id')}" method="post">
    <div class="row">
        <div class="col-sm-4 form-group">
            <label class="control-label">Tipo de saída</label>
            <select name="id_type" class="form-control">
                {foreach $types as $type}
                    {if $type->get('id') == $bill->get('id_type')}
                        {assign var="selected" value="selected"}
                    {else}
                        {assign var="selected" value=""}
                    {/if}
                    <option {$selected} value="{$type->get('id')}">{$type->get('name')}</option>
                {/foreach}
            </select>
        </div>

        <div class="col-sm-4 form-group">
            <label class="control-label">Dia de pagamento</label>
            <input type="number" min="1" max="31" name="day" class="form-control" value="{$bill->get('day')}">
        </div>

        <div class="col-sm-4 form-group">
            <label class="control-label">Valor</label>
            <input type="text" class="form-control mask-money" name="value" value="R${$bill->get('value', true)}">
        </div>
    </div>

    <div class="row">
        <div class="col-sm-12 form-group">
            <label class="control-label" for="description">Descrição da conta</label>
            <input type="text" class="form-control" name="description" value="{$bill->get('description')}">
        </div>
    </div>

    {if $bill->get('is_variable')}
        <div class="row">
            <div class="col-sm-12 form-group">
                <label class="checkbox-inline">
                    <input type="checkbox" id="toFixed" name="to_fixed"> Tornar fixa
                </label>
            </div>
        </div>
        <div class="row" id="variable">
            <div class="col-sm-12 form-group">
                <label class="control-label" for="qttInstallments">Número de parcelas</label>
                <input type="number" class="form-control" name="qttInstallments" value="{$qttInstallments}">
                <input type="hidden" value="{$qttInstallments}" name="defaultInstallments">
            </div>
        </div>
    {else}
        <div class="row">
            <div class="col-sm-12 form-group">
                <label class="checkbox-inline">
                    <input type="checkbox" id="toVar" name="to_variable"> Tornar variável
                </label>
            </div>
        </div>
        <div class="row" id="variable" style="display: none">
            <div class="col-sm-12 form-group">
                <label class="control-label" for="qttInstallments">Número de parcelas</label>
                <input type="number" class="form-control" name="qttInstallments">
            </div>
        </div>
    {/if}

    <div class="row">
        <div class="col-sm-offset-4 col-sm-4">
            <button class="btn btn-lg btn-success btn-block">
                Editar
            </button>
        </div>
    </div>
</form>