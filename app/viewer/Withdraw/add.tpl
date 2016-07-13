<form action="withdraw/add" method="post">
    <div class="row">
        <div class="col-sm-3 form-group">
            <label for="date" class="control-label">Data</label>
            <input required type="text" class="form-control mask-date" name="date">
        </div>

        <div class="col-sm-3 form-group">
            <label for="id_type" class="control-label">Tipo</label>
            <select id="type" required name="id_type" class="form-control ">
                {foreach $types as $type}
                    {if $type->get('need_partner')}
                        {assign var="partner" value="1"}
                    {else}
                        {assign var="partner" value="0"}
                    {/if}
                    <option partner="{$partner}" value="{$type->get('id')}">{$type->get('name')}</option>
                {/foreach}
            </select>
        </div>

        <div class="col-sm-3 form-group">
            <label for="id_investor" class="control-label">Investidor</label>
            <select required name="id_investor" class="form-control">
                {foreach $investors as $investor}
                    <option value="{$investor->get('id')}">{$investor->get('name')}</option>
                {/foreach}
            </select>
        </div>

        <div class="col-sm-3 form-group">
            <label for="value" class="control-label">Valor</label>
            <input required class="form-control mask-money" name="value" type="text">
        </div>
    </div>

    <div class="row" id="partner">
        <div class="col-sm-12 form-group">
            <label for="id_partner" class="control-label">Sócio</label>
            <select name="id_partner"  id="select-partners" class="form-control">
                {foreach $partners as $partner}
                    <option value="{$partner->get('id')}">{$partner->get('name')}</option>
                {/foreach}
            </select>
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
            <label for="destionation" class="control-label">Esta saída será retirada do caixa</label>
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