<?php
/* Smarty version 3.1.28, created on 2016-06-14 15:11:14
  from "C:\wamp\www\financeiro3\app\viewer\ExitType\view_one.tpl" */

if ($_smarty_tpl->smarty->ext->_validateCompiled->decodeProperties($_smarty_tpl, array (
  'has_nocache_code' => false,
  'version' => '3.1.28',
  'unifunc' => 'content_57600272af8c14_45614191',
  'file_dependency' => 
  array (
    '26e5d172f7f69f6151d4f09ed5c64ec842a5d64f' => 
    array (
      0 => 'C:\\wamp\\www\\financeiro3\\app\\viewer\\ExitType\\view_one.tpl',
      1 => 1465909708,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_57600272af8c14_45614191 ($_smarty_tpl) {
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
