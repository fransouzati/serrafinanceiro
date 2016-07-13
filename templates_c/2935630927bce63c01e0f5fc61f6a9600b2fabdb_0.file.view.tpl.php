<?php
/* Smarty version 3.1.28, created on 2016-06-24 15:11:20
  from "C:\wamp\www\financeiro3\app\viewer\Client\view.tpl" */

if ($_smarty_tpl->smarty->ext->_validateCompiled->decodeProperties($_smarty_tpl, array (
  'has_nocache_code' => false,
  'version' => '3.1.28',
  'unifunc' => 'content_576d77c88c3076_53127983',
  'file_dependency' => 
  array (
    '2935630927bce63c01e0f5fc61f6a9600b2fabdb' => 
    array (
      0 => 'C:\\wamp\\www\\financeiro3\\app\\viewer\\Client\\view.tpl',
      1 => 1466791869,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_576d77c88c3076_53127983 ($_smarty_tpl) {
?>
<div class="row">
    <div class="col-md-12" style="margin-bottom: 20px;">
        <a href="/client/add">
            <button class="btn btn-primary pull-right">
                Cadastrar
            </button>
        </a>
    </div>
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
    <form action="client/view" method="post">
        <input class="filter-input" filter-type="status" type="hidden" value="<?php echo $_smarty_tpl->tpl_vars['_filter_status']->value;?>
" name="_filter_status">
        <input class="filter-input" filter-type="finances" type="hidden" value="<?php echo $_smarty_tpl->tpl_vars['_filter_finances']->value;?>
"
               name="_filter_finances">

        <div class="col-sm-12">
            <h4>
                <span class="label label-primary filter" filter-type="status" value="all">Todos</span>
                <span class="label label-default filter" filter-type="status" value="actives">Somente ativos</span>
                <span class="label label-default filter" filter-type="status" value="inactives">Somente inativos</span>
            </h4>
        </div>
        <div class="col-sm-12">
            <h4>
                <span class="label label-primary filter" filter-type="finances" value="all">Todos</span>
                <span class="label label-default filter" filter-type="finances" value="pending">Com pendências</span>
                <span class="label label-default filter" filter-type="finances" value="ok">Sem pendências</span>
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

<div class="row">
    <div class="col-sm-12 table-responsive">
        <table class="table table-bordered table-hover datatable">
            <thead>
            <tr>
                <th>Id</th>
                <th>Nome</th>
                <th>Email</th>
                <th>Telefone</th>
                <th>Site</th>
                <th>CPF/CNPJ</th>
                <th>Valor Suporte</th>
                <th>Desde</th>
                <th>Pendências</th>
            </tr>
            </thead>
            <tbody>
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
                <?php $_smarty_tpl->tpl_vars["finance"] = new Smarty_Variable($_smarty_tpl->tpl_vars['finances']->value[$_smarty_tpl->tpl_vars['client']->value->get('id')], null);
$_smarty_tpl->ext->_updateScope->updateScope($_smarty_tpl, "finance", 0);?>
                <tr>
                    <td><?php echo $_smarty_tpl->tpl_vars['client']->value->get('id');?>
</td>
                    <td>
                        <a href="/client/view/<?php echo $_smarty_tpl->tpl_vars['client']->value->get('id');?>
">
                            <?php echo $_smarty_tpl->tpl_vars['client']->value->get('name');?>

                        </a>
                    </td>
                    <td><?php echo $_smarty_tpl->tpl_vars['client']->value->get('email1');?>
</td>
                    <td><?php echo $_smarty_tpl->tpl_vars['client']->value->get('phone1');?>
</td>
                    <td><?php echo $_smarty_tpl->tpl_vars['client']->value->get('site');?>
</td>
                    <td><?php echo $_smarty_tpl->tpl_vars['client']->value->get('cpf_cnpj');?>
</td>
                    <td>R$<?php echo $_smarty_tpl->tpl_vars['finance']->value->get('monthly_value',true);?>
</td>
                    <td><?php echo $_smarty_tpl->tpl_vars['client']->value->get('since',true);?>
</td>
                    <td align="center">
                        <?php if ($_smarty_tpl->tpl_vars['client']->value->get('status')) {?>
                            <i class="fa fa-circle" style="color: #7AFF88"></i>
                        <?php } else { ?>
                            <a href="/client/pending/<?php echo $_smarty_tpl->tpl_vars['client']->value->get('id');?>
">
                                <i class="fa fa-circle" style="color: #FF6671!important"></i>
                            </a>
                        <?php }?>
                    </td>
                </tr>
            <?php
$_smarty_tpl->tpl_vars['client'] = $__foreach_client_0_saved_local_item;
}
}
if ($__foreach_client_0_saved_item) {
$_smarty_tpl->tpl_vars['client'] = $__foreach_client_0_saved_item;
}
?>
            </tbody>
        </table>
    </div>
</div>
<?php }
}
