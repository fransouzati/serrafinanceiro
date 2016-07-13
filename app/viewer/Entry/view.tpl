<div class="row">
    <div class="col-sm-12">
        <div class="col-md-12" style="margin-bottom: 20px;">
            <a href="entry/add">
                <button class="btn btn-primary pull-right">
                    Cadastrar
                </button>
            </a>
        </div>
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
    <form action="entry/view" method="post" class="ignore-wait">

        <div class="col-sm-4 form-group">
            <label for="_filter_period" class="control-label">Período</label>
            <input type="text" value="{$_filter_period}" name="_filter_period" class="form-control mask-dateinterval">
        </div>
        <div class="col-sm-4 form-group">
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
        <div class="col-sm-4 form-group">
            <label for="_filter_type" class="control-label">Tipo de entrada</label>
            <select name="_filter_type" class="form-control ">
                {if $_filter_type == 'clear'}
                    {assign var="selected" value="selected"}
                {else}
                    {assign var="selected" value=""}
                {/if}
                <option {$selected} value="clear">Indiferente</option>
                {foreach $types as $type}
                    {if $type->get('id') == $_filter_type}
                        {assign var="selected" value="selected"}
                    {else}
                        {assign var="selected" value=""}
                    {/if}
                    <option {$selected} value="{$type->get('id')}">{$type->get('name')}</option>
                {/foreach}
            </select>
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
<div class="row">
    <div class="col-md-12 table-responsive">
        <table class="table table-bordered table-hover datatable">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Data</th>
                    <th>Tipo</th>
                    <th>Cliente</th>
                    <th>Descrição</th>
                    <th>Valor</th>
                </tr>
            </thead>
            <tbody>
                {foreach $entries as $entry}
                    <tr>
                        {if $entry->get('id_client') == NULL}
                            {assign var="client" value="-"}
                        {else}
                            {assign var="client" value=$entry->get('id_client', true)->get('name')}
                        {/if}
                        <td>{$entry->get('id')}</td>
                        <td>{$entry->get('date', true)}</td>
                        <td>{$entry->get('id_type', true)->get('name')}</td>
                        <td>{$client}</td>
                        <td>{$entry->get('description')}</td>
                        <td>R${$entry->get('value', true)}</td>
                    </tr>
                {/foreach}
            </tbody>
        </table>
    </div>
</div>
