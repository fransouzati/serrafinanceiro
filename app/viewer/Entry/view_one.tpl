<div class="row">
    <div class="col-sm-12 form-group">
        <label class="control-label">Nome</label>
        <input disabled type="text" class="form-control" name="name" value="{$entryType->get('name')}">
    </div>
</div>
<div class="row">
    <div class="col-sm-offset-4 col-sm-4">
        <a href="entryType/edit/{$entryType->get('id')}">
            <button class="btn btn-success btn-lg btn-block">
                Editar
            </button>
        </a>
    </div>
</div>
