

<!-- Modal -->
<div class="modal fade" id="endModal" tabindex="-1" role="dialog" aria-labelledby="endModal" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                <h4 class="modal-title">Finalizar projeto</h4>
            </div>
            <div class="modal-body">
                <form action="project/end/{$project->get('id')}" method="post">
                    <div class="row">
                        <div class="col-sm-12 form-group">
                            <label class="control-label" for="done_date">Data de término</label>
                            <input type="text" class="form-control mask-date" name="done_date">
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-sm-12">
                            <button type="submit" class="btn btn-success">
                                Finalizar
                            </button>
                        </div>
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Cancelar</button>
            </div>
        </div>
    </div>
</div>