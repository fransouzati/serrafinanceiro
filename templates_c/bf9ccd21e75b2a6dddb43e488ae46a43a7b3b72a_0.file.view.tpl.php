<?php
/* Smarty version 3.1.28, created on 2016-07-12 05:04:45
  from "/home/serra601/public_html/financeiro/app/viewer/Report/view.tpl" */

if ($_smarty_tpl->smarty->ext->_validateCompiled->decodeProperties($_smarty_tpl, array (
  'has_nocache_code' => false,
  'version' => '3.1.28',
  'unifunc' => 'content_5784a49d017712_80913665',
  'file_dependency' => 
  array (
    'bf9ccd21e75b2a6dddb43e488ae46a43a7b3b72a' => 
    array (
      0 => '/home/serra601/public_html/financeiro/app/viewer/Report/view.tpl',
      1 => 1468310114,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_5784a49d017712_80913665 ($_smarty_tpl) {
?>
		<div class="row">
	        <div class="col-sm-12">
				<div class="col-md-12" style="margin-bottom: 20px;">
					<a href="report/add">
						<button class="btn btn-primary pull-right">
							Gerar novo relatório
						</button>
					</a>
				</div>
				<hr>
				<div class="col-md-12 table-responsive">
					<table class="table table-bordered table-hover datatable">
						<thead>
							<tr>
								<th>Nome</th>
								<th>Período</th>
                                <th>Ações</th>
							</tr>
						</thead>
						<tbody>
							<?php
$_from = $_smarty_tpl->tpl_vars['reports']->value;
if (!is_array($_from) && !is_object($_from)) {
settype($_from, 'array');
}
$__foreach_report_0_saved_item = isset($_smarty_tpl->tpl_vars['report']) ? $_smarty_tpl->tpl_vars['report'] : false;
$_smarty_tpl->tpl_vars['report'] = new Smarty_Variable();
$__foreach_report_0_total = $_smarty_tpl->smarty->ext->_foreach->count($_from);
if ($__foreach_report_0_total) {
foreach ($_from as $_smarty_tpl->tpl_vars['report']->value) {
$__foreach_report_0_saved_local_item = $_smarty_tpl->tpl_vars['report'];
?>
								<tr>
									<td><?php echo $_smarty_tpl->tpl_vars['report']->value->get('name');?>
</td>
                                    <td><?php echo $_smarty_tpl->tpl_vars['report']->value->get('period',true);?>
</td>
									<td>
                                        <a href="report/view/<?php echo $_smarty_tpl->tpl_vars['report']->value->get('id');?>
">
                                            <button class="btn btn-primary">
                                                Visualizar
                                            </button>
                                        </a>
                                        <div class="btn-group">
                                            <button type="button" class="btn btn-default dropdown-toggle" data-toggle="dropdown"
                                                    aria-haspopup="true"
                                                    aria-expanded="false">
                                                Exportar <span class="caret"></span>
                                            </button>
                                            <ul class="dropdown-menu">
                                                <li>
                                                    <a target="_blank" href="report/toPdf/<?php echo $_smarty_tpl->tpl_vars['report']->value->get('id');?>
">
                                                        Para PDF
                                                    </a>
                                                </li>
                                                <li>
                                                    <a href="report/toExcel/<?php echo $_smarty_tpl->tpl_vars['report']->value->get('id');?>
">
                                                        Para Excel
                                                    </a>
                                                </li>
                                            </ul>
                                        </div>
									</td>
								</tr>
							<?php
$_smarty_tpl->tpl_vars['report'] = $__foreach_report_0_saved_local_item;
}
}
if ($__foreach_report_0_saved_item) {
$_smarty_tpl->tpl_vars['report'] = $__foreach_report_0_saved_item;
}
?>
						</tbody>
					</table>
				</div>
	        </div>
		</div>
<?php }
}
