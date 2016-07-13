<?php
/* Smarty version 3.1.28, created on 2016-06-30 10:38:14
  from "C:\wamp\www\financeiro3\app\viewer\Entry\add.tpl" */

if ($_smarty_tpl->smarty->ext->_validateCompiled->decodeProperties($_smarty_tpl, array (
  'has_nocache_code' => false,
  'version' => '3.1.28',
  'unifunc' => 'content_577520c6433907_21595378',
  'file_dependency' => 
  array (
    '7efae65656ac3a2b24884cecac74b85b24570f5e' => 
    array (
      0 => 'C:\\wamp\\www\\financeiro3\\app\\viewer\\Entry\\add.tpl',
      1 => 1467293892,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_577520c6433907_21595378 ($_smarty_tpl) {
?>
<form action="entry/add" method="post">
    <div class="row">
        <div class="col-sm-3 form-group">
            <label for="date" class="control-label">Data</label>
            <input required type="text" class="form-control mask-date" name="date">
        </div>

        <div class="col-sm-3 form-group">
            <label for="id_type" class="control-label">Tipo</label>
            <select required name="id_type" class="form-control ">
                <?php
$_from = $_smarty_tpl->tpl_vars['types']->value;
if (!is_array($_from) && !is_object($_from)) {
settype($_from, 'array');
}
$__foreach_type_0_saved_item = isset($_smarty_tpl->tpl_vars['type']) ? $_smarty_tpl->tpl_vars['type'] : false;
$_smarty_tpl->tpl_vars['type'] = new Smarty_Variable();
$__foreach_type_0_total = $_smarty_tpl->smarty->ext->_foreach->count($_from);
if ($__foreach_type_0_total) {
foreach ($_from as $_smarty_tpl->tpl_vars['type']->value) {
$__foreach_type_0_saved_local_item = $_smarty_tpl->tpl_vars['type'];
?>
                    <option value="<?php echo $_smarty_tpl->tpl_vars['type']->value->get('id');?>
"><?php echo $_smarty_tpl->tpl_vars['type']->value->get('name');?>
</option>
                <?php
$_smarty_tpl->tpl_vars['type'] = $__foreach_type_0_saved_local_item;
}
}
if ($__foreach_type_0_saved_item) {
$_smarty_tpl->tpl_vars['type'] = $__foreach_type_0_saved_item;
}
?>
            </select>
        </div>

        <div class="col-sm-3 form-group">
            <label for="id_client" class="control-label">Cliente</label>
            <select name="id_client" class="form-control ">
                <option value="">Nenhum</option>
                <?php
$_from = $_smarty_tpl->tpl_vars['clients']->value;
if (!is_array($_from) && !is_object($_from)) {
settype($_from, 'array');
}
$__foreach_client_1_saved_item = isset($_smarty_tpl->tpl_vars['client']) ? $_smarty_tpl->tpl_vars['client'] : false;
$_smarty_tpl->tpl_vars['client'] = new Smarty_Variable();
$__foreach_client_1_total = $_smarty_tpl->smarty->ext->_foreach->count($_from);
if ($__foreach_client_1_total) {
foreach ($_from as $_smarty_tpl->tpl_vars['client']->value) {
$__foreach_client_1_saved_local_item = $_smarty_tpl->tpl_vars['client'];
?>
                    <option value="<?php echo $_smarty_tpl->tpl_vars['client']->value->get('id');?>
"><?php echo $_smarty_tpl->tpl_vars['client']->value->get('name');?>
</option>
                <?php
$_smarty_tpl->tpl_vars['client'] = $__foreach_client_1_saved_local_item;
}
}
if ($__foreach_client_1_saved_item) {
$_smarty_tpl->tpl_vars['client'] = $__foreach_client_1_saved_item;
}
?>
            </select>
        </div>

        <div class="col-sm-3 form-group">
            <label for="value" class="control-label">Valor</label>
            <input required class="form-control mask-money" name="value" type="text">
        </div>
    </div>

    <div class="row">
        <div class="col-sm-12 form-group">
            <label for="description" class="control-label">Descrição</label>
            <textarea name="description" class="form-control"></textarea>
        </div>
    </div>

    <div class="row">
        <div class="col-sm-12">
            <hr>
        </div>
    </div>

    <div class="row">
        <div class="col-sm-12 form-group">
            <label for="destionation" class="control-label">Esta entrada será direcionada para o caixa</label>
            <select required class="form-control" name="destination">
                <option value="bank">Do banco</option>
                <option value="internal">Interno</option>
            </select>
        </div>
    </div>

    <div class="row">
        <div class="col-sm-offset-4 col-sm-4">
            <button class="btn btn-lg btn-success btn-block">
                Cadastrar
            </button>
        </div>
    </div>
</form><?php }
}
