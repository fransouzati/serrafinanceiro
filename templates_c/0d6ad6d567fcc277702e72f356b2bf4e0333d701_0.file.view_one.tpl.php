<?php
/* Smarty version 3.1.28, created on 2016-05-10 20:39:45
  from "C:\xampp\htdocs\Clientes\prophet_admin\app\viewer\User\view_one.tpl" */

if ($_smarty_tpl->smarty->ext->_validateCompiled->decodeProperties($_smarty_tpl, array (
  'has_nocache_code' => false,
  'version' => '3.1.28',
  'unifunc' => 'content_57322af1895ba9_16989842',
  'file_dependency' => 
  array (
    '0d6ad6d567fcc277702e72f356b2bf4e0333d701' => 
    array (
      0 => 'C:\\xampp\\htdocs\\Clientes\\prophet_admin\\app\\viewer\\User\\view_one.tpl',
      1 => 1462905584,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_57322af1895ba9_16989842 ($_smarty_tpl) {
?>
		<div class="row">
	        <div class="col-sm-12">
				<?php echo $_smarty_tpl->tpl_vars['form']->value;?>

				<?php if ($_smarty_tpl->tpl_vars['user']->value->get('id') == $_smarty_tpl->tpl_vars['actualUser']->value->get('id')) {?>
					<div class="col-sm-offset-4 col-sm-4">
						<a href="/user/edit/<?php echo $_smarty_tpl->tpl_vars['user']->value->get('id');?>
">
							<button class="btn btn-success btn-block">
								Editar
							</button>
						</a>
					</div>
                <?php }?>
	        </div>
		</div>
<?php }
}
