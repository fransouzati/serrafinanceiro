<?php
/* Smarty version 3.1.28, created on 2016-07-12 05:10:57
  from "/home/serra601/public_html/financeiro/app/viewer/User/view_one.tpl" */

if ($_smarty_tpl->smarty->ext->_validateCompiled->decodeProperties($_smarty_tpl, array (
  'has_nocache_code' => false,
  'version' => '3.1.28',
  'unifunc' => 'content_5784a611b6c4d0_63818160',
  'file_dependency' => 
  array (
    '0347974ea6e9e489ea84acfd537c5aaf3fb6184f' => 
    array (
      0 => '/home/serra601/public_html/financeiro/app/viewer/User/view_one.tpl',
      1 => 1468310114,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_5784a611b6c4d0_63818160 ($_smarty_tpl) {
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
                    <a href="user/edit/<?php echo $_smarty_tpl->tpl_vars['user']->value->get('id');?>
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
