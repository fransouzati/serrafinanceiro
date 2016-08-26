<div class="row">
    <div class="col-sm-12 form-group">
        {if $bill->get('is_variable')}
            <label class="radio-inline"><input disabled type="radio" checked name="is_variable" value="1">Conta variável</label>
            <label class="radio-inline">
                Perdurará por <input disabled type="text" size="2" name="qttInstallments" value="{$months}"> meses
            </label>
            {assign var="valueLabel" value="Valor das parcelas"}
        {else}
            <label class="radio-inline"><input disabled type="radio" checked name="is_variable" value="0">Conta fixa</label>
            {assign var="valueLabel" value="Valor (aprox.)"}
        {/if}
    </div>
</div>

<div class="row">
    <div class="col-sm-4 form-group">
        <label class="control-label">Tipo de saída</label>
        <input disabled type="text" class="form-control" value="{$bill->get('id_type', true)->get('name')}">
    </div>

    <div class="col-sm-4 form-group">
        <label class="control-label">Dia de pagamento</label>
        <input disabled type="number" min="1" max="31" name="day" class="form-control" value="{$bill->get('day')}">
    </div>

    <div class="col-sm-4 form-group">
        <label class="control-label">{$valueLabel}</label>
        <input disabled type="text" class="form-control mask-money" name="value" value="R${$bill->get('value', true)}">
    </div>
</div>

<div class="row">
    <div class="col-sm-12 form-group">
        <label class="control-label" for="description">Descrição da conta</label>
        <input disabled type="text" class="form-control" name="description" value="{$bill->get('description')}">
    </div>
</div>

{if !empty($installments)}
    <div class="row">
        <div class="col-sm-12">
            <h3 class="page-header">Parcelas</h3>
        </div>
    </div>
    <div class="row">
        <div class="col-md-12 table-responsive">
            <table class="table table-bordered table-hover datatable">
                <thead>
                <tr>
                    <th>Nro.</th>
                    <th>Valor</th>
                    <th>Vencimento</th>
                    <th>Status</th>
                </tr>
                </thead>
                <tbody>
                    {foreach $installments as $installment}
                        <tr>
                            <td>{$installment->get('number')}</td>
                            <td>R${$installment->get('value', true)}</td>
                            <td>{$installment->get('expiry', true)}</td>
                            <td>
                                {if $installment->get('payed')}
                                    Paga - {$installment->get('id_payment', true)->get('date')}
                                {else}
                                    Pendente
                                {/if}
                            </td>
                        </tr>
                    {/foreach}
                </tbody>
            </table>
        </div>
    </div>
{/if}

<div class="row">
    <div class="col-sm-offset-4 col-sm-4">
        <a href="bill/edit/{$bill->get('id')}">
            <button class="btn btn-success btn-lg btn-block">
                Editar
            </button>
        </a>
    </div>
</div>
