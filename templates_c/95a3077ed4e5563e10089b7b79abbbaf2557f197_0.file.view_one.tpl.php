<?php
/* Smarty version 3.1.28, created on 2016-06-30 10:49:28
  from "C:\wamp\www\financeiro3\app\viewer\Entry\view_one.tpl" */

if ($_smarty_tpl->smarty->ext->_validateCompiled->decodeProperties($_smarty_tpl, array (
  'has_nocache_code' => false,
  'version' => '3.1.28',
  'unifunc' => 'content_577523687cbd43_39931243',
  'file_dependency' => 
  array (
    '95a3077ed4e5563e10089b7b79abbbaf2557f197' => 
    array (
      0 => 'C:\\wamp\\www\\financeiro3\\app\\viewer\\Entry\\view_one.tpl',
      1 => 1467043869,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_577523687cbd43_39931243 ($_smarty_tpl) {
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
