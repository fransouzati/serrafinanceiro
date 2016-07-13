<?php
/* Smarty version 3.1.28, created on 2016-07-11 03:41:50
  from "C:\xampp\htdocs\serra\financeiro\app\viewer\User\editBalance.tpl" */

if ($_smarty_tpl->smarty->ext->_validateCompiled->decodeProperties($_smarty_tpl, array (
  'has_nocache_code' => false,
  'version' => '3.1.28',
  'unifunc' => 'content_57833faeb5e074_09029842',
  'file_dependency' => 
  array (
    'ae300bf0ba58658b6e490f4522df05fae9219b13' => 
    array (
      0 => 'C:\\xampp\\htdocs\\serra\\financeiro\\app\\viewer\\User\\editBalance.tpl',
      1 => 1468219276,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_57833faeb5e074_09029842 ($_smarty_tpl) {
?>
<form action="user/editBalance/<?php echo $_smarty_tpl->tpl_vars['investor']->value->get('id');?>
" method="post">
    <div class="row">
        <div class="col-sm-12 form-group">
            <label class="control-label">Saldo</label>
            <input type="text" class="form-control mask-money" name="initial_capital"
                   value="R$<?php echo $_smarty_tpl->tpl_vars['investor']->value->get('initial_capital',true);?>
">
        </div>
        <input type="hidden" name="destination" value="<?php echo $_smarty_tpl->tpl_vars['destination']->value;?>
">
    </div>
    <div class="row">
        <div class="col-sm-offset-4 col-sm-4">
            <button class="btn btn-lg btn-success btn-block">
                Editar
            </button>
        </div>
    </div>
</form>
<?php }
}
