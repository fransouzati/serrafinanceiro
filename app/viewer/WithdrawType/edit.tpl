<div clas="row">
    <div class="col-sm-12">
        <i class="fa fa-arrow-left"></i>
        <a href="withdrawType/view/{$withdrawType->get('id')}">
            Voltar para {$withdrawType->get('name')}
        </a>
        <hr>
    </div>
</div>

<form action="withdrawType/edit/{$withdrawType->get('id')}" method="post">
    <div class="row">
        <div class="col-sm-12 form-group">
            <label class="control-label">Nome</label>
            <input type="text" class="form-control" name="name" value="{$withdrawType->get('name')}">
        </div>
    </div>
    <div class="row">
        <div class="col-sm-12 form-group checkbox">
            <label class="checkbox">
                <input type="checkbox"  name="need_partner" {if $withdrawType->get('need_partner')}checked{/if}>
                Relacionar saídas com sócios
            </label>

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
