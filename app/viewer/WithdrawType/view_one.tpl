<div class="row">
    <div class="col-sm-12 form-group">
        <label class="control-label">Nome</label>
        <input disabled type="text" class="form-control" name="name" value="{$withdrawType->get('name')}">
    </div>
</div>
<div class="row">
    <div class="col-sm-12 form-group checkbox">
        <label class="checkbox">
            Relacionar saídas com sócios -
            {$withdrawType->get('need_partner', true)}
        </label>

    </div>
</div>
<div class="row">
    <div class="col-sm-offset-4 col-sm-4">
        <a href="withdrawType/edit/{$withdrawType->get('id')}">
            <button class="btn btn-success btn-lg btn-block">
                Editar
            </button>
        </a>
    </div>
</div>
