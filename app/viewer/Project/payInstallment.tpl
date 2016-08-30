<!-- Modal -->
<div class="modal fade" id="payInstallmentModal" tabindex="-1" role="dialog" aria-labelledby="payInstallment"
     aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                <h4 class="modal-title">Pagar parcela de projeto</h4>
            </div>
            <div class="modal-body">
                <div class="row">
                    <div class="col-sm-12">
                        <h3 id="_client_name" class="page-header"></h3>
                    </div>
                </div>
                <form id="_form_payment" method="post" action="">
                    <div class="row">
                        <div class="col-sm-6 form-group">
                            <label for="value" class="control-label" name="value">Valor</label>
                            <input type="text" id="_installment_value" class="mask-money form-control">
                        </div>
                        <div class="col-sm-6 form-group">
                            <label for="date" name="date">Data</label>
                            <input type="text" name="date" class="mask-date form-control"
                                   value="{$smarty.now|date_format:'%Y-%m-%d'}">
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-sm-12 form-group">
                            <label for="destination" class="control-label">Este pagamento será creditado no caixa</label>
                            <select required class="form-control" name="destination">
                                <option value="bank">Do banco</option>
                                <option value="internal">Interno</option>
                            </select>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-sm-12">
                            <button type="submit" class="btn btn-success">
                                Registrar pagamento
                            </button>
                        </div>
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Fechar</button>
            </div>
        </div>
    </div>
</div>