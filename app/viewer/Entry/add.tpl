<form action="entry/add" method="post">
    <div class="row">
        <div class="col-sm-3 form-group">
            <label for="date" class="control-label">Data</label>
            <input required type="text" class="form-control mask-date" name="date">
        </div>

        <div class="col-sm-3 form-group">
            <label for="id_type" class="control-label">Tipo</label>
            <select required name="id_type" class="form-control ">
                {foreach $types as $type}
                    <option value="{$type->get('id')}">{$type->get('name')}</option>
                {/foreach}
            </select>
        </div>

        <div class="col-sm-3 form-group">
            <label for="id_client" class="control-label">Cliente</label>
            <select name="id_client" class="form-control ">
                <option value="">Nenhum</option>
                {foreach $clients as $client}
                    <option value="{$client->get('id')}">{$client->get('name')}</option>
                {/foreach}
            </select>
        </div>

        <div class="col-sm-3 form-group">
            <label for="value" class="control-label">Valor</label>
            <input required class="form-control mask-money" name="value" type="text">
        </div>
    </div>

    <div class="row">
        <div class="col-sm-12 form-group">
            <label for="description" class="control-label">Descrição</label>
            <textarea name="description" class="form-control"></textarea>
        </div>
    </div>

    <div class="row">
        <div class="col-sm-12">
            <hr>
        </div>
    </div>

    <div class="row">
        <div class="col-sm-12 form-group">
            <label for="destination" class="control-label">Esta entrada será direcionada para o caixa</label>
            <select required class="form-control" name="destination">
                <option value="bank">Do banco</option>
                <option value="internal">Interno</option>
            </select>
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