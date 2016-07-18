<div clas="row">
    <div class="col-sm-12">
        <i class="fa fa-arrow-left"></i>
        <a href="client/view/{$client->get('id')}">
            Voltar para perfil de {$client->get('name')}
        </a>
        <hr>
    </div>
</div>

<form action="client/edit/{$client->get('id')}" method="post">
    <div class="row">
        <div class="col-sm-6 form-group">
            <label class="control-label" for="name">Nome</label>
            <input required type="text" class="form-control" name="name" value="{$client->get('name')}">
        </div>
        <div class="col-sm-6 form-group">
            <label class="control-label" for="cpf_cnpj">CPF/CNPJ</label>
            <input type="text" class="form-control" name="cpf_cnpj" value="{$client->get('cpf_cnpj')}">
        </div>
    </div>
    <div class="row">
        <div class="col-sm-6 form-group">
            <label class="control-label" for="email1">Email 1</label>
            <input type="email" class="form-control" name="email1" value="{$client->get('email1')}">
        </div>
        <div class="col-sm-6 form-group">
            <label class="control-label" for="email2">Email 2</label>
            <input type="email" class="form-control" name="email2" value="{$client->get('email2')}">
        </div>
    </div>
    <div class="row">
        <div class="col-sm-6 form-group">
            <label class="control-label" for="phone1">Telefone 1</label>
            <input type="text" class="form-control mask-phone" name="phone1" value="{$client->get('phone1')}">
        </div>
        <div class="col-sm-6 form-group">
            <label class="control-label" for="phone2">Telefone 2</label>
            <input type="text" class="form-control mask-phone" name="phone2" value="{$client->get('phone2')}">
        </div>
    </div>
    <div class="row">
        <div class="col-sm-6 form-group">
            <label class="control-label" for="site">Site</label>
            <input type="text" class="form-control" name="site" value="{$client->get('site')}">
        </div>
        <div class="col-sm-6 form-group">
            <label class="control-label" for="since">Cliente desde</label>
            <input type="text" class="form-control mask-date" name="since" value="{$client->get('since', true)}">
        </div>
    </div>
    <div class="row">
        <div class="col-sm-6 form-group">
            <label class="control-label" for="responsible">Responsável</label>
            <input type="text" class="form-control" name="responsible" value="{$client->get('responsible')}">
        </div>
        <div class="col-sm-6 form-group">
            <label class="control-label" for="responsible_cpf">CPF Responsável</label>
            <input type="text" class="form-control mask-cpf" name="responsible_cpf" value="{$client->get('responsible_cpf')}">
        </div>
    </div>
    <div class="row">
        <div class="col-sm-12 form-group">
            <label class="control-label" for="address">Endereço</label>
            <input type="text" class="form-control" name="address" value="{$client->get('address')}">
        </div>
    </div>
    <div class="row">
        <div class="col-sm-12 form-group">
            <label class="control-label" for="observation">Observações</label>
            <textarea name="observation" class="form-control">{$client->get('observation')}</textarea>
        </div>
    </div>
    <div class="row">
        <div class="col-sm-12 form-group">
            {if $client->get('status')}
                {assign var="ativo" value="checked"}
                {assign var="inativo" value=""}
            {else}
                {assign var="inativo" value="checked"}
                {assign var="ativo" value=""}
            {/if}
            <label class="control-label radio-inline" for="status">
                <input type="radio" value="1" name="status" {$ativo}> Ativo
            </label>
            <label class="control-label radio-inline" for="status">
                <input type="radio" value="0" name="status" {$inativo}> Inativo
            </label>
        </div>
    </div>

    <!-- Dados financeiros !-->
    <div class="row">
        <div class="col-sm-12">
            <h3 class="page-header">Financeiro</h3>
        </div>
    </div>
    <div class="row">
        <div class="col-sm-6 form-group">
            <label class="control-label" for="monthly_value">Suporte mensal</label>
            <input type="text" class="form-control mask-money" name="monthly_value" value="R${$finances->get('monthly_value', true)}">
        </div>
        <div class="col-sm-6 form-group">
            <label class="control-label" for="payment_day">Dia de pagamento</label>
            <input type="number" min="1" max="31" class="form-control" name="payment_day" value="{$finances->get('payment_day')}">
        </div>
    </div>
    <div class="row">
        <div class="col-sm-12 form-group">
            <label class="control-label" for="observation_finances">Observações financeiras</label>
            <textarea name="observation_finances" class="form-control">{$finances->get('observation')}</textarea>
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