<?php
/* Smarty version 3.1.28, created on 2016-06-14 15:08:57
  from "C:\wamp\www\financeiro3\app\viewer\ExitType\add.tpl" */

if ($_smarty_tpl->smarty->ext->_validateCompiled->decodeProperties($_smarty_tpl, array (
  'has_nocache_code' => false,
  'version' => '3.1.28',
  'unifunc' => 'content_576001e97457b8_71115993',
  'file_dependency' => 
  array (
    'a94939c2b9dfcbdd2dfcf639622b8dfa5d877c42' => 
    array (
      0 => 'C:\\wamp\\www\\financeiro3\\app\\viewer\\ExitType\\add.tpl',
      1 => 1465909430,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_576001e97457b8_71115993 ($_smarty_tpl) {
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
