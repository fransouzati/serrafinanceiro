<div class="row">
    <div class="col-sm-6 form-group">
        <label class="control-label">Nome</label>
        <input disabled type="text" class="form-control" name="name" value="{$investor->get('name')}">
    </div>
    <div class="col-sm-6 form-group">
        <label class="control-label">Capital inicial</label>
        <input disabled type="text" class="form-control mask-money" name="initial_capital" value="R${$investor->get('initial_capital', true)}">
    </div>
</div>
<div class="row">
    <div class="col-sm-12 form-group">
        <label class="control-label checkbox">
            Este investidor também é um sócio -
            {$investor->get('is_partner', true)}
        </label>

    </div>
</div>
<div class="row">
    <div class="col-sm-offset-4 col-sm-4">
        <a href="investor/edit/{$investor->get('id')}">
            <button class="btn btn-success btn-lg btn-block">
                Editar
            </button>
        </a>
    </div>
</div>
