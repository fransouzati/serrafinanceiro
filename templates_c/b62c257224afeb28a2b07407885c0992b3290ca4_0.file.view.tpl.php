<?php
/* Smarty version 3.1.28, created on 2016-07-12 04:59:42
  from "/home/serra601/public_html/financeiro/app/viewer/EntryType/view.tpl" */

if ($_smarty_tpl->smarty->ext->_validateCompiled->decodeProperties($_smarty_tpl, array (
  'has_nocache_code' => false,
  'version' => '3.1.28',
  'unifunc' => 'content_5784a36ed02c91_93536055',
  'file_dependency' => 
  array (
    'b62c257224afeb28a2b07407885c0992b3290ca4' => 
    array (
      0 => '/home/serra601/public_html/financeiro/app/viewer/EntryType/view.tpl',
      1 => 1468310113,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_5784a36ed02c91_93536055 ($_smarty_tpl) {
?>
		<div class="row">
	        <div class="col-sm-12">
				<div class="col-md-12" style="margin-bottom: 20px;">
					<a href="entryType/add">
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
								<th>Ações</th>
							</tr>
						</thead>
						<tbody>
							<?php
$_from = $_smarty_tpl->tpl_vars['entryTypes']->value;
if (!is_array($_from) && !is_object($_from)) {
settype($_from, 'array');
}
$__foreach_entryType_0_saved_item = isset($_smarty_tpl->tpl_vars['entryType']) ? $_smarty_tpl->tpl_vars['entryType'] : false;
$_smarty_tpl->tpl_vars['entryType'] = new Smarty_Variable();
$__foreach_entryType_0_total = $_smarty_tpl->smarty->ext->_foreach->count($_from);
if ($__foreach_entryType_0_total) {
foreach ($_from as $_smarty_tpl->tpl_vars['entryType']->value) {
$__foreach_entryType_0_saved_local_item = $_smarty_tpl->tpl_vars['entryType'];
?>
								<tr>
									<td><?php echo $_smarty_tpl->tpl_vars['entryType']->value->get('name');?>
</td>
									<td>
										<a href="entryType/view/<?php echo $_smarty_tpl->tpl_vars['entryType']->value->get('id');?>
">
											<button class="btn btn-primary">
												Visualizar
											</button>
										</a>
                                        <a href="entryType/edit/<?php echo $_smarty_tpl->tpl_vars['entryType']->value->get('id');?>
">
                                            <button class="btn btn-primary">
                                                Editar
                                            </button>
                                        </a>
									</td>
								</tr>
							<?php
$_smarty_tpl->tpl_vars['entryType'] = $__foreach_entryType_0_saved_local_item;
}
}
if ($__foreach_entryType_0_saved_item) {
$_smarty_tpl->tpl_vars['entryType'] = $__foreach_entryType_0_saved_item;
}
?>
						</tbody>
					</table>
				</div>
	        </div>
		</div>
<?php }
}
