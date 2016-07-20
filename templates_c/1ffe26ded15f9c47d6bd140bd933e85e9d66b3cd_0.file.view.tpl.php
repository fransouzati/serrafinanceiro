<?php
/* Smarty version 3.1.28, created on 2016-07-20 11:15:13
  from "C:\wamp\www\financeiro3\app\viewer\Entry\view.tpl" */

if ($_smarty_tpl->smarty->ext->_validateCompiled->decodeProperties($_smarty_tpl, array (
  'has_nocache_code' => false,
  'version' => '3.1.28',
  'unifunc' => 'content_578f87712c4c16_70256059',
  'file_dependency' => 
  array (
    '1ffe26ded15f9c47d6bd140bd933e85e9d66b3cd' => 
    array (
      0 => 'C:\\wamp\\www\\financeiro3\\app\\viewer\\Entry\\view.tpl',
      1 => 1468310113,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_578f87712c4c16_70256059 ($_smarty_tpl) {
?>
<div class="row">
    <div class="col-sm-12">
        <div class="col-md-12" style="margin-bottom: 20px;">
            <a href="entry/add">
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
    <form action="entry/view" method="post" class="ignore-wait">

        <div class="col-sm-4 form-group">
            <label for="_filter_period" class="control-label">Período</label>
            <input type="text" value="<?php echo $_smarty_tpl->tpl_vars['_filter_period']->value;?>
" name="_filter_period" class="form-control mask-dateinterval">
        </div>
        <div class="col-sm-4 form-group">
            <label for="_filter_client" class="control-label">Cliente</label>
            <select name="_filter_client" class="form-control ">
                <option value="">Nenhum</option>
                <?php if ($_smarty_tpl->tpl_vars['_filter_client']->value == 'clear') {?>
                    <?php $_smarty_tpl->tpl_vars["selected"] = new Smarty_Variable("selected", null);
$_smarty_tpl->ext->_updateScope->updateScope($_smarty_tpl, "selected", 0);?>
                <?php } else { ?>
                    <?php $_smarty_tpl->tpl_vars["selected"] = new Smarty_Variable('', null);
$_smarty_tpl->ext->_updateScope->updateScope($_smarty_tpl, "selected", 0);?>
                <?php }?>
                <option <?php echo $_smarty_tpl->tpl_vars['selected']->value;?>
 value="clear">Indiferente</option>
                <?php
$_from = $_smarty_tpl->tpl_vars['clients']->value;
if (!is_array($_from) && !is_object($_from)) {
settype($_from, 'array');
}
$__foreach_client_0_saved_item = isset($_smarty_tpl->tpl_vars['client']) ? $_smarty_tpl->tpl_vars['client'] : false;
$_smarty_tpl->tpl_vars['client'] = new Smarty_Variable();
$__foreach_client_0_total = $_smarty_tpl->smarty->ext->_foreach->count($_from);
if ($__foreach_client_0_total) {
foreach ($_from as $_smarty_tpl->tpl_vars['client']->value) {
$__foreach_client_0_saved_local_item = $_smarty_tpl->tpl_vars['client'];
?>
                    <?php if ($_smarty_tpl->tpl_vars['client']->value->get('id') == $_smarty_tpl->tpl_vars['_filter_client']->value) {?>
                        <?php $_smarty_tpl->tpl_vars["selected"] = new Smarty_Variable("selected", null);
$_smarty_tpl->ext->_updateScope->updateScope($_smarty_tpl, "selected", 0);?>
                    <?php } else { ?>
                        <?php $_smarty_tpl->tpl_vars["selected"] = new Smarty_Variable('', null);
$_smarty_tpl->ext->_updateScope->updateScope($_smarty_tpl, "selected", 0);?>
                    <?php }?>
                    <option <?php echo $_smarty_tpl->tpl_vars['selected']->value;?>
 value="<?php echo $_smarty_tpl->tpl_vars['client']->value->get('id');?>
"><?php echo $_smarty_tpl->tpl_vars['client']->value->get('name');?>
</option>
                <?php
$_smarty_tpl->tpl_vars['client'] = $__foreach_client_0_saved_local_item;
}
}
if ($__foreach_client_0_saved_item) {
$_smarty_tpl->tpl_vars['client'] = $__foreach_client_0_saved_item;
}
?>
            </select>
        </div>
        <div class="col-sm-4 form-group">
            <label for="_filter_type" class="control-label">Tipo de entrada</label>
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
$__foreach_type_1_saved_item = isset($_smarty_tpl->tpl_vars['type']) ? $_smarty_tpl->tpl_vars['type'] : false;
$_smarty_tpl->tpl_vars['type'] = new Smarty_Variable();
$__foreach_type_1_total = $_smarty_tpl->smarty->ext->_foreach->count($_from);
if ($__foreach_type_1_total) {
foreach ($_from as $_smarty_tpl->tpl_vars['type']->value) {
$__foreach_type_1_saved_local_item = $_smarty_tpl->tpl_vars['type'];
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
$_smarty_tpl->tpl_vars['type'] = $__foreach_type_1_saved_local_item;
}
}
if ($__foreach_type_1_saved_item) {
$_smarty_tpl->tpl_vars['type'] = $__foreach_type_1_saved_item;
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
                    <th>Cliente</th>
                    <th>Descrição</th>
                    <th>Valor</th>
                </tr>
            </thead>
            <tbody>
                <?php
$_from = $_smarty_tpl->tpl_vars['entries']->value;
if (!is_array($_from) && !is_object($_from)) {
settype($_from, 'array');
}
$__foreach_entry_2_saved_item = isset($_smarty_tpl->tpl_vars['entry']) ? $_smarty_tpl->tpl_vars['entry'] : false;
$_smarty_tpl->tpl_vars['entry'] = new Smarty_Variable();
$__foreach_entry_2_total = $_smarty_tpl->smarty->ext->_foreach->count($_from);
if ($__foreach_entry_2_total) {
foreach ($_from as $_smarty_tpl->tpl_vars['entry']->value) {
$__foreach_entry_2_saved_local_item = $_smarty_tpl->tpl_vars['entry'];
?>
                    <tr>
                        <?php if ($_smarty_tpl->tpl_vars['entry']->value->get('id_client') == NULL) {?>
                            <?php $_smarty_tpl->tpl_vars["client"] = new Smarty_Variable("-", null);
$_smarty_tpl->ext->_updateScope->updateScope($_smarty_tpl, "client", 0);?>
                        <?php } else { ?>
                            <?php $_smarty_tpl->tpl_vars["client"] = new Smarty_Variable($_smarty_tpl->tpl_vars['entry']->value->get('id_client',true)->get('name'), null);
$_smarty_tpl->ext->_updateScope->updateScope($_smarty_tpl, "client", 0);?>
                        <?php }?>
                        <td><?php echo $_smarty_tpl->tpl_vars['entry']->value->get('id');?>
</td>
                        <td><?php echo $_smarty_tpl->tpl_vars['entry']->value->get('date',true);?>
</td>
                        <td><?php echo $_smarty_tpl->tpl_vars['entry']->value->get('id_type',true)->get('name');?>
</td>
                        <td><?php echo $_smarty_tpl->tpl_vars['client']->value;?>
</td>
                        <td><?php echo $_smarty_tpl->tpl_vars['entry']->value->get('description');?>
</td>
                        <td>R$<?php echo $_smarty_tpl->tpl_vars['entry']->value->get('value',true);?>
</td>
                    </tr>
                <?php
$_smarty_tpl->tpl_vars['entry'] = $__foreach_entry_2_saved_local_item;
}
}
if ($__foreach_entry_2_saved_item) {
$_smarty_tpl->tpl_vars['entry'] = $__foreach_entry_2_saved_item;
}
?>
            </tbody>
        </table>
    </div>
</div>
<?php }
}
