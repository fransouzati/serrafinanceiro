<form action="report/add" method="post">
    <div class="row">
        <div class="col-sm-4 form-group">
            <label class="control-label">Período do relatório</label>
            <input value="{$period}" type="text" class="form-control mask-dateinterval" name="period" required id="period">
            <label class="control-label checkbox-inline">
                <input type="checkbox" name="all" id="all"> Pegar todos em aberto até hoje
            </label>

        </div>

        <div class="col-sm-4 form-group">
            <label class="control-label">Nome</label>
            <input type="text" class="form-control" name="name" required>
        </div>

        <div class="col-sm-4 form-group">
            <label class="control-label">Cliente</label>
            <select name="clients[]" class="form-control select2" multiple>
                <option value="all" selected>Todos</option>
                {foreach $clients as $client}
                    <option value="{$client->get('id')}">{$client->get('name')}</option>
                {/foreach}
            </select>
        </div>
    </div>

    <div class="row">
        <div class="col-sm-4 form-group">
            <label class="control-label checkbox-inline">
                <input type="checkbox" name="toView"> Relatório apenas para visualização
            </label>
        </div>
        <div class="col-sm-4 form-group">
            <label class="control-label">Títulos a serem exibidos</label>
            <select required name="_report_filter[]" class="form-control select2" multiple>
                <option value="support" selected>Suporte mensal</option>
                <option value="project" selected>Parcelas de projeto</option>
                <option value="extra" selected>Cobranças extra</option>
            </select>
        </div>
    </div>

    <div class="row">
        <div class="col-sm-offset-4 col-sm-4">
            <button class="btn btn-lg btn-success btn-block">
                Gerar
            </button>
        </div>
    </div>
</form>