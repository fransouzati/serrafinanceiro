<?php
/* Smarty version 3.1.28, created on 2016-07-12 05:04:31
  from "/home/serra601/public_html/financeiro/app/viewer/WithdrawType/view_one.tpl" */

if ($_smarty_tpl->smarty->ext->_validateCompiled->decodeProperties($_smarty_tpl, array (
  'has_nocache_code' => false,
  'version' => '3.1.28',
  'unifunc' => 'content_5784a48f3a5034_97309164',
  'file_dependency' => 
  array (
    'f681e28f437f8bc2a49d6bf1b5502bbee2494864' => 
    array (
      0 => '/home/serra601/public_html/financeiro/app/viewer/WithdrawType/view_one.tpl',
      1 => 1468310114,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_5784a48f3a5034_97309164 ($_smarty_tpl) {
?>
<div class="row">
    <div class="col-sm-12 form-group">
        <label class="control-label">Nome</label>
        <input disabled type="text" class="form-control" name="name" value="<?php echo $_smarty_tpl->tpl_vars['withdrawType']->value->get('name');?>
">
    </div>
</div>
<div class="row">
    <div class="col-sm-12 form-group checkbox">
        <label class="checkbox">
            Relacionar saídas com sócios -
            <?php echo $_smarty_tpl->tpl_vars['withdrawType']->value->get('need_partner',true);?>

        </label>

    </div>
</div>
<div class="row">
    <div class="col-sm-offset-4 col-sm-4">
        <a href="withdrawType/edit/<?php echo $_smarty_tpl->tpl_vars['withdrawType']->value->get('id');?>
">
            <button class="btn btn-success btn-lg btn-block">
                Editar
            </button>
        </a>
    </div>
</div>
<?php }
}
