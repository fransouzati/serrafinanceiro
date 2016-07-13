<?php
/* Smarty version 3.1.28, created on 2016-07-12 05:10:41
  from "/home/serra601/public_html/financeiro/app/viewer/User/view.tpl" */

if ($_smarty_tpl->smarty->ext->_validateCompiled->decodeProperties($_smarty_tpl, array (
  'has_nocache_code' => false,
  'version' => '3.1.28',
  'unifunc' => 'content_5784a601bafbc9_41145183',
  'file_dependency' => 
  array (
    '1b2718194479e1c2bf40f9769db7e5afa55cede5' => 
    array (
      0 => '/home/serra601/public_html/financeiro/app/viewer/User/view.tpl',
      1 => 1468310114,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_5784a601bafbc9_41145183 ($_smarty_tpl) {
?>
		<div class="row">
	        <div class="col-sm-12">
				<div class="col-md-12" style="margin-bottom: 20px;">
					<a href="user/add">
						<button class="btn btn-primary pull-right">
							Cadastrar
						</button>
					</a>
				</div>
				<hr>
				<div class="col-md-12 table-responsive">
					<table class="table table-bordered table-hover datatable">
						<thead>
							<tr>
								<th>Nome</th>
								<th>Email</th>
								<th>Ações</th>
							</tr>
						</thead>
						<tbody>
							<?php
$_from = $_smarty_tpl->tpl_vars['users']->value;
if (!is_array($_from) && !is_object($_from)) {
settype($_from, 'array');
}
$__foreach_user_0_saved_item = isset($_smarty_tpl->tpl_vars['user']) ? $_smarty_tpl->tpl_vars['user'] : false;
$_smarty_tpl->tpl_vars['user'] = new Smarty_Variable();
$__foreach_user_0_total = $_smarty_tpl->smarty->ext->_foreach->count($_from);
if ($__foreach_user_0_total) {
foreach ($_from as $_smarty_tpl->tpl_vars['user']->value) {
$__foreach_user_0_saved_local_item = $_smarty_tpl->tpl_vars['user'];
?>
								<tr>
									<td><?php echo $_smarty_tpl->tpl_vars['user']->value->get('name');?>
</td>
									<td><?php echo $_smarty_tpl->tpl_vars['user']->value->get('email');?>
</td>
									<td>
										<a href="user/view/<?php echo $_smarty_tpl->tpl_vars['user']->value->get('id');?>
">
											<button class="btn btn-primary">
												Visualizar
											</button>
										</a>
										<?php if ($_smarty_tpl->tpl_vars['user']->value->get('id') == $_smarty_tpl->tpl_vars['actualUser']->value->get('id')) {?>
											<a href="user/edit/<?php echo $_smarty_tpl->tpl_vars['user']->value->get('id');?>
">
												<button class="btn btn-primary">
													Editar
												</button>
											</a>
                                        <?php }?>
									</td>
								</tr>
							<?php
$_smarty_tpl->tpl_vars['user'] = $__foreach_user_0_saved_local_item;
}
}
if ($__foreach_user_0_saved_item) {
$_smarty_tpl->tpl_vars['user'] = $__foreach_user_0_saved_item;
}
?>
						</tbody>
					</table>
				</div>
	        </div>
		</div>
<?php }
}
