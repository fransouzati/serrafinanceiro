<?php
/* Smarty version 3.1.28, created on 2016-07-11 01:45:04
  from "C:\xampp\htdocs\serra\financeiro\app\viewer\Withdraw\view.tpl" */

if ($_smarty_tpl->smarty->ext->_validateCompiled->decodeProperties($_smarty_tpl, array (
  'has_nocache_code' => false,
  'version' => '3.1.28',
  'unifunc' => 'content_57832450d0cd52_39725825',
  'file_dependency' => 
  array (
    '8b57aee50ef8595452ffc3c08cbd50112e1aba2a' => 
    array (
      0 => 'C:\\xampp\\htdocs\\serra\\financeiro\\app\\viewer\\Withdraw\\view.tpl',
      1 => 1468212297,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_57832450d0cd52_39725825 ($_smarty_tpl) {
?>
<div class="row">
    <div class="col-sm-12">
        <div class="col-md-12" style="margin-bottom: 20px;">
            <a href="/withdraw/add">
                <button class="btn btn-primary pull-right">
                    Cadastrar
                </button>
            </a>
        </div>
    </div>
</div>
<div class="row">
    <div class="col-sm-12">
        <hr>
    </div>
</div>
<!-- Filtros !-->
<div class="row">
    <div class="col-sm-12">
        <h4>Filtros</h4>
    </div>
</div>

<div class="row">
    <form action="withdraw/view" method="post" class="ignore-wait">

        <div class="col-sm-3 form-group">
            <label for="_filter_period" class="control-label">Período</label>
            <input type="text" value="<?php echo $_smarty_tpl->tpl_vars['_filter_period']->value;?>
" name="_filter_period" class="form-control mask-dateinterval">
        </div>
        <div class="col-sm-3 form-group">
            <label for="_filter_type" class="control-label">Tipo de saída</label>
            <select name="_filter_type" class="form-control ">
                <?php if ($_smarty_tpl->tpl_vars['_filter_type']->value == 'clear') {?>
                    <?php $_smarty_tpl->tpl_vars["selected"] = new Smarty_Variable("selected", null);
$_smarty_tpl->ext->_updateScope->updateScope($_smarty_tpl, "selected", 0);?>
                <?php } else { ?>
                    <?php $_smarty_tpl->tpl_vars["selected"] = new Smarty_Variable('', null);
$_smarty_tpl->ext->_updateScope->updateScope($_smarty_tpl, "selected", 0);?>
                <?php }?>
                <option <?php echo $_smarty_tpl->tpl_vars['selected']->value;?>
 value="clear">Indiferente</option>
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
                    <?php if ($_smarty_tpl->tpl_vars['type']->value->get('id') == $_smarty_tpl->tpl_vars['_filter_type']->value) {?>
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
        <div class="col-sm-3 form-group">
            <label for="_filter_partner" class="control-label">Sócio</label>
            <select name="_filter_partner" class="form-control ">
                <?php if ($_smarty_tpl->tpl_vars['_filter_partner']->value == 'clear') {?>
                    <?php $_smarty_tpl->tpl_vars["selected"] = new Smarty_Variable("selected", null);
$_smarty_tpl->ext->_updateScope->updateScope($_smarty_tpl, "selected", 0);?>
                <?php } else { ?>
                    <?php $_smarty_tpl->tpl_vars["selected"] = new Smarty_Variable('', null);
$_smarty_tpl->ext->_updateScope->updateScope($_smarty_tpl, "selected", 0);?>
                <?php }?>
                <option <?php echo $_smarty_tpl->tpl_vars['selected']->value;?>
 value="clear">Indiferente</option>
                <?php
$_from = $_smarty_tpl->tpl_vars['partners']->value;
if (!is_array($_from) && !is_object($_from)) {
settype($_from, 'array');
}
$__foreach_partner_1_saved_item = isset($_smarty_tpl->tpl_vars['partner']) ? $_smarty_tpl->tpl_vars['partner'] : false;
$_smarty_tpl->tpl_vars['partner'] = new Smarty_Variable();
$__foreach_partner_1_total = $_smarty_tpl->smarty->ext->_foreach->count($_from);
if ($__foreach_partner_1_total) {
foreach ($_from as $_smarty_tpl->tpl_vars['partner']->value) {
$__foreach_partner_1_saved_local_item = $_smarty_tpl->tpl_vars['partner'];
?>
                    <?php if ($_smarty_tpl->tpl_vars['partner']->value->get('id') == $_smarty_tpl->tpl_vars['_filter_partner']->value) {?>
                        <?php $_smarty_tpl->tpl_vars["selected"] = new Smarty_Variable("selected", null);
$_smarty_tpl->ext->_updateScope->updateScope($_smarty_tpl, "selected", 0);?>
                    <?php } else { ?>
                        <?php $_smarty_tpl->tpl_vars["selected"] = new Smarty_Variable('', null);
$_smarty_tpl->ext->_updateScope->updateScope($_smarty_tpl, "selected", 0);?>
                    <?php }?>
                    <option <?php echo $_smarty_tpl->tpl_vars['selected']->value;?>
 value="<?php echo $_smarty_tpl->tpl_vars['partner']->value->get('id');?>
"><?php echo $_smarty_tpl->tpl_vars['partner']->value->get('name');?>
</option>
                <?php
$_smarty_tpl->tpl_vars['partner'] = $__foreach_partner_1_saved_local_item;
}
}
if ($__foreach_partner_1_saved_item) {
$_smarty_tpl->tpl_vars['partner'] = $__foreach_partner_1_saved_item;
}
?>
            </select>
        </div>
        <div class="col-sm-3 form-group">
            <label for="_filter_investor" class="control-label">Investidor</label>
            <select name="_filter_investor" class="form-control ">
                <?php if ($_smarty_tpl->tpl_vars['_filter_investor']->value == 'clear') {?>
                    <?php $_smarty_tpl->tpl_vars["selected"] = new Smarty_Variable("selected", null);
$_smarty_tpl->ext->_updateScope->updateScope($_smarty_tpl, "selected", 0);?>
                <?php } else { ?>
                    <?php $_smarty_tpl->tpl_vars["selected"] = new Smarty_Variable('', null);
$_smarty_tpl->ext->_updateScope->updateScope($_smarty_tpl, "selected", 0);?>
                <?php }?>
                <option <?php echo $_smarty_tpl->tpl_vars['selected']->value;?>
 value="clear">Indiferente</option>
                <?php
$_from = $_smarty_tpl->tpl_vars['investors']->value;
if (!is_array($_from) && !is_object($_from)) {
settype($_from, 'array');
}
$__foreach_investor_2_saved_item = isset($_smarty_tpl->tpl_vars['investor']) ? $_smarty_tpl->tpl_vars['investor'] : false;
$_smarty_tpl->tpl_vars['investor'] = new Smarty_Variable();
$__foreach_investor_2_total = $_smarty_tpl->smarty->ext->_foreach->count($_from);
if ($__foreach_investor_2_total) {
foreach ($_from as $_smarty_tpl->tpl_vars['investor']->value) {
$__foreach_investor_2_saved_local_item = $_smarty_tpl->tpl_vars['investor'];
?>
                    <?php if ($_smarty_tpl->tpl_vars['investor']->value->get('id') == $_smarty_tpl->tpl_vars['_filter_investor']->value) {?>
                        <?php $_smarty_tpl->tpl_vars["selected"] = new Smarty_Variable("selected", null);
$_smarty_tpl->ext->_updateScope->updateScope($_smarty_tpl, "selected", 0);?>
                    <?php } else { ?>
                        <?php $_smarty_tpl->tpl_vars["selected"] = new Smarty_Variable('', null);
$_smarty_tpl->ext->_updateScope->updateScope($_smarty_tpl, "selected", 0);?>
                    <?php }?>
                    <option <?php echo $_smarty_tpl->tpl_vars['selected']->value;?>
 value="<?php echo $_smarty_tpl->tpl_vars['investor']->value->get('id');?>
"><?php echo $_smarty_tpl->tpl_vars['investor']->value->get('name');?>
</option>
                <?php
$_smarty_tpl->tpl_vars['investor'] = $__foreach_investor_2_saved_local_item;
}
}
if ($__foreach_investor_2_saved_item) {
$_smarty_tpl->tpl_vars['investor'] = $__foreach_investor_2_saved_item;
}
?>
            </select>
        </div>
        <div class="col-sm-12">
            <button type="submit" class="btn btn-default" name="submit" value="filter">
                Aplicar filtro
            </button>
            <div class="btn-group">
                <button type="button" class="btn btn-default dropdown-toggle" data-toggle="dropdown"
                        aria-haspopup="true"
                        aria-expanded="false">
                    Exportar <span class="caret"></span>
                </button>
                <ul class="dropdown-menu">
                    <li>
                        <button class="btn btn-default btn-block" type="submit" name="submit" value="pdf">Para PDF
                        </button>
                    </li>
                    <li>
                        <button class="btn btn-default btn-block" type="submit" name="submit" value="excel">Para Excel
                        </button>
                    </li>
                </ul>
            </div>
        </div>
    </form>
</div>
<div class="row">
    <div class="col-sm-12">
        <hr>
    </div>
</div>
<div class="row">
    <div class="col-md-12 table-responsive">
        <table class="table table-bordered table-hover datatable">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Data</th>
                    <th>Tipo</th>
                    <th>Sócio</th>
                    <th>Investidor</th>
                    <th>Descrição</th>
                    <th>Valor</th>
                </tr>
            </thead>
            <tbody>
                <?php
$_from = $_smarty_tpl->tpl_vars['withdraws']->value;
if (!is_array($_from) && !is_object($_from)) {
settype($_from, 'array');
}
$__foreach_withdraw_3_saved_item = isset($_smarty_tpl->tpl_vars['withdraw']) ? $_smarty_tpl->tpl_vars['withdraw'] : false;
$_smarty_tpl->tpl_vars['withdraw'] = new Smarty_Variable();
$__foreach_withdraw_3_total = $_smarty_tpl->smarty->ext->_foreach->count($_from);
if ($__foreach_withdraw_3_total) {
foreach ($_from as $_smarty_tpl->tpl_vars['withdraw']->value) {
$__foreach_withdraw_3_saved_local_item = $_smarty_tpl->tpl_vars['withdraw'];
?>
                    <tr>
                        <?php if ($_smarty_tpl->tpl_vars['withdraw']->value->get('id_partner') == NULL) {?>
                            <?php $_smarty_tpl->tpl_vars["partner"] = new Smarty_Variable("-", null);
$_smarty_tpl->ext->_updateScope->updateScope($_smarty_tpl, "partner", 0);?>
                        <?php } else { ?>
                            <?php $_smarty_tpl->tpl_vars["partner"] = new Smarty_Variable($_smarty_tpl->tpl_vars['withdraw']->value->get('id_partner',true)->get('name'), null);
$_smarty_tpl->ext->_updateScope->updateScope($_smarty_tpl, "partner", 0);?>
                        <?php }?>
                        <td><?php echo $_smarty_tpl->tpl_vars['withdraw']->value->get('id');?>
</td>
                        <td><?php echo $_smarty_tpl->tpl_vars['withdraw']->value->get('date',true);?>
</td>
                        <td><?php echo $_smarty_tpl->tpl_vars['withdraw']->value->get('id_type',true)->get('name');?>
</td>
                        <td><?php echo $_smarty_tpl->tpl_vars['partner']->value;?>
</td>
                        <td><?php echo $_smarty_tpl->tpl_vars['withdraw']->value->get('id_investor',true)->get('name');?>
</td>
                        <td><?php echo $_smarty_tpl->tpl_vars['withdraw']->value->get('description');?>
</td>
                        <td>R$<?php echo $_smarty_tpl->tpl_vars['withdraw']->value->get('value',true);?>
</td>
                    </tr>
                <?php
$_smarty_tpl->tpl_vars['withdraw'] = $__foreach_withdraw_3_saved_local_item;
}
}
if ($__foreach_withdraw_3_saved_item) {
$_smarty_tpl->tpl_vars['withdraw'] = $__foreach_withdraw_3_saved_item;
}
?>
            </tbody>
        </table>
    </div>
</div>
<?php }
}
