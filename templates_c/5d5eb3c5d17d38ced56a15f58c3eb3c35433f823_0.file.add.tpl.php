<?php
/* Smarty version 3.1.28, created on 2016-06-14 14:19:56
  from "C:\wamp\www\financeiro3\app\viewer\Investor\add.tpl" */

if ($_smarty_tpl->smarty->ext->_validateCompiled->decodeProperties($_smarty_tpl, array (
  'has_nocache_code' => false,
  'version' => '3.1.28',
  'unifunc' => 'content_575ff66c427af0_71865832',
  'file_dependency' => 
  array (
    '5d5eb3c5d17d38ced56a15f58c3eb3c35433f823' => 
    array (
      0 => 'C:\\wamp\\www\\financeiro3\\app\\viewer\\Investor\\add.tpl',
      1 => 1465906768,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_575ff66c427af0_71865832 ($_smarty_tpl) {
?>
<form action="investor/add" method="post">
    <div class="row">
        <div class="col-sm-6 form-group">
            <label class="control-label">Nome</label>
            <input type="text" class="form-control" required name="name">
        </div>
        <div class="col-sm-6 form-group">
            <label class="control-label">Capital inicial</label>
            <input type="text" class="form-control mask-money" required name="initial_capital">
        </div>
    </div>
    <div class="row">
        <div class="col-sm-12 form-group checkbox">
            <label class="control-label">
                <input type="checkbox" name="is_partner">
                Este investidor também é um sócio
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
