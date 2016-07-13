<?php
/* Smarty version 3.1.28, created on 2016-06-14 15:19:31
  from "C:\wamp\www\financeiro3\app\viewer\EntryType\view_one.tpl" */

if ($_smarty_tpl->smarty->ext->_validateCompiled->decodeProperties($_smarty_tpl, array (
  'has_nocache_code' => false,
  'version' => '3.1.28',
  'unifunc' => 'content_57600463cd77b6_77595256',
  'file_dependency' => 
  array (
    '8de047011413fc88830fde0374eaf6bbaafe28e4' => 
    array (
      0 => 'C:\\wamp\\www\\financeiro3\\app\\viewer\\EntryType\\view_one.tpl',
      1 => 1465910264,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_57600463cd77b6_77595256 ($_smarty_tpl) {
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
