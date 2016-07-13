<?php
/* Smarty version 3.1.28, created on 2016-07-12 05:04:41
  from "/home/serra601/public_html/financeiro/app/viewer/Bill/payments.tpl" */

if ($_smarty_tpl->smarty->ext->_validateCompiled->decodeProperties($_smarty_tpl, array (
  'has_nocache_code' => false,
  'version' => '3.1.28',
  'unifunc' => 'content_5784a499625895_74772138',
  'file_dependency' => 
  array (
    'e2a2be2e4a20d4185fd114b5627ce3e77e3f487a' => 
    array (
      0 => '/home/serra601/public_html/financeiro/app/viewer/Bill/payments.tpl',
      1 => 1468225963,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_5784a499625895_74772138 ($_smarty_tpl) {
?>
		<div class="row">
	        <div class="col-sm-12">
				<div class="col-md-12 table-responsive">
					<table class="table table-bordered table-hover datatable">
						<thead>
							<tr>
								<th>Conta</th>
								<th>Data</th>
								<th>Valor</th>
							</tr>
						</thead>
						<tbody>
							<?php
$_from = $_smarty_tpl->tpl_vars['payments']->value;
if (!is_array($_from) && !is_object($_from)) {
settype($_from, 'array');
}
$__foreach_payment_0_saved_item = isset($_smarty_tpl->tpl_vars['payment']) ? $_smarty_tpl->tpl_vars['payment'] : false;
$_smarty_tpl->tpl_vars['payment'] = new Smarty_Variable();
$__foreach_payment_0_total = $_smarty_tpl->smarty->ext->_foreach->count($_from);
if ($__foreach_payment_0_total) {
foreach ($_from as $_smarty_tpl->tpl_vars['payment']->value) {
$__foreach_payment_0_saved_local_item = $_smarty_tpl->tpl_vars['payment'];
?>
								<tr>
									<td><?php echo $_smarty_tpl->tpl_vars['payment']->value->get('id_bill',true)->get('id_type',true)->get('name');?>
</td>
                                    <td><?php echo $_smarty_tpl->tpl_vars['payment']->value->get('date',true);?>
</td>
                                    <td>R$<?php echo $_smarty_tpl->tpl_vars['payment']->value->get('value',true);?>
</td>
								</tr>
							<?php
$_smarty_tpl->tpl_vars['payment'] = $__foreach_payment_0_saved_local_item;
}
}
if ($__foreach_payment_0_saved_item) {
$_smarty_tpl->tpl_vars['payment'] = $__foreach_payment_0_saved_item;
}
?>
						</tbody>
					</table>
				</div>
	        </div>
		</div>
<?php }
}
