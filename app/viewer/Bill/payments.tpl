<div class="row">
    <div class="col-sm-12">
        <hr>
    </div>
</div>
<!-- Filtros !-->
<div class="row">
    <div class="col-sm-12">
        <h4>Filtros</h4>
    </div>
</div>

<div class="row">
    <form action="bill/payments" method="post" class="ignore-wait">

        <div class="col-sm-4 form-group">
            <label for="_filter_period" class="control-label">Período</label>
            <input type="text" value="{$_filter_period}" name="_filter_period" class="form-control mask-dateinterval">
        </div>
        <div class="col-sm-12">
            <button type="submit" class="btn btn-default" name="submit" value="filter">
                Aplicar filtro
            </button>
        </div>
    </form>
</div>
<div class="row">
    <div class="col-sm-12">
        <hr>
    </div>
</div>
<div class="row">
    <div class="col-sm-12">
        <div class="col-md-12 table-responsive">
            <table class="table table-bordered table-hover datatable">
                <thead>
                <tr>
                    <th>Conta</th>
                    <th>Data</th>
                    <th>Valor</th>
                </tr>
                </thead>
                <tbody>
                {foreach $payments as $payment}
                    <tr>
                        <td>{$payment->get('id_bill', true)->get('id_type', true)->get('name')}</td>
                        <td>{$payment->get('date', true)}</td>
                        <td>R${$payment->get('value', true)}</td>
                    </tr>
                {/foreach}
                </tbody>
            </table>
        </div>
    </div>
</div>
