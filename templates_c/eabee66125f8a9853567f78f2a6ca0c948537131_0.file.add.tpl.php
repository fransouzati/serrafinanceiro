<?php
/* Smarty version 3.1.28, created on 2016-07-12 05:10:51
  from "/home/serra601/public_html/financeiro/app/viewer/User/add.tpl" */

if ($_smarty_tpl->smarty->ext->_validateCompiled->decodeProperties($_smarty_tpl, array (
  'has_nocache_code' => false,
  'version' => '3.1.28',
  'unifunc' => 'content_5784a60b4086b4_88522888',
  'file_dependency' => 
  array (
    'eabee66125f8a9853567f78f2a6ca0c948537131' => 
    array (
      0 => '/home/serra601/public_html/financeiro/app/viewer/User/add.tpl',
      1 => 1467043872,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_5784a60b4086b4_88522888 ($_smarty_tpl) {
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
    <div class="row">
        <div class="col-sm-offset-4 col-sm-4">
            <button class="btn btn-lg btn-success btn-block">
                Cadastrar
            </button>
        </div>
    </div>
</form><?php }
}
