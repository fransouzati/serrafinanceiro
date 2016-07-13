<?php
/* Smarty version 3.1.28, created on 2016-07-08 15:46:12
  from "C:\xampp\htdocs\serra\financeiro\app\viewer\ExitType\view_one.tpl" */

if ($_smarty_tpl->smarty->ext->_validateCompiled->decodeProperties($_smarty_tpl, array (
  'has_nocache_code' => false,
  'version' => '3.1.28',
  'unifunc' => 'content_577ff4f474f353_20302314',
  'file_dependency' => 
  array (
    '8d1038648d3c810644098507000f29de623cb9fd' => 
    array (
      0 => 'C:\\xampp\\htdocs\\serra\\financeiro\\app\\viewer\\ExitType\\view_one.tpl',
      1 => 1467043870,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_577ff4f474f353_20302314 ($_smarty_tpl) {
?>
<div class="row">
    <div class="col-sm-12 form-group">
        <label class="control-label">Nome</label>
        <input disabled type="text" class="form-control" name="name" value="<?php echo $_smarty_tpl->tpl_vars['exitType']->value->get('name');?>
">
    </div>
</div>
<div class="row">
    <div class="col-sm-12 form-group checkbox">
        <label class="checkbox">
            Relacionar saídas com sócios -
            <?php echo $_smarty_tpl->tpl_vars['exitType']->value->get('need_partner',true);?>

        </label>

    </div>
</div>
<div class="row">
    <div class="col-sm-offset-4 col-sm-4">
        <a href="/exitType/edit/<?php echo $_smarty_tpl->tpl_vars['exitType']->value->get('id');?>
">
            <button class="btn btn-success btn-lg btn-block">
                Editar
            </button>
        </a>
    </div>
</div>
<?php }
}
