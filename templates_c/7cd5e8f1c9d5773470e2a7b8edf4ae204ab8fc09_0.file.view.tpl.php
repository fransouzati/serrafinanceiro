<?php
/* Smarty version 3.1.28, created on 2016-06-14 15:17:50
  from "C:\wamp\www\financeiro3\app\viewer\EntryType\view.tpl" */

if ($_smarty_tpl->smarty->ext->_validateCompiled->decodeProperties($_smarty_tpl, array (
  'has_nocache_code' => false,
  'version' => '3.1.28',
  'unifunc' => 'content_576003feed8d14_42409084',
  'file_dependency' => 
  array (
    '7cd5e8f1c9d5773470e2a7b8edf4ae204ab8fc09' => 
    array (
      0 => 'C:\\wamp\\www\\financeiro3\\app\\viewer\\EntryType\\view.tpl',
      1 => 1465910250,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_576003feed8d14_42409084 ($_smarty_tpl) {
?>
		<div class="row">
	        <div class="col-sm-12">
				<div class="col-md-12" style="margin-bottom: 20px;">
					<a href="/entryType/add">
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
										<a href="/entryType/view/<?php echo $_smarty_tpl->tpl_vars['entryType']->value->get('id');?>
">
											<button class="btn btn-primary">
												Visualizar
											</button>
										</a>
                                        <a href="/entryType/edit/<?php echo $_smarty_tpl->tpl_vars['entryType']->value->get('id');?>
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
