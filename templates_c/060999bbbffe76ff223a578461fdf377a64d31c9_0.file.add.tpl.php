<?php
/* Smarty version 3.1.28, created on 2016-06-14 15:18:16
  from "C:\wamp\www\financeiro3\app\viewer\EntryType\add.tpl" */

if ($_smarty_tpl->smarty->ext->_validateCompiled->decodeProperties($_smarty_tpl, array (
  'has_nocache_code' => false,
  'version' => '3.1.28',
  'unifunc' => 'content_576004181c5e25_61000293',
  'file_dependency' => 
  array (
    '060999bbbffe76ff223a578461fdf377a64d31c9' => 
    array (
      0 => 'C:\\wamp\\www\\financeiro3\\app\\viewer\\EntryType\\add.tpl',
      1 => 1465910232,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_576004181c5e25_61000293 ($_smarty_tpl) {
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
