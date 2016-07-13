<?php
/* Smarty version 3.1.28, created on 2016-05-17 15:06:54
  from "C:\xampp\htdocs\Clientes\prophet_admin\app\viewer\Clinic\view_one.tpl" */

if ($_smarty_tpl->smarty->ext->_validateCompiled->decodeProperties($_smarty_tpl, array (
  'has_nocache_code' => false,
  'version' => '3.1.28',
  'unifunc' => 'content_573b176ec25d17_66362131',
  'file_dependency' => 
  array (
    '45c2526802a97de2ac1c4f10e1d357f77299815b' => 
    array (
      0 => 'C:\\xampp\\htdocs\\Clientes\\prophet_admin\\app\\viewer\\Clinic\\view_one.tpl',
      1 => 1463490414,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_573b176ec25d17_66362131 ($_smarty_tpl) {
?>
		<?php if ($_smarty_tpl->tpl_vars['clinic']->value->get('indDesativada')) {?>
            <div class="row">
                <div class="alert alert-warning col-sm-12 text-center">
                    <b>Esta clínica está desativada.</b>
                </div>
            </div>
		<?php }?>

        <div class="row">
	        <div class="col-sm-12">
                <?php echo $_smarty_tpl->tpl_vars['form']->value;?>

	        </div>
		</div>

        <div class="row page-header">
            <div class="col-sm-6">
                <h3>
                    Últimos 3 pagamentos
                </h3>
            </div>
            <div class="col-sm-6">
                <a href="/payment/view/<?php echo $_smarty_tpl->tpl_vars['clinic']->value->get('cdnClinica');?>
">
                    <br>
                    <button class="btn btn-default btn-lg pull-right">
                        Ver todos
                    </button>
                </a>
            </div>
        </div>
        <div class="row">
            <div class="col-sm-12 table-responsive">
                <table class="table table-bordered table-hover">
                    <thead>
                    <tr>
                        <th>Valor</th>
                        <th>Data</th>
                        <th>Tipo</th>
                        <th>Ações</th>
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
                            <td>R$<?php echo $_smarty_tpl->tpl_vars['payment']->value->get('value',true);?>
</td>
                            <td><?php echo $_smarty_tpl->tpl_vars['payment']->value->get('date',true);?>
</td>
                            <td><?php echo $_smarty_tpl->tpl_vars['payment']->value->get('type');?>
</td>
                            <td>
                                <a href="/payment/view/<?php echo $_smarty_tpl->tpl_vars['payment']->value->get('id');?>
/0">
                                    <button type="button" class="btn btn-primary">
                                        Visualizar
                                    </button>
                                </a>
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

        <div class="row">
            <div class="col-sm-3">
                <a href="/clinic/edit/<?php echo $_smarty_tpl->tpl_vars['clinic']->value->get('cdnClinica');?>
">
                    <button type="button" class="btn btn-lg btn-block btn-primary">
                        Editar
                    </button>
                </a>
            </div>
            <div class="col-sm-3">
                <a href="/clinic/changeState/<?php echo $_smarty_tpl->tpl_vars['clinic']->value->get('cdnClinica');?>
">
                    <button type="button" class="btn btn-lg btn-block btn-default">
                        <?php if ($_smarty_tpl->tpl_vars['clinic']->value->get('indDesativada')) {?>
                            Ativar clínica
                        <?php } else { ?>
                            Desativar clínica
                        <?php }?>
                    </button>
                </a>
            </div>
            <div class="col-sm-3">
                <a href="/payment/add/<?php echo $_smarty_tpl->tpl_vars['clinic']->value->get('cdnClinica');?>
">
                    <button type="button" class="btn btn-lg btn-block btn-success">
                        Cadastrar pagamento
                    </button>
                </a>
            </div>

        </div>
<?php }
}
