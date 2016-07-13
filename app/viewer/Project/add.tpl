<form action="project/add" method="post">
    <div class="row">
        <div class="col-sm-6 form-group">
            <label class="control-label" for="name">Nome</label>
            <input required type="text" class="form-control" name="name">
        </div>
        <div class="col-sm-6 form-group">
            <label class="control-label" for="id_client">Cliente</label>
            <select class="form-control " name="id_client">
                <option value="" selected>Nenhum</option>
                {foreach $clients as $client}
                    <option value="{$client->get('id')}">{$client->get('name')}</option>
                {/foreach}
            </select>
        </div>
    </div>
    <div class="row">
        <div class="col-sm-6 form-group">
            <label class="control-label" for="value">Valor</label>
            <input type="text" class="form-control mask-money" name="value">
        </div>
        <div class="col-sm-6 form-group">
            <label class="control-label" for="executor">Executor</label>
            <input type="text" class="form-control" name="executor">
        </div>
    </div>
    <div class="row">
        <div class="col-sm-6 form-group">
            <label class="control-label" for="initial_date">Data início</label>
            <input type="text" class="form-control mask-date" name="initial_date" id="initial_date">
        </div>
        <div class="col-sm-6 form-group">
            <label class="control-label" for="end_date">Data fim</label>
            <input type="text" class="form-control mask-date" name="end_date">
        </div>
    </div>
    <div class="row">
        <div class="col-sm-12 form-group">
            <label class="control-label" for="observation">Observações</label>
            <textarea name="observation" class="form-control"></textarea>
        </div>
    </div>


    <!-- Parcelas !-->
    <div class="row">
        <div class="col-sm-12">
            <h3 class="page-header">Parcelamento</h3>
        </div>
    </div>
    <div class="row">
        <div class="col-md-12">
            <button class="btn btn-default" type="button" id="addInstallment">
                <span class="fa fa-plus"></span>
            </button>
            <button class="btn btn-default" type="button" id="removeInstallment">
                <span class="fa fa-minus"></span>
            </button>
            <button class="btn btn-default" type="button" id="calculateDates" title="Calcular datas">
                <span class="fa fa-calculator"></span>
            </button>
        </div>
        <div class="col-md-12">
            <hr>
        </div>
    </div>
    <input type="hidden" name="qttInstallments" id="qttInstallments" value="0">
    <div id="rowInstallments">

    </div>
    <div class="row">
        <div class="col-md-12">
            <hr>
        </div>
    </div>

    <div class="row">
        <div class="col-sm-offset-4 col-sm-4">
            <button class="btn btn-lg btn-success btn-block">
                Cadastrar
            </button>
        </div>
    </div>
</form>