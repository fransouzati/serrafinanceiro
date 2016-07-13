<?php
/* Smarty version 3.1.28, created on 2016-06-30 14:37:13
  from "C:\wamp\www\financeiro3\app\viewer\Project\view_one.tpl" */

if ($_smarty_tpl->smarty->ext->_validateCompiled->decodeProperties($_smarty_tpl, array (
  'has_nocache_code' => false,
  'version' => '3.1.28',
  'unifunc' => 'content_577558c93f8586_70676271',
  'file_dependency' => 
  array (
    '08caeb59c8916b542fbe07d01dabcc7f99501354' => 
    array (
      0 => 'C:\\wamp\\www\\financeiro3\\app\\viewer\\Project\\view_one.tpl',
      1 => 1467290715,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_577558c93f8586_70676271 ($_smarty_tpl) {
?>
<div class="row">
    <div class="col-sm-6 form-group">
        <label class="control-label" for="name">Nome</label>
        <input disabled required type="text" class="form-control" name="name" value="<?php echo $_smarty_tpl->tpl_vars['project']->value->get('name');?>
">
    </div>
    <div class="col-sm-6 form-group">
        <label class="control-label" for="id_client">Cliente</label>
        <?php if ($_smarty_tpl->tpl_vars['project']->value->get('id_client') == NULL) {?>
            <?php $_smarty_tpl->tpl_vars["client"] = new Smarty_Variable("-", null);
$_smarty_tpl->ext->_updateScope->updateScope($_smarty_tpl, "client", 0);?>
        <?php } else { ?>
            <?php $_smarty_tpl->tpl_vars["client"] = new Smarty_Variable($_smarty_tpl->tpl_vars['project']->value->get('id_client',true)->get('name'), null);
$_smarty_tpl->ext->_updateScope->updateScope($_smarty_tpl, "client", 0);?>
        <?php }?>
        <input disabled type="text" name="id_client" value="<?php echo $_smarty_tpl->tpl_vars['client']->value;?>
" class="form-control">
    </div>
</div>
<div class="row">
    <div class="col-sm-6 form-group">
        <label class="control-label" for="value">Valor</label>
        <input disabled type="text" class="form-control mask-money" name="value"
               value="R$<?php echo $_smarty_tpl->tpl_vars['project']->value->get('value',true);?>
">
    </div>
    <div class="col-sm-6 form-group">
        <label class="control-label" for="executor">Executor</label>
        <input disabled type="text" class="form-control" name="executor" value="<?php echo $_smarty_tpl->tpl_vars['project']->value->get('executor');?>
">
    </div>
</div>
<div class="row">
    <div class="col-sm-6 form-group">
        <label class="control-label" for="initial_date">Data início</label>
        <input disabled type="text" class="form-control mask-date" name="initial_date"
               value="<?php echo $_smarty_tpl->tpl_vars['project']->value->get('initial_date');?>
">
    </div>
    <div class="col-sm-6 form-group">
        <label class="control-label" for="end_date">Data fim</label>
        <input disabled type="text" class="form-control mask-date" name="end_date" value="<?php echo $_smarty_tpl->tpl_vars['project']->value->get('end_date');?>
">
    </div>
</div>
<div class="row">
    <div class="col-sm-12 form-group">
        <label class="control-label" for="observation">Observações</label>
        <textarea disabled name="observation" class="form-control"><?php echo $_smarty_tpl->tpl_vars['project']->value->get('observation');?>
</textarea>
    </div>
</div>


<!-- Parcelas !-->
<div class="row">
    <div class="col-sm-12">
        <h4 class="page-header">Parcelamento</h4>
    </div>
    <div class="col-sm-12">
        <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#addInstallmentModal">
            Adicionar parcela
        </button>
        <?php $_smarty_tpl->smarty->ext->_subtemplate->render($_smarty_tpl, (dirname($_smarty_tpl->source->filepath)).("\addInstallment.tpl"), $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, true);
?>

        <hr>
    </div>
</div>
<?php if (!empty($_smarty_tpl->tpl_vars['installments']->value)) {?>
    <div class="row">
        <div class="col-md-12 table-responsive">
            <table class="table table-bordered table-hover datatable">
                <thead>
                <tr>
                    <th>Número</th>
                    <th>Valor</th>
                    <th>Vencimento</th>
                    <th>Situação</th>
                    <th>Ação</th>
                </tr>
                </thead>
                <tbody>
                <?php
$_from = $_smarty_tpl->tpl_vars['installments']->value;
if (!is_array($_from) && !is_object($_from)) {
settype($_from, 'array');
}
$__foreach_installment_0_saved_item = isset($_smarty_tpl->tpl_vars['installment']) ? $_smarty_tpl->tpl_vars['installment'] : false;
$_smarty_tpl->tpl_vars['installment'] = new Smarty_Variable();
$__foreach_installment_0_total = $_smarty_tpl->smarty->ext->_foreach->count($_from);
if ($__foreach_installment_0_total) {
foreach ($_from as $_smarty_tpl->tpl_vars['installment']->value) {
$__foreach_installment_0_saved_local_item = $_smarty_tpl->tpl_vars['installment'];
?>
                    <tr>
                        <td><?php echo $_smarty_tpl->tpl_vars['installment']->value->get('number');?>
</td>
                        <td>R$<?php echo $_smarty_tpl->tpl_vars['installment']->value->get('value',true);?>
</td>
                        <td><?php echo $_smarty_tpl->tpl_vars['installment']->value->get('expiry',true);?>
</td>
                        <td align="center">
                            <?php if ($_smarty_tpl->tpl_vars['installment']->value->get('status')) {?>
                                <i class="fa fa-circle" style="color: #7AFF88"></i>
                            <?php } else { ?>
                                <i class="fa fa-circle" style="color: #FF6671!important"></i>
                            <?php }?>
                        </td>
                        <td align="center">
                            <a href="/project/deleteInstallment/<?php echo $_smarty_tpl->tpl_vars['installment']->value->get('id');?>
" class="confirm-link">
                                <button title="Deletar" class="btn btn-default btn-danger">
                                    <i class="fa fa-remove"></i>
                                </button>
                            </a>

                            <a href="/project/editInstallment/<?php echo $_smarty_tpl->tpl_vars['installment']->value->get('id');?>
">
                                <button title="Editar" class="btn btn-default btn-primary">
                                    <i class="fa fa-edit"></i>
                                </button>
                            </a>
                        </td>
                    </tr>
                <?php
$_smarty_tpl->tpl_vars['installment'] = $__foreach_installment_0_saved_local_item;
}
}
if ($__foreach_installment_0_saved_item) {
$_smarty_tpl->tpl_vars['installment'] = $__foreach_installment_0_saved_item;
}
?>
                </tbody>
            </table>
        </div>
    </div>
<?php }?>

<div class="row">
    <div class="col-sm-offset-4 col-sm-4">
        <a href="/project/edit/<?php echo $_smarty_tpl->tpl_vars['project']->value->get('id');?>
">
            <button class="btn btn-success btn-lg btn-block">
                Editar
            </button>
        </a>
    </div>
</div>
<?php }
}
