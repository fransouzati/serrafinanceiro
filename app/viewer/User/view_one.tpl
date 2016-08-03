		<div class="row">
            <div class="col-sm-6 form-group">
                <label class="control-label">Nome</label>
                <input disabled type="text" class="form-control" name="name" value="{$user->get('name')}">
            </div>
            <div class="col-sm-6 form-group">
                <label class="control-label">Email</label>
                <input disabled type="email" class="form-control" name="email" value="{$user->get('email')}">
            </div>
		</div>
        {$form}
        {if ($user->get('id') == $actualUser->get('id')) || $smarty.session.master}
            <div class="row">
                <div class="col-sm-offset-4 col-sm-4">
                    <a href="user/edit/{$user->get('id')}">
                        <button class="btn btn-success btn-block">
                            Editar
                        </button>
                    </a>
                </div>
            </div>
        {/if}
