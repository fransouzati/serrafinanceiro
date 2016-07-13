<?php
/* Smarty version 3.1.28, created on 2016-06-14 15:08:54
  from "C:\wamp\www\financeiro3\app\viewer\ExitType\view.tpl" */

if ($_smarty_tpl->smarty->ext->_validateCompiled->decodeProperties($_smarty_tpl, array (
  'has_nocache_code' => false,
  'version' => '3.1.28',
  'unifunc' => 'content_576001e6e4d267_39569108',
  'file_dependency' => 
  array (
    '533d6fcb9601ce0d8a997471f03f217db48d5a57' => 
    array (
      0 => 'C:\\wamp\\www\\financeiro3\\app\\viewer\\ExitType\\view.tpl',
      1 => 1465909727,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_576001e6e4d267_39569108 ($_smarty_tpl) {
?>
		<div class="row">
	        <div class="col-sm-12">
				<div class="col-md-12" style="margin-bottom: 20px;">
					<a href="/exitType/add">
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
$_from = $_smarty_tpl->tpl_vars['exitTypes']->value;
if (!is_array($_from) && !is_object($_from)) {
settype($_from, 'array');
}
$__foreach_exitType_0_saved_item = isset($_smarty_tpl->tpl_vars['exitType']) ? $_smarty_tpl->tpl_vars['exitType'] : false;
$_smarty_tpl->tpl_vars['exitType'] = new Smarty_Variable();
$__foreach_exitType_0_total = $_smarty_tpl->smarty->ext->_foreach->count($_from);
if ($__foreach_exitType_0_total) {
foreach ($_from as $_smarty_tpl->tpl_vars['exitType']->value) {
$__foreach_exitType_0_saved_local_item = $_smarty_tpl->tpl_vars['exitType'];
?>
								<tr>
									<td><?php echo $_smarty_tpl->tpl_vars['exitType']->value->get('name');?>
</td>
                                    <td><?php echo $_smarty_tpl->tpl_vars['exitType']->value->get('need_partner',true);?>
</td>
									<td>
										<a href="/exitType/view/<?php echo $_smarty_tpl->tpl_vars['exitType']->value->get('id');?>
">
											<button class="btn btn-primary">
												Visualizar
											</button>
										</a>
                                        <a href="/exitType/edit/<?php echo $_smarty_tpl->tpl_vars['exitType']->value->get('id');?>
">
                                            <button class="btn btn-primary">
                                                Editar
                                            </button>
                                        </a>
									</td>
								</tr>
							<?php
$_smarty_tpl->tpl_vars['exitType'] = $__foreach_exitType_0_saved_local_item;
}
}
if ($__foreach_exitType_0_saved_item) {
$_smarty_tpl->tpl_vars['exitType'] = $__foreach_exitType_0_saved_item;
}
?>
						</tbody>
					</table>
				</div>
	        </div>
		</div>
<?php }
}
