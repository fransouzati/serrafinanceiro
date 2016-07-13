<?php
/* Smarty version 3.1.28, created on 2016-07-11 02:32:09
  from "C:\xampp\htdocs\serra\financeiro\app\viewer\WithdrawType\edit.tpl" */

if ($_smarty_tpl->smarty->ext->_validateCompiled->decodeProperties($_smarty_tpl, array (
  'has_nocache_code' => false,
  'version' => '3.1.28',
  'unifunc' => 'content_57832f59c5b673_23691268',
  'file_dependency' => 
  array (
    '0c512c003457cb04711186bfbdffeb76e69c4333' => 
    array (
      0 => 'C:\\xampp\\htdocs\\serra\\financeiro\\app\\viewer\\WithdrawType\\edit.tpl',
      1 => 1468209231,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_57832f59c5b673_23691268 ($_smarty_tpl) {
?>
<div clas="row">
    <div class="col-sm-12">
        <i class="fa fa-arrow-left"></i>
        <a href="/withdrawType/view/<?php echo $_smarty_tpl->tpl_vars['withdrawType']->value->get('id');?>
">
            Voltar para <?php echo $_smarty_tpl->tpl_vars['withdrawType']->value->get('name');?>

        </a>
        <hr>
    </div>
</div>

<form action="withdrawType/edit/<?php echo $_smarty_tpl->tpl_vars['withdrawType']->value->get('id');?>
" method="post">
    <div class="row">
        <div class="col-sm-12 form-group">
            <label class="control-label">Nome</label>
            <input type="text" class="form-control" name="name" value="<?php echo $_smarty_tpl->tpl_vars['withdrawType']->value->get('name');?>
">
        </div>
    </div>
    <div class="row">
        <div class="col-sm-12 form-group checkbox">
            <label class="checkbox">
                <input type="checkbox"  name="need_partner" <?php if ($_smarty_tpl->tpl_vars['withdrawType']->value->get('need_partner')) {?>checked<?php }?>>
                Relacionar saídas com sócios
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
