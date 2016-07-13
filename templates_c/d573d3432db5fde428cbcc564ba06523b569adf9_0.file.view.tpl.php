<?php
/* Smarty version 3.1.28, created on 2016-05-22 20:37:48
  from "C:\xampp\htdocs\Clientes\prophet_admin\app\viewer\Payment\view.tpl" */

if ($_smarty_tpl->smarty->ext->_validateCompiled->decodeProperties($_smarty_tpl, array (
  'has_nocache_code' => false,
  'version' => '3.1.28',
  'unifunc' => 'content_5741fc7c122837_40542798',
  'file_dependency' => 
  array (
    'd573d3432db5fde428cbcc564ba06523b569adf9' => 
    array (
      0 => 'C:\\xampp\\htdocs\\Clientes\\prophet_admin\\app\\viewer\\Payment\\view.tpl',
      1 => 1463574480,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_5741fc7c122837_40542798 ($_smarty_tpl) {
?>
<div class="row">
    <div class="col-md-12 form-group">
        <?php if (isset($_smarty_tpl->tpl_vars['id_clinic']->value)) {?>
            <?php $_smarty_tpl->tpl_vars["url"] = new Smarty_Variable(($_smarty_tpl->tpl_vars['id_clinic']->value).('/1'), null);
$_smarty_tpl->ext->_updateScope->updateScope($_smarty_tpl, "url", 0);?>
        <?php } else { ?>
            <?php $_smarty_tpl->tpl_vars["url"] = new Smarty_Variable('', null);
$_smarty_tpl->ext->_updateScope->updateScope($_smarty_tpl, "url", 0);?>
        <?php }?>
        <form method="post" action="/payment/view/<?php echo $_smarty_tpl->tpl_vars['url']->value;?>
">
            <label for="type" class="control-label"> Tipo de pagamento</label> <br>
            <input type="radio" name="type" value=""> Todos &nbsp;&nbsp;&nbsp;&nbsp;
            <input type="radio" name="type" value="Mensal"> Mensal &nbsp;&nbsp;&nbsp;&nbsp;
            <input type="radio" name="type" value="Trimestral"> Trimestral &nbsp;&nbsp;&nbsp;&nbsp;
            <input type="radio" name="type" value="Anual"> Anual &nbsp;&nbsp;&nbsp;&nbsp;
            <button type="submit" class="btn btn-primary">
                Filtrar
            </button>
        </form>
    </div>
</div>
<div class="row">
    <div class="col-sm-12 table-responsive">
        <table class="table table-bordered table-hover datatable">
            <thead>
                <tr>
                    <th>Clinica</th>
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
                    <td><?php echo $_smarty_tpl->tpl_vars['payment']->value->get('id_clinic',true)->get('nomClinica');?>
</td>
                    <td><?php echo $_smarty_tpl->tpl_vars['payment']->value->get('value',true);?>
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
<?php }
}
