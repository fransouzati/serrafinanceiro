<?php
/* Smarty version 3.1.28, created on 2016-07-07 12:03:34
  from "C:\xampp\htdocs\serra\financeiro\app\viewer\Project\editInstallment.tpl" */

if ($_smarty_tpl->smarty->ext->_validateCompiled->decodeProperties($_smarty_tpl, array (
  'has_nocache_code' => false,
  'version' => '3.1.28',
  'unifunc' => 'content_577e6f467c6b45_10379140',
  'file_dependency' => 
  array (
    'a6b3e9c2f147b86430d67975c4385525b5e5a336' => 
    array (
      0 => 'C:\\xampp\\htdocs\\serra\\financeiro\\app\\viewer\\Project\\editInstallment.tpl',
      1 => 1467903813,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_577e6f467c6b45_10379140 ($_smarty_tpl) {
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
            <input required type="text" class="form-control mask-date" name="expiry" value="<?php echo $_smarty_tpl->tpl_vars['installment']->value->get('expiry',true);?>
">
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
