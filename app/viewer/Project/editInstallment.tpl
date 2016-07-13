<div clas="row">
    <div class="col-sm-12">
        <i class="fa fa-arrow-left"></i>
        <a href="project/view/{$installment->get('id_project')}">
            Voltar para projeto
        </a>
        <hr>
    </div>
</div>

<form action="project/editInstallment/{$installment->get('id')}" method="post">
    <div class="row">
        <div class="col-sm-6 form-group">
            <label class="control-label" for="value">Valor</label>
            <input required type="text" class="form-control mask-money" name="value" value="R${$installment->get('value', true)}">
        </div>
        <div class="col-sm-6 form-group">
            <label class="control-label" for="expiry">Validade</label>
            <input required type="text" class="form-control mask-date" name="expiry" value="{$installment->get('expiry', true)}">
        </div>
    </div>
    <div class="row">
        <div class="col-sm-offset-4 col-sm-4">
            <button class="btn btn-lg btn-success btn-block">
                Editar
            </button>
        </div>
    </div>
</form>