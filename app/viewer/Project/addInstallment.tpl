

<!-- Modal -->
<div class="modal fade" id="addInstallmentModal" tabindex="-1" role="dialog" aria-labelledby="addInstallment" aria-hidden="true">
    <div class="modal-dialog">
        <form action="project/addInstallment/{$project->get('id')}" method="post">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                    <h4 class="modal-title">Adicionar parcela</h4>
                </div>
                <div class="modal-body">
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
                        <input type="hidden" name="qttInstallments" id="qttInstallments" min="{$qttInstallments}" value="{$qttInstallments}">
                        <input type="hidden" name="minInstallments" value="{$qttInstallments}">
                        <div id="rowInstallments">

                        </div>
                        <div class="row">
                            <div class="col-md-12">
                                <hr>
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