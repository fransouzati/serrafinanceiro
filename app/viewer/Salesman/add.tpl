<form action="salesman/add" method="post">
    <div class="row">
        <div class="col-sm-6 form-group">
            <label class="control-label">Nome</label>
            <input type="text" class="form-control" required name="name">
        </div>
        <div class="col-sm-6 form-group">
            <label class="control-label">Porcentagem de comissão</label>
            <input type="text" class="form-control mask-percentage" required name="percentage">
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