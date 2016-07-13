<?php
/* Smarty version 3.1.28, created on 2016-07-07 15:07:31
  from "C:\xampp\htdocs\serra\financeiro\app\viewer\Project\add.tpl" */

if ($_smarty_tpl->smarty->ext->_validateCompiled->decodeProperties($_smarty_tpl, array (
  'has_nocache_code' => false,
  'version' => '3.1.28',
  'unifunc' => 'content_577e9a6383f634_70787743',
  'file_dependency' => 
  array (
    'c3aa3cedc4d526e8942ad0e28d23c4e87604900a' => 
    array (
      0 => 'C:\\xampp\\htdocs\\serra\\financeiro\\app\\viewer\\Project\\add.tpl',
      1 => 1467914830,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_577e9a6383f634_70787743 ($_smarty_tpl) {
?>
<form action="project/add" method="post">
    <div class="row">
        <div class="col-sm-6 form-group">
            <label class="control-label" for="name">Nome</label>
            <input required type="text" class="form-control" name="name">
        </div>
        <div class="col-sm-6 form-group">
            <label class="control-label" for="id_client">Cliente</label>
            <select class="form-control " name="id_client">
                <option value="" selected>Nenhum</option>
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
                    <option value="<?php echo $_smarty_tpl->tpl_vars['client']->value->get('id');?>
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
    </div>
    <div class="row">
        <div class="col-sm-6 form-group">
            <label class="control-label" for="value">Valor</label>
            <input type="text" class="form-control mask-money" name="value">
        </div>
        <div class="col-sm-6 form-group">
            <label class="control-label" for="executor">Executor</label>
            <input type="text" class="form-control" name="executor">
        </div>
    </div>
    <div class="row">
        <div class="col-sm-6 form-group">
            <label class="control-label" for="initial_date">Data início</label>
            <input type="text" class="form-control mask-date" name="initial_date" id="initial_date">
        </div>
        <div class="col-sm-6 form-group">
            <label class="control-label" for="end_date">Data fim</label>
            <input type="text" class="form-control mask-date" name="end_date">
        </div>
    </div>
    <div class="row">
        <div class="col-sm-12 form-group">
            <label class="control-label" for="observation">Observações</label>
            <textarea name="observation" class="form-control"></textarea>
        </div>
    </div>


    <!-- Parcelas !-->
    <div class="row">
        <div class="col-sm-12">
            <h3 class="page-header">Parcelamento</h3>
        </div>
    </div>
    <div class="row">
        <div class="col-md-12">
            <button class="btn btn-default" type="button" id="addInstallment">
                <span class="fa fa-plus"></span>
            </button>
            <button class="btn btn-default" type="button" id="removeInstallment">
                <span class="fa fa-minus"></span>
            </button>
            <button class="btn btn-default" type="button" id="calculateDates" title="Calcular datas">
                <span class="fa fa-calculator"></span>
            </button>
        </div>
        <div class="col-md-12">
            <hr>
        </div>
    </div>
    <input type="hidden" name="qttInstallments" id="qttInstallments" value="0">
    <div id="rowInstallments">

    </div>
    <div class="row">
        <div class="col-md-12">
            <hr>
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
