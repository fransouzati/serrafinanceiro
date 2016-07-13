<?php
/* Smarty version 3.1.28, created on 2016-07-11 04:59:49
  from "C:\xampp\htdocs\serra\financeiro\app\viewer\Bill\edit.tpl" */

if ($_smarty_tpl->smarty->ext->_validateCompiled->decodeProperties($_smarty_tpl, array (
  'has_nocache_code' => false,
  'version' => '3.1.28',
  'unifunc' => 'content_578351f58244a6_22120553',
  'file_dependency' => 
  array (
    'e3de838c8fc643a2ce013e0c9e3adac5b63dadc5' => 
    array (
      0 => 'C:\\xampp\\htdocs\\serra\\financeiro\\app\\viewer\\Bill\\edit.tpl',
      1 => 1468223988,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_578351f58244a6_22120553 ($_smarty_tpl) {
?>
<form action="bill/edit/<?php echo $_smarty_tpl->tpl_vars['bill']->value->get('id');?>
" method="post">
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
                    <?php if ($_smarty_tpl->tpl_vars['type']->value->get('id') == $_smarty_tpl->tpl_vars['bill']->value->get('id_type')) {?>
                        <?php $_smarty_tpl->tpl_vars["selected"] = new Smarty_Variable("selected", null);
$_smarty_tpl->ext->_updateScope->updateScope($_smarty_tpl, "selected", 0);?>
                    <?php } else { ?>
                        <?php $_smarty_tpl->tpl_vars["selected"] = new Smarty_Variable('', null);
$_smarty_tpl->ext->_updateScope->updateScope($_smarty_tpl, "selected", 0);?>
                    <?php }?>
                    <option <?php echo $_smarty_tpl->tpl_vars['selected']->value;?>
 value="<?php echo $_smarty_tpl->tpl_vars['type']->value->get('id');?>
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
            <input type="number" min="1" max="31" name="day" class="form-control" value="<?php echo $_smarty_tpl->tpl_vars['bill']->value->get('day');?>
">
        </div>

        <div class="col-sm-4 form-group">
            <label class="control-label">Valor (aprox.)</label>
            <input type="text" class="form-control mask-money" name="value" value="R$<?php echo $_smarty_tpl->tpl_vars['bill']->value->get('value',true);?>
">
        </div>
    </div>

    <div class="row">
        <div class="col-sm-offset-4 col-sm-4">
            <button class="btn btn-lg btn-success btn-block">
                Editar
            </button>
        </div>
    </div>
</form><?php }
}
