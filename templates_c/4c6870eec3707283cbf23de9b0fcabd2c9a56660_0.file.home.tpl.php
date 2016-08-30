<?php
/* Smarty version 3.1.28, created on 2016-08-30 16:23:22
  from "C:\wamp\www\financeiro3\app\viewer\User\home.tpl" */

if ($_smarty_tpl->smarty->ext->_validateCompiled->decodeProperties($_smarty_tpl, array (
  'has_nocache_code' => false,
  'version' => '3.1.28',
  'unifunc' => 'content_57c5dd2a0d8d04_62820605',
  'file_dependency' => 
  array (
    '4c6870eec3707283cbf23de9b0fcabd2c9a56660' => 
    array (
      0 => 'C:\\wamp\\www\\financeiro3\\app\\viewer\\User\\home.tpl',
      1 => 1472584999,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_57c5dd2a0d8d04_62820605 ($_smarty_tpl) {
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
                    <th>Parcela</th>
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
 - <?php echo $_smarty_tpl->tpl_vars['bill']->value->get('description');?>
</td>
                        <td>-</td>
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
                <?php
$_from = $_smarty_tpl->tpl_vars['bill_installments']->value;
if (!is_array($_from) && !is_object($_from)) {
settype($_from, 'array');
}
$__foreach_installment_1_saved_item = isset($_smarty_tpl->tpl_vars['installment']) ? $_smarty_tpl->tpl_vars['installment'] : false;
$_smarty_tpl->tpl_vars['installment'] = new Smarty_Variable();
$__foreach_installment_1_total = $_smarty_tpl->smarty->ext->_foreach->count($_from);
if ($__foreach_installment_1_total) {
foreach ($_from as $_smarty_tpl->tpl_vars['installment']->value) {
$__foreach_installment_1_saved_local_item = $_smarty_tpl->tpl_vars['installment'];
?>
                    <tr>
                        <td>
                            <?php echo $_smarty_tpl->tpl_vars['installment']->value->get('id_bill',true)->get('id_type',true)->get('name');?>
 -
                            <?php echo $_smarty_tpl->tpl_vars['installment']->value->get('id_bill',true)->get('description');?>

                        </td>
                        <td><?php echo $_smarty_tpl->tpl_vars['installment']->value->get('number');?>
</td>
                        <td><?php echo $_smarty_tpl->tpl_vars['installment']->value->get('expiry',true);?>
</td>
                        <td>R$<?php echo $_smarty_tpl->tpl_vars['installment']->value->get('value',true);?>
</td>
                        <td>
                            <a href="bill/pay/<?php echo $_smarty_tpl->tpl_vars['installment']->value->get('id_bill');?>
/<?php echo $_smarty_tpl->tpl_vars['installment']->value->get('number');?>
">
                                <button class="btn btn-success" title="Pagar">
                                    <i class="fa fa-dollar"></i>
                                </button>
                            </a>
                        </td>
                    </tr>
                <?php
$_smarty_tpl->tpl_vars['installment'] = $__foreach_installment_1_saved_local_item;
}
}
if ($__foreach_installment_1_saved_item) {
$_smarty_tpl->tpl_vars['installment'] = $__foreach_installment_1_saved_item;
}
?>
                </tbody>
            </table>
        </div>
    </div>
</div><?php }
}
