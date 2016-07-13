<div clas="row">
    <div class="col-sm-12">
        <i class="fa fa-arrow-left"></i>
        <a href="investor/view/{$investor->get('id')}">
            Voltar para perfil de {$investor->get('name')}
        </a>
        <hr>
    </div>
</div>

<form action="investor/edit/{$investor->get('id')}" method="post">
    <div class="row">
        <div class="col-sm-6 form-group">
            <label class="control-label">Nome</label>
            <input type="text" class="form-control" name="name" value="{$investor->get('name')}">
        </div>
        <div class="col-sm-6 form-group">
            <label class="control-label">Capital inicial</label>
            <input type="text" class="form-control mask-money" name="initial_capital" value="R${$investor->get('initial_capital', true)}">
        </div>
    </div>
    <div class="row">
        <div class="col-sm-12 form-group checkbox">
            <label class="checkbox">
                <input type="checkbox"  name="is_partner" {if $investor->get('is_partner')}checked{/if}>
                Este investidor também é um sócio
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
