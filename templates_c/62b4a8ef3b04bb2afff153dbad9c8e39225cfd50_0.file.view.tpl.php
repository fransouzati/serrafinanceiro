<?php
/* Smarty version 3.1.28, created on 2016-07-07 11:30:27
  from "C:\xampp\htdocs\serra\financeiro\app\viewer\Project\view.tpl" */

if ($_smarty_tpl->smarty->ext->_validateCompiled->decodeProperties($_smarty_tpl, array (
  'has_nocache_code' => false,
  'version' => '3.1.28',
  'unifunc' => 'content_577e6783d6d777_42976030',
  'file_dependency' => 
  array (
    '62b4a8ef3b04bb2afff153dbad9c8e39225cfd50' => 
    array (
      0 => 'C:\\xampp\\htdocs\\serra\\financeiro\\app\\viewer\\Project\\view.tpl',
      1 => 1467901827,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_577e6783d6d777_42976030 ($_smarty_tpl) {
?>
<div class="row">
    <div class="col-md-12" style="margin-bottom: 20px;">
        <a href="/project/add">
            <button class="btn btn-primary pull-right">
                Cadastrar
            </button>
        </a>
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
    <form action="project/view" method="post" class="ignore-wait">

        <input class="filter-input" filter-type="status" type="hidden" value="<?php echo $_smarty_tpl->tpl_vars['_filter_status']->value;?>
"
               name="_filter_status">

        <input class="filter-input" filter-type="end" type="hidden" value="<?php echo $_smarty_tpl->tpl_vars['_filter_end']->value;?>
"
               name="_filter_end">

        <div class="col-sm-3">
            <label for="_filter_name" class="control-label">Nome</label>
            <input type="text" value="<?php echo $_smarty_tpl->tpl_vars['_filter_name']->value;?>
" name="_filter_name" class="form-control">
        </div>
        <div class="col-sm-3">
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
        <div class="col-sm-3 form-group">
            <label for="_filter_period" class="control-label">Período</label>
            <input type="text" value="<?php echo $_smarty_tpl->tpl_vars['_filter_period']->value;?>
" name="_filter_period" class="form-control mask-dateinterval">
        </div>
        <div class="col-sm-3">
            <label for="_filter_executor" class="control-label">Executor</label>
            <input type="text" value="<?php echo $_smarty_tpl->tpl_vars['_filter_executor']->value;?>
" name="_filter_executor" class="form-control">
        </div>
        <hr>
        <div class="col-sm-12">
            <h4>
                <span class="label label-primary filter" filter-type="status" value="all">Todos</span>
                <span class="label label-default filter" filter-type="status" value="pending">Com pendências</span>
                <span class="label label-default filter" filter-type="status" value="ok">Sem pendências</span>
            </h4>
        </div>
        <div class="col-sm-12">
            <h4>
                <span class="label label-primary filter" filter-type="end" value="all">Todos</span>
                <span class="label label-default filter" filter-type="end" value="finished">Projetos terminados</span>
                <span class="label label-default filter" filter-type="end" value="ongoing">Projetos em andamento</span>
                <span class="label label-default filter" filter-type="end" value="late">Projetos atrasados</span>
            </h4>
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
<?php $_smarty_tpl->smarty->ext->_subtemplate->render($_smarty_tpl, (dirname($_smarty_tpl->source->filepath)).("/viewInstallments.tpl"), $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, true);
?>

<div class="row">
    <div class="col-md-12 table-responsive">
        <table class="table table-bordered table-hover datatable">
            <thead>
            <tr>
                <th>Id</th>
                <th>Nome</th>
                <th>Cliente</th>
                <th>Valor</th>
                <th>Data início</th>
                <th>Data fim</th>
                <th>Executor</th>
                <th>Situação</th>
            </tr>
            </thead>
            <tbody>
            <?php
$_from = $_smarty_tpl->tpl_vars['projects']->value;
if (!is_array($_from) && !is_object($_from)) {
settype($_from, 'array');
}
$__foreach_project_1_saved_item = isset($_smarty_tpl->tpl_vars['project']) ? $_smarty_tpl->tpl_vars['project'] : false;
$_smarty_tpl->tpl_vars['project'] = new Smarty_Variable();
$__foreach_project_1_total = $_smarty_tpl->smarty->ext->_foreach->count($_from);
if ($__foreach_project_1_total) {
foreach ($_from as $_smarty_tpl->tpl_vars['project']->value) {
$__foreach_project_1_saved_local_item = $_smarty_tpl->tpl_vars['project'];
?>
                <?php if ($_smarty_tpl->tpl_vars['project']->value->get('id_client') == NULL) {?>
                    <?php $_smarty_tpl->tpl_vars["client"] = new Smarty_Variable("-", null);
$_smarty_tpl->ext->_updateScope->updateScope($_smarty_tpl, "client", 0);?>
                <?php } else { ?>
                    <?php $_smarty_tpl->tpl_vars["client"] = new Smarty_Variable($_smarty_tpl->tpl_vars['project']->value->get('id_client',true)->get('name'), null);
$_smarty_tpl->ext->_updateScope->updateScope($_smarty_tpl, "client", 0);?>
                <?php }?>
                <?php if ($_smarty_tpl->tpl_vars['project']->value->strtotime2($_smarty_tpl->tpl_vars['project']->value->get('end_date')) < $_smarty_tpl->tpl_vars['project']->value->strtotime2($_smarty_tpl->tpl_vars['project']->value->today(false))) {?>
                    <?php $_smarty_tpl->tpl_vars["style"] = new Smarty_Variable("style='color: red'", null);
$_smarty_tpl->ext->_updateScope->updateScope($_smarty_tpl, "style", 0);?>
                <?php } else { ?>
                    <?php $_smarty_tpl->tpl_vars["style"] = new Smarty_Variable('', null);
$_smarty_tpl->ext->_updateScope->updateScope($_smarty_tpl, "style", 0);?>
                <?php }?>
                <tr>
                    <td><?php echo $_smarty_tpl->tpl_vars['project']->value->get('id');?>
</td>
                    <td>
                        <a href="/project/view/<?php echo $_smarty_tpl->tpl_vars['project']->value->get('id');?>
">
                            <?php echo $_smarty_tpl->tpl_vars['project']->value->get('name');?>

                        </a>
                    </td>
                    <td><?php echo $_smarty_tpl->tpl_vars['client']->value;?>
</td>
                    <td>R$<?php echo $_smarty_tpl->tpl_vars['project']->value->get('value',true);?>
</td>
                    <td><?php echo $_smarty_tpl->tpl_vars['project']->value->get('initial_date',true);?>
</td>
                    <td <?php echo $_smarty_tpl->tpl_vars['style']->value;?>
><?php echo $_smarty_tpl->tpl_vars['project']->value->get('end_date',true);?>
</td>
                    <td><?php echo $_smarty_tpl->tpl_vars['project']->value->get('executor');?>
</td>
                    <td align="center">
                        <?php if ($_smarty_tpl->tpl_vars['project']->value->get('status')) {?>
                            <i class="fa fa-circle" style="color: #7AFF88"></i>
                        <?php } else { ?>
                            <a style="cursor: pointer">
                                <i project="<?php echo $_smarty_tpl->tpl_vars['project']->value->get('id');?>
" class="installments-modal fa fa-circle"
                                   style="color: #FF6671!important"></i>
                            </a>
                        <?php }?>
                    </td>
                </tr>
            <?php
$_smarty_tpl->tpl_vars['project'] = $__foreach_project_1_saved_local_item;
}
}
if ($__foreach_project_1_saved_item) {
$_smarty_tpl->tpl_vars['project'] = $__foreach_project_1_saved_item;
}
?>
            </tbody>
        </table>
    </div>
</div><?php }
}
