<?php
/* Smarty version 3.1.28, created on 2016-06-14 14:29:28
  from "C:\wamp\www\financeiro3\app\viewer\Investor\edit.tpl" */

if ($_smarty_tpl->smarty->ext->_validateCompiled->decodeProperties($_smarty_tpl, array (
  'has_nocache_code' => false,
  'version' => '3.1.28',
  'unifunc' => 'content_575ff8a8ba94c6_80799154',
  'file_dependency' => 
  array (
    '9a889ff33062a310cb6270bff22fa596f27dfe5f' => 
    array (
      0 => 'C:\\wamp\\www\\financeiro3\\app\\viewer\\Investor\\edit.tpl',
      1 => 1465907367,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_575ff8a8ba94c6_80799154 ($_smarty_tpl) {
?>
<div clas="row">
    <div class="col-sm-12">
        <i class="fa fa-arrow-left"></i>
        <a href="/investor/view/<?php echo $_smarty_tpl->tpl_vars['investor']->value->get('id');?>
">
            Voltar para perfil de <?php echo $_smarty_tpl->tpl_vars['investor']->value->get('name');?>

        </a>
        <hr>
    </div>
</div>

<form action="investor/edit/<?php echo $_smarty_tpl->tpl_vars['investor']->value->get('id');?>
" method="post">
    <div class="row">
        <div class="col-sm-6 form-group">
            <label class="control-label">Nome</label>
            <input type="text" class="form-control" name="name" value="<?php echo $_smarty_tpl->tpl_vars['investor']->value->get('name');?>
">
        </div>
        <div class="col-sm-6 form-group">
            <label class="control-label">Capital inicial</label>
            <input type="text" class="form-control mask-money" name="initial_capital" value="R$<?php echo $_smarty_tpl->tpl_vars['investor']->value->get('initial_capital',true);?>
">
        </div>
    </div>
    <div class="row">
        <div class="col-sm-12 form-group checkbox">
            <label class="checkbox">
                <input type="checkbox"  name="is_partner" <?php if ($_smarty_tpl->tpl_vars['investor']->value->get('is_partner')) {?>checked<?php }?>>
                Este investidor também é um sócio
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
</form>
<?php }
}
