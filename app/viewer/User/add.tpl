<form action="user/add" method="post">
    <div class="row">
        <div class="col-sm-6 form-group">
            <label class="control-label">Nome</label>
            <input type="text" class="form-control" name="name">
        </div>
        <div class="col-sm-6 form-group">
            <label class="control-label">Email</label>
            <input type="email" class="form-control" name="email">
        </div>
    </div>
    <div class="row">
        <div class="col-sm-6 form-group">
            <label class="control-label">Senha</label>
            <input type="password" class="form-control" name="password">
        </div>
        <div class="col-sm-6 form-group">
            <label class="control-label">Confirmação de senha</label>
            <input type="password" class="form-control" name="passwordConfirm">
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