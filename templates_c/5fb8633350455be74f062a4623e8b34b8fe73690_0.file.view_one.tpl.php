<?php
/* Smarty version 3.1.28, created on 2016-07-07 17:17:35
  from "C:\xampp\htdocs\serra\financeiro\app\viewer\EntryType\view_one.tpl" */

if ($_smarty_tpl->smarty->ext->_validateCompiled->decodeProperties($_smarty_tpl, array (
  'has_nocache_code' => false,
  'version' => '3.1.28',
  'unifunc' => 'content_577eb8df89e903_61907258',
  'file_dependency' => 
  array (
    '5fb8633350455be74f062a4623e8b34b8fe73690' => 
    array (
      0 => 'C:\\xampp\\htdocs\\serra\\financeiro\\app\\viewer\\EntryType\\view_one.tpl',
      1 => 1467043869,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_577eb8df89e903_61907258 ($_smarty_tpl) {
?>
<div class="row">
    <div class="col-sm-12 form-group">
        <label class="control-label">Nome</label>
        <input disabled type="text" class="form-control" name="name" value="<?php echo $_smarty_tpl->tpl_vars['entryType']->value->get('name');?>
">
    </div>
</div>
<div class="row">
    <div class="col-sm-offset-4 col-sm-4">
        <a href="/entryType/edit/<?php echo $_smarty_tpl->tpl_vars['entryType']->value->get('id');?>
">
            <button class="btn btn-success btn-lg btn-block">
                Editar
            </button>
        </a>
    </div>
</div>
<?php }
}
