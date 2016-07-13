<?php
/* Smarty version 3.1.28, created on 2016-07-08 15:49:22
  from "C:\xampp\htdocs\serra\financeiro\app\viewer\EntryType\add.tpl" */

if ($_smarty_tpl->smarty->ext->_validateCompiled->decodeProperties($_smarty_tpl, array (
  'has_nocache_code' => false,
  'version' => '3.1.28',
  'unifunc' => 'content_577ff5b22dde75_58243169',
  'file_dependency' => 
  array (
    '8ce193f41ab1b3610e9bbe848f40c0aae5d8a96a' => 
    array (
      0 => 'C:\\xampp\\htdocs\\serra\\financeiro\\app\\viewer\\EntryType\\add.tpl',
      1 => 1467043869,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_577ff5b22dde75_58243169 ($_smarty_tpl) {
?>
<form action="entryType/add" method="post">
    <div class="row">
        <div class="col-sm-12 form-group">
            <label class="control-label">Nome</label>
            <input type="text" class="form-control" required name="name">
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
