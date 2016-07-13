
<!-- Bills to pay !-->
<div class="showback">
    <div class="row">
        <div class="col-sm-12">
            <h4>Contas a pagar</h4>
        </div>
        <div class="col-md-12 table-responsive">
            <table class="table table-bordered table-hover datatable">
                <thead>
                <tr>
                    <th>Conta</th>
                    <th>Dia de vencimento</th>
                    <th>Valor (aprox.)</th>
                    <th>Ações</th>
                </tr>
                </thead>
                <tbody>
                {foreach $bills as $bill}
                    <tr>
                        <td>{$bill->get('id_type', true)->get('name')}</td>
                        <td>{$bill->get('day')}</td>
                        <td>R${$bill->get('value', true)}</td>
                        <td>
                            <a href="bill/pay/{$bill->get('id')}">
                                <button class="btn btn-success" title="Pagar">
                                    <i class="fa fa-dollar"></i>
                                </button>
                            </a>
                        </td>
                    </tr>
                {/foreach}
                </tbody>
            </table>
        </div>
    </div>
</div>