<?php
/* Smarty version 3.1.28, created on 2016-07-11 05:18:38
  from "C:\xampp\htdocs\serra\financeiro\app\viewer\Bill\pay.tpl" */

if ($_smarty_tpl->smarty->ext->_validateCompiled->decodeProperties($_smarty_tpl, array (
  'has_nocache_code' => false,
  'version' => '3.1.28',
  'unifunc' => 'content_5783565e158409_76512862',
  'file_dependency' => 
  array (
    '4eb22df3d3d1fbcfba31c754cefc7f6d038d0c47' => 
    array (
      0 => 'C:\\xampp\\htdocs\\serra\\financeiro\\app\\viewer\\Bill\\pay.tpl',
      1 => 1468225114,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_5783565e158409_76512862 ($_smarty_tpl) {
?>
<form action="bill/pay/<?php echo $_smarty_tpl->tpl_vars['bill']->value->get('id');?>
" method="post">
    <div class="row">
        <div class="col-sm-6 form-group">
            <label class="control-label" for="value">Valor</label>
            <input type="text" class="form-control mask-money" name="value" value="R$<?php echo $_smarty_tpl->tpl_vars['bill']->value->get('value',true);?>
">
        </div>

        <div class="col-sm-6 form-group">
            <label class="control-label" for="observation">Observação</label>
            <input type="text" class="form-control" name="observation">
        </div>
    </div>

    <div class="row">
        <div class="col-sm-12 form-group">
            <label for="destination" class="control-label">Este pagamento será descontado do caixa</label>
            <select required class="form-control" name="destination">
                <option value="bank">Do banco</option>
                <option value="internal">Interno</option>
            </select>
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
