<?php
/* Smarty version 3.1.28, created on 2016-07-11 01:20:57
  from "C:\xampp\htdocs\serra\financeiro\app\viewer\Investor\add.tpl" */

if ($_smarty_tpl->smarty->ext->_validateCompiled->decodeProperties($_smarty_tpl, array (
  'has_nocache_code' => false,
  'version' => '3.1.28',
  'unifunc' => 'content_57831ea9bf47d5_41632302',
  'file_dependency' => 
  array (
    'c609eea50969f8268916a49a5187c8306d2c7f03' => 
    array (
      0 => 'C:\\xampp\\htdocs\\serra\\financeiro\\app\\viewer\\Investor\\add.tpl',
      1 => 1467043871,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_57831ea9bf47d5_41632302 ($_smarty_tpl) {
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
