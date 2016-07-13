<?php
/* Smarty version 3.1.28, created on 2016-05-10 20:34:44
  from "C:\xampp\htdocs\Clientes\prophet_admin\app\viewer\User\add.tpl" */

if ($_smarty_tpl->smarty->ext->_validateCompiled->decodeProperties($_smarty_tpl, array (
  'has_nocache_code' => false,
  'version' => '3.1.28',
  'unifunc' => 'content_573229c40bcf51_90596889',
  'file_dependency' => 
  array (
    'ba845d7724267434c810b38fd489d9a9588b9928' => 
    array (
      0 => 'C:\\xampp\\htdocs\\Clientes\\prophet_admin\\app\\viewer\\User\\add.tpl',
      1 => 1462905283,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_573229c40bcf51_90596889 ($_smarty_tpl) {
?>

        <div class="col-sm-12">
			<form action="user/add/" method="post">
				<?php echo $_smarty_tpl->tpl_vars['form']->value;?>

				<div class="row">
					<div class="col-sm-offset-4 col-sm-4">
						<button class="btn btn-lg btn-success btn-block">
							Cadastrar
						</button>
					</div>
				</div>
			</form>
        </div>
<?php }
}
