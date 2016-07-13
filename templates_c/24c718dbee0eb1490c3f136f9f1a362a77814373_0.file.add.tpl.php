<?php
/* Smarty version 3.1.28, created on 2016-07-11 04:33:57
  from "C:\xampp\htdocs\serra\financeiro\app\viewer\Bill\add.tpl" */

if ($_smarty_tpl->smarty->ext->_validateCompiled->decodeProperties($_smarty_tpl, array (
  'has_nocache_code' => false,
  'version' => '3.1.28',
  'unifunc' => 'content_57834be52973c5_83299515',
  'file_dependency' => 
  array (
    '24c718dbee0eb1490c3f136f9f1a362a77814373' => 
    array (
      0 => 'C:\\xampp\\htdocs\\serra\\financeiro\\app\\viewer\\Bill\\add.tpl',
      1 => 1468222339,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_57834be52973c5_83299515 ($_smarty_tpl) {
?>
<form action="bill/add" method="post">
    <div class="row">
        <div class="col-sm-4 form-group">
            <label class="control-label">Tipo de saída</label>
            <select name="id_type" class="form-control">
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

        <div class="col-sm-4 form-group">
            <label class="control-label">Dia de pagamento</label>
            <input type="number" min="1" max="31" name="day" class="form-control">
        </div>

        <div class="col-sm-4 form-group">
            <label class="control-label">Valor (aprox.)</label>
            <input type="text" class="form-control mask-money" name="value">
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
