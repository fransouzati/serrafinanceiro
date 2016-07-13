<?php
/* Smarty version 3.1.28, created on 2016-07-11 01:36:51
  from "C:\xampp\htdocs\serra\financeiro\app\viewer\WithdrawType\add.tpl" */

if ($_smarty_tpl->smarty->ext->_validateCompiled->decodeProperties($_smarty_tpl, array (
  'has_nocache_code' => false,
  'version' => '3.1.28',
  'unifunc' => 'content_57832263b85694_89265199',
  'file_dependency' => 
  array (
    '19085c7bb11bf29eccd4ec8bb77429d43a3a3a12' => 
    array (
      0 => 'C:\\xampp\\htdocs\\serra\\financeiro\\app\\viewer\\WithdrawType\\add.tpl',
      1 => 1468209232,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_57832263b85694_89265199 ($_smarty_tpl) {
?>
<form action="withdrawType/add" method="post">
    <div class="row">
        <div class="col-sm-12 form-group">
            <label class="control-label">Nome</label>
            <input type="text" class="form-control" required name="name">
        </div>
    </div>
    <div class="row">
        <div class="col-sm-12 form-group checkbox">
            <label class="control-label">
                <input type="checkbox" name="need_partner">
                Relacionar saídas com sócios
            </label>

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
