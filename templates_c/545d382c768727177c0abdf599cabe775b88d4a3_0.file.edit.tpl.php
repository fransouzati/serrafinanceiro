<?php
/* Smarty version 3.1.28, created on 2016-07-08 15:49:12
  from "C:\xampp\htdocs\serra\financeiro\app\viewer\ExitType\edit.tpl" */

if ($_smarty_tpl->smarty->ext->_validateCompiled->decodeProperties($_smarty_tpl, array (
  'has_nocache_code' => false,
  'version' => '3.1.28',
  'unifunc' => 'content_577ff5a81223d3_94785720',
  'file_dependency' => 
  array (
    '545d382c768727177c0abdf599cabe775b88d4a3' => 
    array (
      0 => 'C:\\xampp\\htdocs\\serra\\financeiro\\app\\viewer\\ExitType\\edit.tpl',
      1 => 1467043869,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_577ff5a81223d3_94785720 ($_smarty_tpl) {
?>
<div clas="row">
    <div class="col-sm-12">
        <i class="fa fa-arrow-left"></i>
        <a href="/exitType/view/<?php echo $_smarty_tpl->tpl_vars['exitType']->value->get('id');?>
">
            Voltar para <?php echo $_smarty_tpl->tpl_vars['exitType']->value->get('name');?>

        </a>
        <hr>
    </div>
</div>

<form action="exitType/edit/<?php echo $_smarty_tpl->tpl_vars['exitType']->value->get('id');?>
" method="post">
    <div class="row">
        <div class="col-sm-12 form-group">
            <label class="control-label">Nome</label>
            <input type="text" class="form-control" name="name" value="<?php echo $_smarty_tpl->tpl_vars['exitType']->value->get('name');?>
">
        </div>
    </div>
    <div class="row">
        <div class="col-sm-12 form-group checkbox">
            <label class="checkbox">
                <input type="checkbox"  name="need_partner" <?php if ($_smarty_tpl->tpl_vars['exitType']->value->get('need_partner')) {?>checked<?php }?>>
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
