<?php
/* Smarty version 3.1.28, created on 2016-06-30 14:41:49
  from "C:\wamp\www\financeiro3\app\viewer\Project\editInstallment.tpl" */

if ($_smarty_tpl->smarty->ext->_validateCompiled->decodeProperties($_smarty_tpl, array (
  'has_nocache_code' => false,
  'version' => '3.1.28',
  'unifunc' => 'content_577559ddb885a1_39392861',
  'file_dependency' => 
  array (
    'a49c490adc0f453f4a2c74e3c42e4efd28bcdc95' => 
    array (
      0 => 'C:\\wamp\\www\\financeiro3\\app\\viewer\\Project\\editInstallment.tpl',
      1 => 1467290715,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_577559ddb885a1_39392861 ($_smarty_tpl) {
?>
<div clas="row">
    <div class="col-sm-12">
        <i class="fa fa-arrow-left"></i>
        <a href="/project/view/<?php echo $_smarty_tpl->tpl_vars['installment']->value->get('id_project');?>
">
            Voltar para projeto
        </a>
        <hr>
    </div>
</div>

<form action="project/editInstallment/<?php echo $_smarty_tpl->tpl_vars['installment']->value->get('id');?>
" method="post">
    <div class="row">
        <div class="col-sm-6 form-group">
            <label class="control-label" for="value">Valor</label>
            <input required type="text" class="form-control mask-money" name="value" value="R$<?php echo $_smarty_tpl->tpl_vars['installment']->value->get('value',true);?>
">
        </div>
        <div class="col-sm-6 form-group">
            <label class="control-label" for="expiry">Validade</label>
            <input required type="text" class="form-control mask-date" name="expiry" value="<?php echo $_smarty_tpl->tpl_vars['installment']->value->get('expiry');?>
">
        </div>
    </div>
    <div class="row">
            <div class="col-sm-12 form-group">
                <label class="control-label" for="status">Situação</label> <br>
                <?php if ($_smarty_tpl->tpl_vars['installment']->value->get('status')) {?>
                    <?php $_smarty_tpl->tpl_vars["payed"] = new Smarty_Variable("checked", null);
$_smarty_tpl->ext->_updateScope->updateScope($_smarty_tpl, "payed", 0);?>
                    <?php $_smarty_tpl->tpl_vars["npayed"] = new Smarty_Variable('', null);
$_smarty_tpl->ext->_updateScope->updateScope($_smarty_tpl, "npayed", 0);?>
                <?php } else { ?>
                    <?php $_smarty_tpl->tpl_vars["npayed"] = new Smarty_Variable("checked", null);
$_smarty_tpl->ext->_updateScope->updateScope($_smarty_tpl, "npayed", 0);?>
                    <?php $_smarty_tpl->tpl_vars["payed"] = new Smarty_Variable('', null);
$_smarty_tpl->ext->_updateScope->updateScope($_smarty_tpl, "payed", 0);?>
                <?php }?>
                <label class="control-label radio-inline" for="status">
                    <input type="radio" value="1" name="status" <?php echo $_smarty_tpl->tpl_vars['payed']->value;?>
> Pago
                </label>
                <label class="control-label radio-inline" for="status">
                    <input type="radio" value="0" name="status" <?php echo $_smarty_tpl->tpl_vars['npayed']->value;?>
> Pendente
                </label>
            </div>
    </div>
    <div class="row">
        <div class="col-sm-offset-4 col-sm-4">
            <button class="btn btn-lg btn-success btn-block">
                Editar
            </button>
        </div>
    </div>
</form><?php }
}
