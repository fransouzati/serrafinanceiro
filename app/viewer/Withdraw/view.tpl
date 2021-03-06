<div class="row">
    <div class="col-sm-12">
        <div class="col-md-12" style="margin-bottom: 20px;">
            <a href="withdraw/add">
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
    <form action="withdraw/view" method="post" class="ignore-wait">

        <div class="col-sm-3 form-group">
            <label for="_filter_period" class="control-label">Período</label>
            <input type="text" value="{$_filter_period}" name="_filter_period" class="form-control mask-dateinterval">
        </div>
        <div class="col-sm-3 form-group">
            <label for="_filter_type" class="control-label">Tipo de saída</label>
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
        <div class="col-sm-3 form-group">
            <label for="_filter_partner" class="control-label">Sócio</label>
            <select name="_filter_partner" class="form-control ">
                {if $_filter_partner == 'clear'}
                    {assign var="selected" value="selected"}
                {else}
                    {assign var="selected" value=""}
                {/if}
                <option {$selected} value="clear">Indiferente</option>
                {foreach $partners as $partner}
                    {if $partner->get('id') == $_filter_partner}
                        {assign var="selected" value="selected"}
                    {else}
                        {assign var="selected" value=""}
                    {/if}
                    <option {$selected} value="{$partner->get('id')}">{$partner->get('name')}</option>
                {/foreach}
            </select>
        </div>
        <div class="col-sm-3 form-group">
            <label for="_filter_investor" class="control-label">Investidor</label>
            <select name="_filter_investor" class="form-control ">
                {if $_filter_investor == 'clear'}
                    {assign var="selected" value="selected"}
                {else}
                    {assign var="selected" value=""}
                {/if}
                <option {$selected} value="clear">Indiferente</option>
                {foreach $investors as $investor}
                    {if $investor->get('id') == $_filter_investor}
                        {assign var="selected" value="selected"}
                    {else}
                        {assign var="selected" value=""}
                    {/if}
                    <option {$selected} value="{$investor->get('id')}">{$investor->get('name')}</option>
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
                    <th>Sócio</th>
                    <th>Investidor</th>
                    <th>Descrição</th>
                    <th>Valor</th>
                </tr>
            </thead>
            <tbody>
                {foreach $withdraws as $withdraw}
                    <tr>
                        {if $withdraw->get('id_partner') == NULL}
                            {assign var="partner" value="-"}
                        {else}
                            {assign var="partner" value=$withdraw->get('id_partner', true)->get('name')}
                        {/if}
                        <td>{$withdraw->get('id')}</td>
                        <td>{$withdraw->get('date', true)}</td>
                        <td>{$withdraw->get('id_type', true)->get('name')}</td>
                        <td>{$partner}</td>
                        <td>{$withdraw->get('id_investor', true)->get('name')}</td>
                        <td>{$withdraw->get('description')}</td>
                        <td>R${$withdraw->get('value', true)}</td>
                    </tr>
                {/foreach}
            </tbody>
        </table>
    </div>
</div>
