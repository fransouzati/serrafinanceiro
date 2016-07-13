<div clas="row">
    <div class="col-sm-12">
        <i class="fa fa-arrow-left"></i>
        <a href="entryType/view/{$entryType->get('id')}">
            Voltar para {$entryType->get('name')}
        </a>
        <hr>
    </div>
</div>

<form action="entryType/edit/{$entryType->get('id')}" method="post">
    <div class="row">
        <div class="col-sm-12 form-group">
            <label class="control-label">Nome</label>
            <input type="text" class="form-control" name="name" value="{$entryType->get('name')}">
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
