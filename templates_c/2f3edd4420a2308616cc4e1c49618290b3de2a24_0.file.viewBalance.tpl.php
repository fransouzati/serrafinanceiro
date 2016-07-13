<?php
/* Smarty version 3.1.28, created on 2016-07-11 03:15:28
  from "C:\xampp\htdocs\serra\financeiro\app\viewer\User\viewBalance.tpl" */

if ($_smarty_tpl->smarty->ext->_validateCompiled->decodeProperties($_smarty_tpl, array (
  'has_nocache_code' => false,
  'version' => '3.1.28',
  'unifunc' => 'content_57833980d9e4a4_02881082',
  'file_dependency' => 
  array (
    '2f3edd4420a2308616cc4e1c49618290b3de2a24' => 
    array (
      0 => 'C:\\xampp\\htdocs\\serra\\financeiro\\app\\viewer\\User\\viewBalance.tpl',
      1 => 1468217602,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_57833980d9e4a4_02881082 ($_smarty_tpl) {
?>
		<div class="row">
	        <div class="col-sm-12">
				<div class="col-md-12 table-responsive">
					<table class="table table-bordered table-hover datatable">
						<thead>
							<tr>
								<th>Caixa</th>
								<th>Saldo</th>
								<th>Ações</th>
							</tr>
						</thead>
						<tbody>
							<?php
$_from = $_smarty_tpl->tpl_vars['investors']->value;
if (!is_array($_from) && !is_object($_from)) {
settype($_from, 'array');
}
$__foreach_investor_0_saved_item = isset($_smarty_tpl->tpl_vars['investor']) ? $_smarty_tpl->tpl_vars['investor'] : false;
$_smarty_tpl->tpl_vars['investor'] = new Smarty_Variable();
$__foreach_investor_0_total = $_smarty_tpl->smarty->ext->_foreach->count($_from);
if ($__foreach_investor_0_total) {
foreach ($_from as $_smarty_tpl->tpl_vars['investor']->value) {
$__foreach_investor_0_saved_local_item = $_smarty_tpl->tpl_vars['investor'];
?>
								<tr>
									<td><?php echo $_smarty_tpl->tpl_vars['investor']->value->get('name');?>
</td>
									<td>R$<?php echo $_smarty_tpl->tpl_vars['investor']->value->get('initial_capital',true);?>
</td>
									<td>
                                        <a href="/user/editBalance/<?php echo $_smarty_tpl->tpl_vars['investor']->value->get('id');?>
">
                                            <button class="btn btn-primary">
                                                Editar
                                            </button>
                                        </a>
									</td>
								</tr>
							<?php
$_smarty_tpl->tpl_vars['investor'] = $__foreach_investor_0_saved_local_item;
}
}
if ($__foreach_investor_0_saved_item) {
$_smarty_tpl->tpl_vars['investor'] = $__foreach_investor_0_saved_item;
}
?>
						</tbody>
					</table>
				</div>
	        </div>
		</div>
<?php }
}
