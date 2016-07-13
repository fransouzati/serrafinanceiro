<form action="user/editBalance/{$investor->get('id')}" method="post">
    <div class="row">
        <div class="col-sm-12 form-group">
            <label class="control-label">Saldo</label>
            <input type="text" class="form-control mask-money" name="initial_capital"
                   value="R${$investor->get('initial_capital', true)}">
        </div>
        <input type="hidden" name="destination" value="{$destination}">
    </div>
    <div class="row">
        <div class="col-sm-offset-4 col-sm-4">
            <button class="btn btn-lg btn-success btn-block">
                Editar
            </button>
        </div>
    </div>
</form>
