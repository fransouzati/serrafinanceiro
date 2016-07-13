<?php
/* Smarty version 3.1.28, created on 2016-06-22 19:04:46
  from "C:\wamp\www\financeiro3\app\viewer\Project\edit.tpl" */

if ($_smarty_tpl->smarty->ext->_validateCompiled->decodeProperties($_smarty_tpl, array (
  'has_nocache_code' => false,
  'version' => '3.1.28',
  'unifunc' => 'content_576ac52e3bb722_81843882',
  'file_dependency' => 
  array (
    '1bcde8633b071ef9965c7c0255f8cf629b12c788' => 
    array (
      0 => 'C:\\wamp\\www\\financeiro3\\app\\viewer\\Project\\edit.tpl',
      1 => 1466615074,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_576ac52e3bb722_81843882 ($_smarty_tpl) {
?>
<div clas="row">
    <div class="col-sm-12">
        <i class="fa fa-arrow-left"></i>
        <a href="/project/view/<?php echo $_smarty_tpl->tpl_vars['project']->value->get('id');?>
">
            Voltar para <?php echo $_smarty_tpl->tpl_vars['project']->value->get('name');?>

        </a>
        <hr>
    </div>
</div>

<form action="project/edit/<?php echo $_smarty_tpl->tpl_vars['project']->value->get('id');?>
" method="post">
    <div class="row">
        <div class="col-sm-6 form-group">
            <label class="control-label" for="name">Nome</label>
            <input required type="text" class="form-control" name="name" value="<?php echo $_smarty_tpl->tpl_vars['project']->value->get('name');?>
">
        </div>
        <div class="col-sm-6 form-group">
            <label class="control-label" for="id_client">Cliente</label>
            <select name="id_client" class="form-control select2">
                <option value="">Nenhum</option>
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
                    <?php if ($_smarty_tpl->tpl_vars['client']->value->get('id') == $_smarty_tpl->tpl_vars['project']->value->get('id_client')) {?>
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
    </div>
    <div class="row">
        <div class="col-sm-6 form-group">
            <label class="control-label" for="value">Valor</label>
            <input type="text" class="form-control mask-money" name="value"
                   value="R$<?php echo $_smarty_tpl->tpl_vars['project']->value->get('value',true);?>
">
        </div>
        <div class="col-sm-6 form-group">
            <label class="control-label" for="executor">Executor</label>
            <input type="text" class="form-control" name="executor" value="<?php echo $_smarty_tpl->tpl_vars['project']->value->get('executor');?>
">
        </div>
    </div>
    <div class="row">
        <div class="col-sm-6 form-group">
            <label class="control-label" for="initial_date">Data início</label>
            <input type="date" class="form-control mask-date" name="initial_date"
                   value="<?php echo $_smarty_tpl->tpl_vars['project']->value->get('initial_date');?>
">
        </div>
        <div class="col-sm-6 form-group">
            <label class="control-label" for="end_date">Data fim</label>
            <input type="date" class="form-control mask-date" name="end_date" value="<?php echo $_smarty_tpl->tpl_vars['project']->value->get('end_date');?>
">
        </div>
    </div>
    <div class="row">
        <div class="col-sm-12 form-group">
            <label class="control-label" for="observation">Observações</label>
            <textarea name="observation" class="form-control"><?php echo $_smarty_tpl->tpl_vars['project']->value->get('observation');?>
</textarea>
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
