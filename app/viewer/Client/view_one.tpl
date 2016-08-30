<ul class="nav nav-tabs">
    <li class="active">
        <a data-toggle="tab" href="#clientData">Dados do cliente</a>
    </li>
    <li>
        <a data-toggle="tab" href="#financesData">Dados financeiros</a>
    </li>
    <li>
        <a data-toggle="tab" href="#projectsData">Projetos</a>
    </li>
    <li>
        <a data-toggle="tab" href="#extraChargesData">Cobranças extras</a>
    </li>
</ul>

<div class="tab-content">
    <div id="clientData" class="tab-pane fade in active">
        <div class="row">
            <div class="col-sm-12">
                <h3 class="page-header">Dados do cliente</h3>
            </div>
        </div>
        <div class="row">
            <div class="col-sm-6 form-group">
                <label class="control-label" for="name">Nome</label>
                <input disabled type="text" class="form-control" name="name" value="{$client->get('name')}">
            </div>
            <div class="col-sm-6 form-group">
                <label class="control-label" for="cpf_cnpj">CPF/CNPJ</label>
                <input disabled type="text" class="form-control" name="cpf_cnpj" value="{$client->get('cpf_cnpj')}">
            </div>
        </div>
        <div class="row">
            <div class="col-sm-6 form-group">
                <label class="control-label" for="email1">Email 1</label>
                <input disabled type="email" class="form-control" name="email1" value="{$client->get('email1')}">
            </div>
            <div class="col-sm-6 form-group">
                <label class="control-label" for="email2">Email 2</label>
                <input disabled type="email" class="form-control" name="email2" value="{$client->get('email2')}">
            </div>
        </div>
        <div class="row">
            <div class="col-sm-6 form-group">
                <label class="control-label" for="phone1">Telefone 1</label>
                <input disabled type="text" class="form-control mask-phone" name="phone1"
                       value="{$client->get('phone1')}">
            </div>
            <div class="col-sm-6 form-group">
                <label class="control-label" for="phone2">Telefone 2</label>
                <input disabled type="text" class="form-control mask-phone" name="phone2"
                       value="{$client->get('phone2')}">
            </div>
        </div>
        <div class="row">
            <div class="col-sm-6 form-group">
                <label class="control-label" for="site">Site</label>
                <input disabled type="text" class="form-control" name="site" value="{$client->get('site')}">
            </div>
            <div class="col-sm-6 form-group">
                <label class="control-label" for="since">Cliente desde</label>
                <input disabled type="text" class="form-control mask-date" name="since"
                       value="{$client->get('since', true)}">
            </div>
        </div>
        <div class="row">
            <div class="col-sm-6 form-group">
                <label class="control-label" for="responsible">Responsável</label>
                <input disabled type="text" class="form-control" name="responsible"
                       value="{$client->get('responsible')}">
            </div>
            <div class="col-sm-6 form-group">
                <label class="control-label" for="responsible_cpf">CPF Responsável</label>
                <input disabled type="text" class="form-control mask-cpf" name="responsible_cpf"
                       value="{$client->get('responsible_cpf')}">
            </div>
        </div>
        <div class="row">
            <div class="col-sm-12 form-group">
                <label class="control-label" for="address">Endereço</label>
                <input disabled type="text" class="form-control" name="address" value="{$client->get('address')}">
            </div>
        </div>
        <div class="row">
            <div class="col-sm-12 form-group">
                <label class="control-label" for="observation">Observações</label>
                <textarea disabled name="observation" class="form-control">{$client->get('observation')}</textarea>
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
                    <input disabled type="radio" value="1" name="status" {$ativo}> Ativo
                </label>
                <label class="control-label radio-inline" for="status">
                    <input disabled type="radio" value="0" name="status" {$inativo}> Inativo
                </label>
            </div>
        </div>
    </div>

    <div id="financesData" class="tab-pane fade in">
        <!-- Dados financeiros !-->
        <div class="row">
            <div class="col-sm-12">
                <h3 class="page-header">Dados financeiros</h3>
            </div>
        </div>
        <div class="row">
            <div class="col-sm-6 form-group">
                <label class="control-label" for="monthly_value">Suporte mensal</label>
                <input disabled type="text" class="form-control mask-money" name="monthly_value"
                       value="R${$finances->get('monthly_value', true)}">
            </div>
            <div class="col-sm-6 form-group">
                <label class="control-label" for="payment_day">Dia de pagamento</label>
                <input disabled type="number" class="form-control" name="payment_day"
                       value="{$finances->get('payment_day')}">
            </div>
        </div>
        <div class="row mt">
            <div class="col-sm-12 form-group checkbox-inline">
                <label for="status" class="control-label">Situação: </label>
                <br>
                <div class="switch switch-square"
                     data-on-label="<i class=' fa fa-check'></i>"
                     data-off-label="<i class='fa fa-times'></i>">
                    {if $finances->get('status')}
                        <input disabled type="checkbox" checked/>
                    {else}
                        <input disabled type="checkbox"/>
                    {/if}
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-sm-12 text-center">
                <label class="control-label" for="observation_finances">Observações financeiras</label>
                <textarea disabled name="observation_finances"
                          class="form-control">{$finances->get('observation')}</textarea>
            </div>
        </div>
        {if !empty($histories)}
            <div class="row">
                <div class="col-sm-12">
                    <h4 class="page-header">Histórico financeiro</h4>
                </div>
            </div>
            <div class="row">
                <div class="col-md-12 table-responsive">
                    <table class="table table-bordered table-hover datatable" default-quantity="5">
                        <thead>
                        <tr>
                            <th>Data</th>
                            <th>Alteração</th>
                        </tr>
                        </thead>
                        <tbody>
                        {foreach $histories as $history}
                            <tr>
                                <td>{$history->get('date', true)}</td>
                                <td>{$history->get('description')}</td>
                            </tr>
                        {/foreach}
                        </tbody>
                    </table>
                </div>
            </div>
        {else}
            <br>
        {/if}
    </div>

    <div id="projectsData" class="tab-pane fade in">
        <!-- Projects !-->
        <div class="row">
            <div class="col-sm-12">
                <h3 class="page-header">
                    Projetos
                    <a href="project/add/{$client->get('id')}">
                        <button class="btn btn-primary pull-right">
                            Cadastrar
                        </button>
                    </a></h3>
            </div>
        </div>
        {if !empty($projects)}
            <div class="row">
                <div class="col-md-12 table-responsive">
                    <table class="table table-bordered table-hover datatable" default-quantity="5">
                        <thead>
                        <tr>
                            <th>Id</th>
                            <th>Nome</th>
                            <th>Cliente</th>
                            <th>Valor</th>
                            <th>Data início</th>
                            <th>Data fim</th>
                            <th>Executor</th>
                            <th>Situação</th>
                        </tr>
                        </thead>
                        <tbody>
                        {foreach $projects as $project}
                            {if $project->get('id_client') == NULL}
                                {assign var="clientName" value="-"}
                            {else}
                                {assign var="clientName" value=$project->get('id_client', true)->get('name')}
                            {/if}
                            {if $project->strtotime2($project->get('end_date')) < $project->strtotime2($project->today(false))
                            && !$project->get('done')}
                                {assign var="style" value="style='color: red'"}
                            {else}
                                {assign var="style" value=""}
                            {/if}
                            <tr>
                                <td>{$project->get('id')}</td>
                                <td>
                                    <a href="project/view/{$project->get('id')}">
                                        {$project->get('name')}
                                    </a>
                                </td>
                                <td>{$clientName}</td>
                                <td>R${$project->get('value', true)}</td>
                                <td>{$project->get('initial_date', true)}</td>
                                <td {$style}>{$project->get('end_date', true)}</td>
                                <td>{$project->get('executor')}</td>
                                <td align="center">
                                    {if $project->get('status')}
                                        <i class="fa fa-circle" style="color: #7AFF88"></i>
                                    {else}
                                        <i class="fa fa-circle" style="color: #FF6671!important"></i>
                                    {/if}
                                </td>
                            </tr>
                        {/foreach}
                        </tbody>
                    </table>
                </div>
            </div>
        {else}
            <br>
        {/if}
    </div>

    <div id="extraChargesData" class="tab-pane fade in">
        <!-- Extra charges !-->
        <div class="row">
            <div class="col-sm-12">
                <h3 class="page-header">Cobranças extras</h3>
            </div>
        </div>
        <div class="row">
            <div class="col-sm-12">
                <a href="extraCharge/add/{$client->get('id')}">
                    <button type="button" class="btn btn-primary">
                        Cadastrar cobrança extra
                    </button>
                </a>
                <hr>
            </div>
        </div>
        {if !empty($extras)}
            <div class="row">
                <div class="col-md-12 table-responsive">
                    <table class="table table-bordered table-hover datatable" default-quantity="5">
                        <thead>
                        <tr>
                            <th>Data</th>
                            <th>Valor</th>
                            <th>Descrição</th>
                            <th>Validade</th>
                            <th>Estado</th>
                            <th>Ações</th>
                        </tr>
                        </thead>
                        <tbody>
                        {foreach $extras as $extra}
                            <tr>
                                <td>{$extra->get('date', true)}</td>
                                <td>R${$extra->get('value', true)}</td>
                                <td>{$extra->get('description')}</td>
                                <td>{$extra->get('expiry', true)}</td>
                                <td>
                                    {if $extra->get('status')}
                                        <i class="fa fa-circle" style="color: #7AFF88"></i>
                                    {else}
                                        <i class="fa fa-circle" style="color: #FF6671!important"></i>
                                    {/if}
                                </td>
                                <td>
                                    <a href="extraCharge/delete/{$extra->get('id')}" class="confirm-link">
                                        <button type="button" class="btn btn-danger" title="Remover">
                                            <i class="fa fa-remove"></i>
                                        </button>
                                    </a>
                                </td>
                            </tr>
                        {/foreach}
                        </tbody>
                    </table>
                </div>
            </div>
        {else}
            <br>
        {/if}
    </div>
</div>

<div class="row">
    <div class="col-sm-offset-4 col-sm-4">
        <a href="client/edit/{$client->get('id')}">
            <button class="btn btn-success btn-lg btn-block">
                Editar cliente
            </button>
        </a>
    </div>
</div>