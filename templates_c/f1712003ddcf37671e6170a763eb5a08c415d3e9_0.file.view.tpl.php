<?php
/* Smarty version 3.1.28, created on 2016-07-12 05:04:09
  from "/home/serra601/public_html/financeiro/app/viewer/WithdrawType/view.tpl" */

if ($_smarty_tpl->smarty->ext->_validateCompiled->decodeProperties($_smarty_tpl, array (
  'has_nocache_code' => false,
  'version' => '3.1.28',
  'unifunc' => 'content_5784a479f09824_29878078',
  'file_dependency' => 
  array (
    'f1712003ddcf37671e6170a763eb5a08c415d3e9' => 
    array (
      0 => '/home/serra601/public_html/financeiro/app/viewer/WithdrawType/view.tpl',
      1 => 1468310646,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_5784a479f09824_29878078 ($_smarty_tpl) {
?>
		<div class="row">
	        <div class="col-sm-12">
				<div class="col-md-12" style="margin-bottom: 20px;">
					<a href="withdrawType/add">
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
								<th>Relaciona com sócio</th>
								<th>Ações</th>
							</tr>
						</thead>
						<tbody>
							<?php
$_from = $_smarty_tpl->tpl_vars['withdrawTypes']->value;
if (!is_array($_from) && !is_object($_from)) {
settype($_from, 'array');
}
$__foreach_withdrawType_0_saved_item = isset($_smarty_tpl->tpl_vars['withdrawType']) ? $_smarty_tpl->tpl_vars['withdrawType'] : false;
$_smarty_tpl->tpl_vars['withdrawType'] = new Smarty_Variable();
$__foreach_withdrawType_0_total = $_smarty_tpl->smarty->ext->_foreach->count($_from);
if ($__foreach_withdrawType_0_total) {
foreach ($_from as $_smarty_tpl->tpl_vars['withdrawType']->value) {
$__foreach_withdrawType_0_saved_local_item = $_smarty_tpl->tpl_vars['withdrawType'];
?>
								<tr>
									<td><?php echo $_smarty_tpl->tpl_vars['withdrawType']->value->get('name');?>
</td>
                                    <td><?php echo $_smarty_tpl->tpl_vars['withdrawType']->value->get('need_partner',true);?>
</td>
									<td>
										<a href="withdrawType/view/<?php echo $_smarty_tpl->tpl_vars['withdrawType']->value->get('id');?>
">
											<button class="btn btn-primary">
												Visualizar
											</button>
										</a>
                                        <a href="withdrawType/edit/<?php echo $_smarty_tpl->tpl_vars['withdrawType']->value->get('id');?>
">
                                            <button class="btn btn-primary">
                                                Editar
                                            </button>
                                        </a>
									</td>
								</tr>
							<?php
$_smarty_tpl->tpl_vars['withdrawType'] = $__foreach_withdrawType_0_saved_local_item;
}
}
if ($__foreach_withdrawType_0_saved_item) {
$_smarty_tpl->tpl_vars['withdrawType'] = $__foreach_withdrawType_0_saved_item;
}
?>
						</tbody>
					</table>
				</div>
	        </div>
		</div>
<?php }
}
