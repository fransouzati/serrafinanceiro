

<!-- Modal -->
<div class="modal fade" id="addSalesmanModal" tabindex="-1" role="dialog" aria-labelledby="addSalesman" aria-hidden="true">
    <div class="modal-dialog">
        <form action="project/addSalesman/{$project->get('id')}" method="post">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                    <h4 class="modal-title">Adicionar vendedor/colaborador</h4>
                </div>
                <div class="modal-body">
                    <div class="row">
                        <div class="col-sm-6 form-group">
                            <label for="id_salesman" class="control-label">Vendedor/Colaborador</label>
                            <select class="form-control" name="id_salesman" id="_select_salesman" style="width:100%">
                                <option></option>
                                {foreach $salesmansModal as $salesman}
                                    <option value="{$salesman->get('id')}">{$salesman->get('name')}</option>
                                {/foreach}
                            </select>
                        </div>
                        <div class="col-sm-6 form-group">
                            <label for="percentage" class="control-label">Porcentagem de comissão</label>
                            <input type="text" class="form-control mask-percentage" name="percentage" id="_percentage_salesman">
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Fechar</button>
                    <button type="submit" class="btn btn-primary">Cadastrar</button>
                </div>
            </div>
        </form>
    </div>
</div>