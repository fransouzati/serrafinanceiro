{if $project->get('done')}
    {assign var="disabled_end" value="disabled"}
    <div class="row">
        <div class="col-sm-12 text-center alert alert-info">
            Projeto finalizado em {$project->get('done_date', true)}!
        </div>
    </div>
{else}
    {assign var="disabled_end" value=""}
{/if}

<div class="row">
    <div class="col-sm-6 form-group">
        <label class="control-label" for="name">Nome</label>
        <input disabled required type="text" class="form-control" name="name" value="{$project->get('name')}">
    </div>
    <div class="col-sm-6 form-group">
        <label class="control-label" for="id_client">Cliente</label>
        {if $project->get('id_client') == NULL}
            {assign var="client" value="-"}
        {else}
            {assign var="client" value=$project->get('id_client', true)->get('name')}
        {/if}
        <input disabled type="text" name="id_client" value="{$client}" class="form-control">
    </div>
</div>
<div class="row">
    <div class="col-sm-6 form-group">
        <label class="control-label" for="value">Valor</label>
        <input disabled type="text" class="form-control mask-money" name="value"
               value="R${$project->get('value', true)}">
    </div>
    <div class="col-sm-6 form-group">
        <label class="control-label" for="executor">Executor</label>
        <input disabled type="text" class="form-control" name="executor" value="{$project->get('executor')}">
    </div>
</div>
<div class="row">
    <div class="col-sm-6 form-group">
        <label class="control-label" for="initial_date">Data início</label>
        <input disabled type="text" class="form-control mask-date" name="initial_date"
               value="{$project->get('initial_date', true)}">
    </div>
    <div class="col-sm-6 form-group">
        <label class="control-label" for="end_date">Data fim</label>
        <input disabled type="text" class="form-control mask-date" name="end_date"
               value="{$project->get('end_date', true)}">
    </div>
</div>
<div class="row">
    <div class="col-sm-12 form-group">
        <label class="control-label" for="observation">Observações</label>
        <textarea disabled name="observation" class="form-control">{$project->get('observation')}</textarea>
    </div>
</div>
<div class="row">
    <div class="col-sm-12 form-group">
        <label class="control-label" for="id_entry_type">Tipo de entrada para relatório de título</label>
        <input disabled type="text" name="id_entry_type" class="form-control"
               value="{$project->get('id_entry_type', true)->get('name')}">
    </div>
</div>

<!-- Parcelas !-->
<div class="row">
    <div class="col-sm-12">
        <h4 class="page-header">Parcelamento</h4>
    </div>
    <div class="col-sm-12">
        <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#addInstallmentModal">
            Adicionar parcela
        </button>
        {include file=$smarty.current_dir|cat:"/addInstallment.tpl"}
        <hr>
    </div>
</div>
{if !empty($installments)}
    {include file=$smarty.current_dir|cat:"/payInstallment.tpl"}
    <div class="row">
        <div class="col-md-12 table-responsive">
            <table class="table table-bordered table-hover datatable">
                <thead>
                <tr>
                    <th>Número</th>
                    <th>Valor</th>
                    <th>Vencimento</th>
                    <th>Situação</th>
                    <th>Ação</th>
                </tr>
                </thead>
                <tbody>
                {foreach $installments as $installment}
                    <tr>
                        <td>{$installment->get('number')}</td>
                        <td>R${$installment->get('value', true)}</td>
                        <td class="expiry-table">{$installment->get('expiry', true)}</td>
                        <td align="center">
                            {if $installment->get('status')}
                                <i class="fa fa-circle" style="color: #7AFF88"></i>
                            {else}
                                <i class="fa fa-circle" style="color: #FF6671!important"></i>
                            {/if}
                        </td>
                        <td align="center">
                            <a href="project/deleteInstallment/{$installment->get('id')}" class="confirm-link">
                                <button title="Deletar" class="btn btn-danger">
                                    <i class="fa fa-remove"></i>
                                </button>
                            </a>

                            <a href="project/editInstallment/{$installment->get('id')}">
                                <button title="Editar" class="btn btn-primary">
                                    <i class="fa fa-edit"></i>
                                </button>
                            </a>

                            {if !$installment->get('status')}
                                <button type="button" class="btn btn-success payment-modal"
                                        data-installment="{$installment->get('id')}">
                                    <i class="fa fa-dollar"></i>
                                </button>
                            {/if}

                        </td>
                    </tr>
                {/foreach}
                </tbody>
            </table>
        </div>
    </div>
{/if}

<div class="row">
    <div class="col-sm-offset-2 col-sm-4">
        <a href="project/edit/{$project->get('id')}">
            <button class="btn btn-success btn-lg btn-block">
                Editar
            </button>
        </a>
    </div>
    <div class="col-sm-4">
        <button {$disabled_end} type="button" class="btn btn-primary btn-lg btn-block" data-toggle="modal"
                                data-target="#endModal">
            Finalizar projeto
        </button>
        {include file=$smarty.current_dir|cat:"/endProject.tpl"}
    </div>
</div>
