<div class="row">
    <div class="col-md-12" style="margin-bottom: 20px;">
        <a href="client/add">
            <button class="btn btn-primary pull-right">
                Cadastrar
            </button>
        </a>
    </div>
    <div class="col-sm-12">
        <hr>
    </div>
</div>

<!-- Filtros !-->
<div class="row">
    <div class="col-sm-12">
        <h4>Filtros</h4>
    </div>
</div>
<div class="row">
    <form action="client/view" method="post" class="ignore-wait">
        <input class="filter-input" filter-type="status" type="hidden" value="{$_filter_status}" name="_filter_status">
        <input class="filter-input" filter-type="finances" type="hidden" value="{$_filter_finances}"
               name="_filter_finances">

        <div class="col-sm-12">
            <h4>
                <span class="label label-primary filter" filter-type="status" value="all">Todos</span>
                <span class="label label-default filter" filter-type="status" value="actives">Somente ativos</span>
                <span class="label label-default filter" filter-type="status" value="inactives">Somente inativos</span>
            </h4>
        </div>
        <div class="col-sm-12">
            <h4>
                <span class="label label-primary filter" filter-type="finances" value="all">Todos</span>
                <span class="label label-default filter" filter-type="finances" value="pending">Com pendências</span>
                <span class="label label-default filter" filter-type="finances" value="ok">Sem pendências</span>
            </h4>
        </div>
        <div class="col-sm-12">
            <button type="submit" class="btn btn-default" name="submit" value="filter">
                Aplicar filtro
            </button>
            <div class="btn-group">
                <button type="button" class="btn btn-default dropdown-toggle" data-toggle="dropdown"
                        aria-haspopup="true"
                        aria-expanded="false">
                    Exportar <span class="caret"></span>
                </button>
                <ul class="dropdown-menu">
                    <li>
                        <button class="btn btn-default btn-block" type="submit" name="submit" value="pdf">Para PDF
                        </button>
                    </li>
                    <li>
                        <button class="btn btn-default btn-block" type="submit" name="submit" value="excel">Para Excel
                        </button>
                    </li>
                </ul>
            </div>
        </div>
    </form>
</div>
<div class="row">
    <div class="col-sm-12">
        <hr>
    </div>
</div>
{include file=$smarty.current_dir|cat:"/viewPendencies.tpl"}
<div class="row">
    <div class="col-sm-12 table-responsive">
        <table class="table table-bordered table-hover datatable">
            <thead>
            <tr>
                <th>Id</th>
                <th>Nome</th>
                <th>Email</th>
                <th>Telefone</th>
                <th>Site</th>
                <th>CPF/CNPJ</th>
                <th>Valor Suporte</th>
                <th>Desde</th>
                <th>Pendências</th>
            </tr>
            </thead>
            <tbody>
            {foreach $clients as $client}
                {assign var="finance" value=$finances[$client->get('id')]}
                <tr>
                    <td>{$client->get('id')}</td>
                    <td>
                        <a href="client/view/{$client->get('id')}">
                            {$client->get('name')}
                        </a>
                    </td>
                    <td>{$client->get('email1')}</td>
                    <td>{$client->get('phone1')}</td>
                    <td>{$client->get('site')}</td>
                    <td>{$client->get('cpf_cnpj')}</td>
                    <td>R${$finance->get('monthly_value', true)}</td>
                    <td>{$client->get('since', true)}</td>
                    <td align="center">
                        {if $finance->get('status')}
                            <i class="fa fa-circle" style="color: #7AFF88"></i>
                        {else}
                            <a style="cursor: pointer">
                                <i client="{$client->get('id')}" class="pendencies-modal fa fa-circle"
                                   style="color: #FF6671!important"></i>
                            </a>
                        {/if}
                    </td>
                </tr>
            {/foreach}
            </tbody>
        </table>
    </div>
</div>
