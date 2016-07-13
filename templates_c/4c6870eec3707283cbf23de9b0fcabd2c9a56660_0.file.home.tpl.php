<?php
/* Smarty version 3.1.28, created on 2016-07-13 10:53:56
  from "C:\wamp\www\financeiro3\app\viewer\User\home.tpl" */

if ($_smarty_tpl->smarty->ext->_validateCompiled->decodeProperties($_smarty_tpl, array (
  'has_nocache_code' => false,
  'version' => '3.1.28',
  'unifunc' => 'content_578647f4637973_53667769',
  'file_dependency' => 
  array (
    '4c6870eec3707283cbf23de9b0fcabd2c9a56660' => 
    array (
      0 => 'C:\\wamp\\www\\financeiro3\\app\\viewer\\User\\home.tpl',
      1 => 1468310114,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_578647f4637973_53667769 ($_smarty_tpl) {
?>

<!-- Bills to pay !-->
<div class="showback">
    <div class="row">
        <div class="col-sm-12">
            <h4>Contas a pagar</h4>
        </div>
        <div class="col-md-12 table-responsive">
            <table class="table table-bordered table-hover datatable">
                <thead>
                <tr>
                    <th>Conta</th>
                    <th>Dia de vencimento</th>
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
                            <a href="bill/pay/<?php echo $_smarty_tpl->tpl_vars['bill']->value->get('id');?>
">
                                <button class="btn btn-success" title="Pagar">
                                    <i class="fa fa-dollar"></i>
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
</div><?php }
}
