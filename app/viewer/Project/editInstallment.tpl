<div clas="row">
    <div class="col-sm-12">
        <i class="fa fa-arrow-left"></i>
        <a href="project/view/{$installment->get('id_project')}">
            Voltar para projeto
        </a>
        <hr>
    </div>
</div>

<form action="project/editInstallment/{$installment->get('id')}" method="post">
    <div class="row">
        <div class="col-sm-4 form-group">
            <label class="control-label" for="value">Valor</label>
            <input required type="text" class="form-control mask-money" name="value" value="R${$installment->get('value', true)}">
        </div>
        <div class="col-sm-4 form-group">
            <label class="control-label" for="expiry">Validade</label>
            <input required type="text" class="form-control mask-date" name="expiry" value="{$installment->get('expiry', true)}">
        </div>
        <div class="col-sm-4 form-group">
            <label class="control-label" for="number">Número da parcela</label>
            <select required name="number" class="form-control">
                {for $i=1 to $last}
                    {if $i == $installment->get('number')}
                        {assign var="selected" value="selected"}
                    {else}
                        {assign var="selected" value=""}
                    {/if}
                    <option {$selected} value="{$i}">{$i}</option>
                {/for}
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