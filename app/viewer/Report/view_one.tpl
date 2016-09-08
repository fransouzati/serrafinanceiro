<div class="row">
    <div class="col-md-12">
        <h5>Período: {$period}</h5>
    </div>
</div>
<div class="row">
    <div class="col-sm-2 col-lg-1">
        <div class="btn-group">
            <button type="button" class="btn btn-default dropdown-toggle" data-toggle="dropdown"
                    aria-haspopup="true"
                    aria-expanded="false">
                Exportar <span class="caret"></span>
            </button>
            <ul class="dropdown-menu">
                <li>
                    <a target="_blank" href="report/toPdf/{$report->get('id')}">
                        Para PDF
                    </a>
                </li>
                <li>
                    <a href="report/toExcel/{$report->get('id')}">
                        Para Excel
                    </a>
                </li>
            </ul>
        </div>
    </div>
    <div class="col-sm-10 col-lg-11">
        <div class="form-group">
            <select class="form-control" id="filter">
                <option value="no">Sem filtro</option>
                <option value="0">Sem cliente
                </option>
                {foreach $txt as $client}
                    {if $client['name'] != 'SEM CLIENTE'}
                        <option value="{$client['id']}">{$client['name']}</option>
                    {/if}
                {/foreach}
            </select>
        </div>
    </div>
</div>
<form action="report/pay/{$report->get('id')}" method="post">
    {foreach $txt as $client}
        <div class="showback client" id="{$client['id']}">
            <div class="row">
                <div class="col-sm-12">
                    <h3>{$client['name']}</h3>
                </div>
                <div class="col-sm-6">
                    <h4>CPF/CNPJ: {$client['cnpj']}</h4>
                </div>
                <div class="col-sm-6">
                    <h4>Observações financeiras: {$client['finances']}</h4>
                </div>
            </div>
            <div class="row">
                <div class="col-md-12 table-responsive">
                    <table class="table table-bordered table-hover">
                        <thead>
                        <tr>
                            <th>Tipo</th>
                            <th>Valor</th>
                            <th>Vencimento</th>
                            {if !$report->get('toView')}
                                <th>Pagar</th>
                            {/if}
                        </tr>
                        </thead>
                        <tbody>
                            {foreach $client['pendencies'] as $pendency}
                                {if $pendency['type'] == 'Suporte web'}
                                    {assign var="titleValue" value="support_"|cat:$pendency['id']}
                                {elseif $pendency['type'] == 'Cobrança extra'}
                                    {assign var="titleValue" value="extra_"|cat:$pendency['id']}
                                {elseif $pendency['type'] == 'Parcela de projeto'}
                                    {assign var="titleValue" value="installment_"|cat:$pendency['id']}
                                {/if}
                                <tr>
                                    <td>{$pendency['type']}</td>
                                    <td>{$pendency['value']}</td>
                                    <td>{$pendency['expiry']}</td>
                                    {if !$report->get('toView')}
                                        <td>
                                            {if $pendency['block']}
                                                Título pago
                                            {else}
                                                <label class="checkbox-inline">
                                                    <input type="checkbox" name="pay[]" value="{$titleValue}">
                                                    Pagar título
                                                </label>
                                                <br>
                                                <input type="text" class="mask-money form-control" name="{$titleValue}" value="{$pendency['value']}">
                                                <br>
                                                <label class="radio-inline">
                                                    <input type="radio" name="{$titleValue}_destination" checked value="bank"> Caixa do banco
                                                </label>
                                                <label class="radio-inline">
                                                    <input type="radio" name="{$titleValue}_destination" value="internal"> Caixa interno
                                                </label>
                                            {/if}
                                        </td>
                                    {/if}
                                </tr>
                            {/foreach}
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    {/foreach}
    {if !empty($txt)}
        <div class="row">
            <div class="col-sm-4 col-sm-offset-4">
                <button class="btn btn-primary btn-lg btn-block" type="submit">
                    Pagar títulos marcados
                </button>
            </div>
        </div>
    {/if}
</form>