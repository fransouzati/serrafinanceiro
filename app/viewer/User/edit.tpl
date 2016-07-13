<div clas="row">
    <div class="col-sm-12">
        <i class="fa fa-arrow-left"></i>
        <a href="user/view/{$user->get('id')}">
            Voltar para perfil de {$user->get('name')}
        </a>
        <hr>
    </div>
</div>

<form action="user/edit/{$user->get('id')}" method="post">
    <div class="row">
        <div class="col-sm-6 form-group">
            <label class="control-label">Nome</label>
            <input type="text" class="form-control" name="name" value="{$user->get('name')}">
        </div>
        <div class="col-sm-6 form-group">
            <label class="control-label">Email</label>
            <input type="email" class="form-control" name="email" value="{$user->get('email')}">
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
