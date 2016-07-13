<div class="row">
    <div class="col-md-12" style="margin-bottom: 20px;">
        <a href="project/add">
            <button class="btn btn-primary pull-right">
                Cadastrar
            </button>
        </a>
    </div>
</div>
<div class="row">
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
    <form action="project/view" method="post" class="ignore-wait">

        <input class="filter-input" filter-type="status" type="hidden" value="{$_filter_status}"
               name="_filter_status">

        <input class="filter-input" filter-type="end" type="hidden" value="{$_filter_end}"
               name="_filter_end">

        <div class="col-sm-3">
            <label for="_filter_name" class="control-label">Nome</label>
            <input type="text" value="{$_filter_name}" name="_filter_name" class="form-control">
        </div>
        <div class="col-sm-3">
            <label for="_filter_client" class="control-label">Cliente</label>
            <select name="_filter_client" class="form-control ">
                <option value="">Nenhum</option>
                {if $_filter_client == 'clear'}
                    {assign var="selected" value="selected"}
                {else}
                    {assign var="selected" value=""}
                {/if}
                <option {$selected} value="clear">Indiferente</option>
                {foreach $clients as $client}
                    {if $client->get('id') == $_filter_client}
                        {assign var="selected" value="selected"}
                    {else}
                        {assign var="selected" value=""}
                    {/if}
                    <option {$selected} value="{$client->get('id')}">{$client->get('name')}</option>
                {/foreach}
            </select>
        </div>
        <div class="col-sm-3 form-group">
            <label for="_filter_period" class="control-label">Período</label>
            <input type="text" value="{$_filter_period}" name="_filter_period" class="form-control mask-dateinterval">
        </div>
        <div class="col-sm-3">
            <label for="_filter_executor" class="control-label">Executor</label>
            <input type="text" value="{$_filter_executor}" name="_filter_executor" class="form-control">
        </div>
        <hr>
        <div class="col-sm-12">
            <h4>
                <span class="label label-primary filter" filter-type="status" value="all">Todos</span>
                <span class="label label-default filter" filter-type="status" value="pending">Com pendências</span>
                <span class="label label-default filter" filter-type="status" value="ok">Sem pendências</span>
            </h4>
        </div>
        <div class="col-sm-12">
            <h4>
                <span class="label label-primary filter" filter-type="end" value="all">Todos</span>
                <span class="label label-default filter" filter-type="end" value="finished">Projetos terminados</span>
                <span class="label label-default filter" filter-type="end" value="ongoing">Projetos em andamento</span>
                <span class="label label-default filter" filter-type="end" value="late">Projetos atrasados</span>
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
{include file=$smarty.current_dir|cat:"/viewInstallments.tpl"}
<div class="row">
    <div class="col-md-12 table-responsive">
        <table class="table table-bordered table-hover datatable">
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
                    {assign var="client" value="-"}
                {else}
                    {assign var="client" value=$project->get('id_client', true)->get('name')}
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
                    <td>{$client}</td>
                    <td>R${$project->get('value', true)}</td>
                    <td>{$project->get('initial_date', true)}</td>
                    <td {$style}>{$project->get('end_date', true)}</td>
                    <td>{$project->get('executor')}</td>
                    <td align="center">
                        {if $project->get('status')}
                            <i class="fa fa-circle" style="color: #7AFF88"></i>
                        {else}
                            <a style="cursor: pointer">
                                <i project="{$project->get('id')}" class="installments-modal fa fa-circle"
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