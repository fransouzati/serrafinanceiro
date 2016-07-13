<?php
/* Smarty version 3.1.28, created on 2016-07-11 01:42:53
  from "C:\xampp\htdocs\serra\financeiro\app\viewer\Withdraw\add.tpl" */

if ($_smarty_tpl->smarty->ext->_validateCompiled->decodeProperties($_smarty_tpl, array (
  'has_nocache_code' => false,
  'version' => '3.1.28',
  'unifunc' => 'content_578323cd5f2652_43506699',
  'file_dependency' => 
  array (
    '251873ba1e4620be1d831b99d59cb34bb489ced9' => 
    array (
      0 => 'C:\\xampp\\htdocs\\serra\\financeiro\\app\\viewer\\Withdraw\\add.tpl',
      1 => 1468212171,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_578323cd5f2652_43506699 ($_smarty_tpl) {
?>
<form action="withdraw/add" method="post">
    <div class="row">
        <div class="col-sm-3 form-group">
            <label for="date" class="control-label">Data</label>
            <input required type="text" class="form-control mask-date" name="date">
        </div>

        <div class="col-sm-3 form-group">
            <label for="id_type" class="control-label">Tipo</label>
            <select id="type" required name="id_type" class="form-control ">
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
                    <?php if ($_smarty_tpl->tpl_vars['type']->value->get('need_partner')) {?>
                        <?php $_smarty_tpl->tpl_vars["partner"] = new Smarty_Variable("1", null);
$_smarty_tpl->ext->_updateScope->updateScope($_smarty_tpl, "partner", 0);?>
                    <?php } else { ?>
                        <?php $_smarty_tpl->tpl_vars["partner"] = new Smarty_Variable("0", null);
$_smarty_tpl->ext->_updateScope->updateScope($_smarty_tpl, "partner", 0);?>
                    <?php }?>
                    <option partner="<?php echo $_smarty_tpl->tpl_vars['partner']->value;?>
" value="<?php echo $_smarty_tpl->tpl_vars['type']->value->get('id');?>
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
            <label for="id_investor" class="control-label">Investidor</label>
            <select required name="id_investor" class="form-control">
                <?php
$_from = $_smarty_tpl->tpl_vars['investors']->value;
if (!is_array($_from) && !is_object($_from)) {
settype($_from, 'array');
}
$__foreach_investor_1_saved_item = isset($_smarty_tpl->tpl_vars['investor']) ? $_smarty_tpl->tpl_vars['investor'] : false;
$_smarty_tpl->tpl_vars['investor'] = new Smarty_Variable();
$__foreach_investor_1_total = $_smarty_tpl->smarty->ext->_foreach->count($_from);
if ($__foreach_investor_1_total) {
foreach ($_from as $_smarty_tpl->tpl_vars['investor']->value) {
$__foreach_investor_1_saved_local_item = $_smarty_tpl->tpl_vars['investor'];
?>
                    <option value="<?php echo $_smarty_tpl->tpl_vars['investor']->value->get('id');?>
"><?php echo $_smarty_tpl->tpl_vars['investor']->value->get('name');?>
</option>
                <?php
$_smarty_tpl->tpl_vars['investor'] = $__foreach_investor_1_saved_local_item;
}
}
if ($__foreach_investor_1_saved_item) {
$_smarty_tpl->tpl_vars['investor'] = $__foreach_investor_1_saved_item;
}
?>
            </select>
        </div>

        <div class="col-sm-3 form-group">
            <label for="value" class="control-label">Valor</label>
            <input required class="form-control mask-money" name="value" type="text">
        </div>
    </div>

    <div class="row" id="partner">
        <div class="col-sm-12 form-group">
            <label for="id_partner" class="control-label">Sócio</label>
            <select name="id_partner"  id="select-partners" class="form-control">
                <?php
$_from = $_smarty_tpl->tpl_vars['partners']->value;
if (!is_array($_from) && !is_object($_from)) {
settype($_from, 'array');
}
$__foreach_partner_2_saved_item = isset($_smarty_tpl->tpl_vars['partner']) ? $_smarty_tpl->tpl_vars['partner'] : false;
$_smarty_tpl->tpl_vars['partner'] = new Smarty_Variable();
$__foreach_partner_2_total = $_smarty_tpl->smarty->ext->_foreach->count($_from);
if ($__foreach_partner_2_total) {
foreach ($_from as $_smarty_tpl->tpl_vars['partner']->value) {
$__foreach_partner_2_saved_local_item = $_smarty_tpl->tpl_vars['partner'];
?>
                    <option value="<?php echo $_smarty_tpl->tpl_vars['partner']->value->get('id');?>
"><?php echo $_smarty_tpl->tpl_vars['partner']->value->get('name');?>
</option>
                <?php
$_smarty_tpl->tpl_vars['partner'] = $__foreach_partner_2_saved_local_item;
}
}
if ($__foreach_partner_2_saved_item) {
$_smarty_tpl->tpl_vars['partner'] = $__foreach_partner_2_saved_item;
}
?>
            </select>
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
            <label for="destionation" class="control-label">Esta saída será retirada do caixa</label>
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
