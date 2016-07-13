<?php
/* Smarty version 3.1.28, created on 2016-07-12 05:10:27
  from "/home/serra601/public_html/financeiro/app/viewer/User/editBalance.tpl" */

if ($_smarty_tpl->smarty->ext->_validateCompiled->decodeProperties($_smarty_tpl, array (
  'has_nocache_code' => false,
  'version' => '3.1.28',
  'unifunc' => 'content_5784a5f3cb8501_16701420',
  'file_dependency' => 
  array (
    '96e489c3525605054b76ce79f26fcbcfd9203ab2' => 
    array (
      0 => '/home/serra601/public_html/financeiro/app/viewer/User/editBalance.tpl',
      1 => 1468219276,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_5784a5f3cb8501_16701420 ($_smarty_tpl) {
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
