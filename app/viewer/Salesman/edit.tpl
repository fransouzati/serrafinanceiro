<div clas="row">
    <div class="col-sm-12">
        <i class="fa fa-arrow-left"></i>
        <a href="salesman/view/{$salesman->get('id')}">
            Voltar para perfil de {$salesman->get('name')}
        </a>
        <hr>
    </div>
</div>

<form action="salesman/edit/{$salesman->get('id')}" method="post">
    <div class="row">
        <div class="col-sm-6 form-group">
            <label class="control-label">Nome</label>
            <input type="text" class="form-control" name="name" value="{$salesman->get('name')}">
        </div>
        <div class="col-sm-6 form-group">
            <label class="control-label">Porcentagem de comissão</label>
            <input type="text" class="form-control mask-percentage" name="percentage" value="{$salesman->get('percentage', true)}%">
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
