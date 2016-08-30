<?php
/* Smarty version 3.1.28, created on 2016-07-27 16:01:38
  from "C:\wamp\www\financeiro3\app\viewer\User\add.tpl" */

if ($_smarty_tpl->smarty->ext->_validateCompiled->decodeProperties($_smarty_tpl, array (
  'has_nocache_code' => false,
  'version' => '3.1.28',
  'unifunc' => 'content_5799051217eb65_92117362',
  'file_dependency' => 
  array (
    '39c2b32b6566e0daded5a22af9dc52d0111f8e4d' => 
    array (
      0 => 'C:\\wamp\\www\\financeiro3\\app\\viewer\\User\\add.tpl',
      1 => 1469645837,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_5799051217eb65_92117362 ($_smarty_tpl) {
?>
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
    <?php echo $_smarty_tpl->tpl_vars['form']->value;?>

    <div class="row">
        <div class="col-sm-offset-4 col-sm-4">
            <button class="btn btn-lg btn-success btn-block">
                Cadastrar
            </button>
        </div>
    </div>
</form><?php }
}
