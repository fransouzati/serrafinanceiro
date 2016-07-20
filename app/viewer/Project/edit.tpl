<div clas="row">
    <div class="col-sm-12">
        <i class="fa fa-arrow-left"></i>
        <a href="project/view/{$project->get('id')}">
            Voltar para {$project->get('name')}
        </a>
        <hr>
    </div>
</div>

<form action="project/edit/{$project->get('id')}" method="post">
    <div class="row">
        <div class="col-sm-6 form-group">
            <label class="control-label" for="name">Nome</label>
            <input required type="text" class="form-control" name="name" value="{$project->get('name')}">
        </div>
        <div class="col-sm-6 form-group">
            <label class="control-label" for="id_client">Cliente</label>
            <select name="id_client" class="form-control ">
                <option value="">Nenhum</option>
                {foreach $clients as $client}
                    {if $client->get('id') == $project->get('id_client')}
                        {assign var="selected" value="selected"}
                    {else}
                        {assign var="selected" value=""}
                    {/if}
                    <option {$selected} value="{$client->get('id')}">{$client->get('name')}</option>
                {/foreach}
            </select>
        </div>
    </div>
    <div class="row">
        <div class="col-sm-6 form-group">
            <label class="control-label" for="value">Valor</label>
            <input type="text" class="form-control mask-money" name="value"
                   value="R${$project->get('value', true)}">
        </div>
        <div class="col-sm-6 form-group">
            <label class="control-label" for="executor">Executor</label>
            <input type="text" class="form-control" name="executor" value="{$project->get('executor')}">
        </div>
    </div>
    <div class="row">
        <div class="col-sm-6 form-group">
            <label class="control-label" for="initial_date">Data início</label>
            <input type="text" class="form-control mask-date" name="initial_date"
                   value="{$project->get('initial_date', true)}">
        </div>
        <div class="col-sm-6 form-group">
            <label class="control-label" for="end_date">Data fim</label>
            <input type="text" class="form-control mask-date" name="end_date" value="{$project->get('end_date', true)}">
        </div>
    </div>
    <div class="row">
        <div class="col-sm-12 form-group">
            <label class="control-label" for="observation">Observações</label>
            <textarea name="observation" class="form-control">{$project->get('observation')}</textarea>
        </div>
    </div>
    <div class="row">
        <div class="col-sm-12 form-group">
            <label class="control-label" for="id_entry_type">Tipo de entrada para relatório de título</label>
            <select required name="id_entry_type" class="form-control select2">
                {foreach $entryTypes as $entryType}
                    {if $entryType->get('id') == $project->get('id_entry_type')}
                        {assign var="selected" value="selected"}
                    {else}
                        {assign var="selected" value=""}
                    {/if}
                    <option {$selected} value="{$entryType->get('id')}">{$entryType->get('name')}</option>
                {/foreach}
            </select>
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