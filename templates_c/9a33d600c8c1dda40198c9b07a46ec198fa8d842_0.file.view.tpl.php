<?php
/* Smarty version 3.1.28, created on 2016-07-07 14:50:31
  from "C:\xampp\htdocs\serra\financeiro\app\viewer\Investor\view.tpl" */

if ($_smarty_tpl->smarty->ext->_validateCompiled->decodeProperties($_smarty_tpl, array (
  'has_nocache_code' => false,
  'version' => '3.1.28',
  'unifunc' => 'content_577e966795b3b8_90236939',
  'file_dependency' => 
  array (
    '9a33d600c8c1dda40198c9b07a46ec198fa8d842' => 
    array (
      0 => 'C:\\xampp\\htdocs\\serra\\financeiro\\app\\viewer\\Investor\\view.tpl',
      1 => 1467043871,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_577e966795b3b8_90236939 ($_smarty_tpl) {
?>
		<div class="row">
	        <div class="col-sm-12">
				<div class="col-md-12" style="margin-bottom: 20px;">
					<a href="/investor/add">
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
								<th>Capital inicial</th>
								<th>Sócio</th>
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
                                    <td><?php echo $_smarty_tpl->tpl_vars['investor']->value->get('is_partner',true);?>
</td>
									<td>
										<a href="/investor/view/<?php echo $_smarty_tpl->tpl_vars['investor']->value->get('id');?>
">
											<button class="btn btn-primary">
												Visualizar
											</button>
										</a>
                                        <a href="/investor/edit/<?php echo $_smarty_tpl->tpl_vars['investor']->value->get('id');?>
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
