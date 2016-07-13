<?php
/* Smarty version 3.1.28, created on 2016-06-10 16:24:19
  from "C:\wamp\www\financeiro3\app\viewer\User\view_one.tpl" */

if ($_smarty_tpl->smarty->ext->_validateCompiled->decodeProperties($_smarty_tpl, array (
  'has_nocache_code' => false,
  'version' => '3.1.28',
  'unifunc' => 'content_575acd931e7535_54845457',
  'file_dependency' => 
  array (
    'a2f695c9909ed5fa6fc326fe381ed6110d8fc53b' => 
    array (
      0 => 'C:\\wamp\\www\\financeiro3\\app\\viewer\\User\\view_one.tpl',
      1 => 1465568652,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_575acd931e7535_54845457 ($_smarty_tpl) {
?>
		<div class="row">
            <div class="col-sm-6 form-group">
                <label class="control-label">Nome</label>
                <input disabled type="text" class="form-control" name="name" value="<?php echo $_smarty_tpl->tpl_vars['user']->value->get('name');?>
">
            </div>
            <div class="col-sm-6 form-group">
                <label class="control-label">Email</label>
                <input disabled type="email" class="form-control" name="email" value="<?php echo $_smarty_tpl->tpl_vars['user']->value->get('email');?>
">
            </div>
		</div>
        <?php if ($_smarty_tpl->tpl_vars['user']->value->get('id') == $_smarty_tpl->tpl_vars['actualUser']->value->get('id')) {?>
            <div class="row">
                <div class="col-sm-offset-4 col-sm-4">
                    <a href="/user/edit/<?php echo $_smarty_tpl->tpl_vars['user']->value->get('id');?>
">
                        <button class="btn btn-success btn-block">
                            Editar
                        </button>
                    </a>
                </div>
            </div>
        <?php }
}
}
