<?php
/* Smarty version 3.1.28, created on 2016-07-12 08:52:09
  from "/home/serra601/public_html/financeiro/app/viewer/Bill/view.tpl" */

if ($_smarty_tpl->smarty->ext->_validateCompiled->decodeProperties($_smarty_tpl, array (
  'has_nocache_code' => false,
  'version' => '3.1.28',
  'unifunc' => 'content_5784d9e9051414_98834557',
  'file_dependency' => 
  array (
    '9562a85726b553402a751de94da68a22b01d5414' => 
    array (
      0 => '/home/serra601/public_html/financeiro/app/viewer/Bill/view.tpl',
      1 => 1468310113,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_5784d9e9051414_98834557 ($_smarty_tpl) {
?>
		<div class="row">
	        <div class="col-sm-12">
				<div class="col-md-12" style="margin-bottom: 20px;">
					<a href="bill/add">
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
								<th>Tipo</th>
								<th>Dia de pagamento</th>
								<th>Valor (aprox.)</th>
                                <th>Ações</th>
							</tr>
						</thead>
						<tbody>
							<?php
$_from = $_smarty_tpl->tpl_vars['bills']->value;
if (!is_array($_from) && !is_object($_from)) {
settype($_from, 'array');
}
$__foreach_bill_0_saved_item = isset($_smarty_tpl->tpl_vars['bill']) ? $_smarty_tpl->tpl_vars['bill'] : false;
$_smarty_tpl->tpl_vars['bill'] = new Smarty_Variable();
$__foreach_bill_0_total = $_smarty_tpl->smarty->ext->_foreach->count($_from);
if ($__foreach_bill_0_total) {
foreach ($_from as $_smarty_tpl->tpl_vars['bill']->value) {
$__foreach_bill_0_saved_local_item = $_smarty_tpl->tpl_vars['bill'];
?>
								<tr>
									<td><?php echo $_smarty_tpl->tpl_vars['bill']->value->get('id_type',true)->get('name');?>
</td>
                                    <td><?php echo $_smarty_tpl->tpl_vars['bill']->value->get('day');?>
</td>
                                    <td>R$<?php echo $_smarty_tpl->tpl_vars['bill']->value->get('value',true);?>
</td>
									<td>
                                        <a href="bill/edit/<?php echo $_smarty_tpl->tpl_vars['bill']->value->get('id');?>
">
                                            <button class="btn btn-primary">
                                                Editar
                                            </button>
                                        </a>
									</td>
								</tr>
							<?php
$_smarty_tpl->tpl_vars['bill'] = $__foreach_bill_0_saved_local_item;
}
}
if ($__foreach_bill_0_saved_item) {
$_smarty_tpl->tpl_vars['bill'] = $__foreach_bill_0_saved_item;
}
?>
						</tbody>
					</table>
				</div>
	        </div>
		</div>
<?php }
}
