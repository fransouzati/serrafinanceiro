<?php
/* Smarty version 3.1.28, created on 2016-05-22 21:26:40
  from "C:\xampp\htdocs\Clientes\prophet_admin\app\viewer\Clinic\advices.tpl" */

if ($_smarty_tpl->smarty->ext->_validateCompiled->decodeProperties($_smarty_tpl, array (
  'has_nocache_code' => false,
  'version' => '3.1.28',
  'unifunc' => 'content_574207f0e508a4_43550159',
  'file_dependency' => 
  array (
    '55b7607a10f0104d775cee7494d849995a790a8e' => 
    array (
      0 => 'C:\\xampp\\htdocs\\Clientes\\prophet_admin\\app\\viewer\\Clinic\\advices.tpl',
      1 => 1463945198,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_574207f0e508a4_43550159 ($_smarty_tpl) {
?>
<div class="row">
    <div class="col-sm-12 page-header">
        <h3>Teste finalizando</h3>
    </div>
    <div class="col-sm-12 table-responsive">
        <table class="table table-bordered table-hover datatable">
            <thead>
            <tr>
                <th>Nome</th>
                <th>Ações</th>
            </tr>
            </thead>
            <tbody>
            <?php
$_from = $_smarty_tpl->tpl_vars['clinics']->value['adviceTest'];
if (!is_array($_from) && !is_object($_from)) {
settype($_from, 'array');
}
$__foreach_clinic_0_saved_item = isset($_smarty_tpl->tpl_vars['clinic']) ? $_smarty_tpl->tpl_vars['clinic'] : false;
$_smarty_tpl->tpl_vars['clinic'] = new Smarty_Variable();
$__foreach_clinic_0_total = $_smarty_tpl->smarty->ext->_foreach->count($_from);
if ($__foreach_clinic_0_total) {
foreach ($_from as $_smarty_tpl->tpl_vars['clinic']->value) {
$__foreach_clinic_0_saved_local_item = $_smarty_tpl->tpl_vars['clinic'];
?>
                <tr>
                    <td><?php echo $_smarty_tpl->tpl_vars['clinic']->value->get('nomClinica');?>
</td>
                    <td>
                        <a href="/clinic/view/<?php echo $_smarty_tpl->tpl_vars['clinic']->value->get('cdnClinica');?>
">
                            <button type="button" class="btn btn-primary">
                                Visualizar
                            </button>
                        </a>
                    </td>
                </tr>
            <?php
$_smarty_tpl->tpl_vars['clinic'] = $__foreach_clinic_0_saved_local_item;
}
}
if ($__foreach_clinic_0_saved_item) {
$_smarty_tpl->tpl_vars['clinic'] = $__foreach_clinic_0_saved_item;
}
?>
            </tbody>
        </table>
    </div>
</div>

<div class="row">
    <div class="col-sm-12 page-header">
        <h3>Necessitam realizar pagamento</h3>
    </div>
    <div class="col-sm-12 table-responsive">
        <table class="table table-bordered table-hover datatable">
            <thead>
            <tr>
                <th>Nome</th>
                <th>Ações</th>
            </tr>
            </thead>
            <tbody>
            <?php
$_from = $_smarty_tpl->tpl_vars['clinics']->value['needsPayment'];
if (!is_array($_from) && !is_object($_from)) {
settype($_from, 'array');
}
$__foreach_clinic_1_saved_item = isset($_smarty_tpl->tpl_vars['clinic']) ? $_smarty_tpl->tpl_vars['clinic'] : false;
$_smarty_tpl->tpl_vars['clinic'] = new Smarty_Variable();
$__foreach_clinic_1_total = $_smarty_tpl->smarty->ext->_foreach->count($_from);
if ($__foreach_clinic_1_total) {
foreach ($_from as $_smarty_tpl->tpl_vars['clinic']->value) {
$__foreach_clinic_1_saved_local_item = $_smarty_tpl->tpl_vars['clinic'];
?>
                <tr>
                    <td><?php echo $_smarty_tpl->tpl_vars['clinic']->value->get('nomClinica');?>
</td>
                    <td>
                        <a href="/clinic/view/<?php echo $_smarty_tpl->tpl_vars['clinic']->value->get('cdnClinica');?>
">
                            <button type="button" class="btn btn-primary">
                                Visualizar
                            </button>
                        </a>
                    </td>
                </tr>
            <?php
$_smarty_tpl->tpl_vars['clinic'] = $__foreach_clinic_1_saved_local_item;
}
}
if ($__foreach_clinic_1_saved_item) {
$_smarty_tpl->tpl_vars['clinic'] = $__foreach_clinic_1_saved_item;
}
?>
            </tbody>
        </table>
    </div>
</div>

<div class="row">
    <div class="col-sm-12 page-header">
        <h3>Finalizaram o teste e não continuaram</h3>
    </div>
    <div class="col-sm-12 table-responsive">
        <table class="table table-bordered table-hover datatable">
            <thead>
            <tr>
                <th>Nome</th>
                <th>Ações</th>
            </tr>
            </thead>
            <tbody>
            <?php
$_from = $_smarty_tpl->tpl_vars['clinics']->value['outTest'];
if (!is_array($_from) && !is_object($_from)) {
settype($_from, 'array');
}
$__foreach_clinic_2_saved_item = isset($_smarty_tpl->tpl_vars['clinic']) ? $_smarty_tpl->tpl_vars['clinic'] : false;
$_smarty_tpl->tpl_vars['clinic'] = new Smarty_Variable();
$__foreach_clinic_2_total = $_smarty_tpl->smarty->ext->_foreach->count($_from);
if ($__foreach_clinic_2_total) {
foreach ($_from as $_smarty_tpl->tpl_vars['clinic']->value) {
$__foreach_clinic_2_saved_local_item = $_smarty_tpl->tpl_vars['clinic'];
?>

                <tr>
                    <td><?php echo $_smarty_tpl->tpl_vars['clinic']->value->get('nomClinica');?>
</td>
                    <td>
                        <a href="/clinic/view/<?php echo $_smarty_tpl->tpl_vars['clinic']->value->get('cdnClinica');?>
">
                            <button type="button" class="btn btn-primary">
                                Visualizar
                            </button>
                        </a>
                    </td>
                </tr>
            <?php
$_smarty_tpl->tpl_vars['clinic'] = $__foreach_clinic_2_saved_local_item;
}
}
if ($__foreach_clinic_2_saved_item) {
$_smarty_tpl->tpl_vars['clinic'] = $__foreach_clinic_2_saved_item;
}
?>
            </tbody>
        </table>
    </div>
</div><?php }
}
