<?php
/* Smarty version 3.1.28, created on 2016-07-08 15:46:08
  from "C:\xampp\htdocs\serra\financeiro\app\viewer\ExitType\add.tpl" */

if ($_smarty_tpl->smarty->ext->_validateCompiled->decodeProperties($_smarty_tpl, array (
  'has_nocache_code' => false,
  'version' => '3.1.28',
  'unifunc' => 'content_577ff4f01e76b5_57558673',
  'file_dependency' => 
  array (
    '86bfc112be4d01c4570d4aeca1ec0e2b731508fe' => 
    array (
      0 => 'C:\\xampp\\htdocs\\serra\\financeiro\\app\\viewer\\ExitType\\add.tpl',
      1 => 1467043869,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_577ff4f01e76b5_57558673 ($_smarty_tpl) {
?>
<form action="exitType/add" method="post">
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
