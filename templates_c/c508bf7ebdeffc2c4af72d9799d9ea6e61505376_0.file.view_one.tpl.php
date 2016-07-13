<?php
/* Smarty version 3.1.28, created on 2016-06-30 14:28:48
  from "C:\wamp\www\financeiro3\app\viewer\Client\view_one.tpl" */

if ($_smarty_tpl->smarty->ext->_validateCompiled->decodeProperties($_smarty_tpl, array (
  'has_nocache_code' => false,
  'version' => '3.1.28',
  'unifunc' => 'content_577556d0c5b187_99856025',
  'file_dependency' => 
  array (
    'c508bf7ebdeffc2c4af72d9799d9ea6e61505376' => 
    array (
      0 => 'C:\\wamp\\www\\financeiro3\\app\\viewer\\Client\\view_one.tpl',
      1 => 1467290715,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_577556d0c5b187_99856025 ($_smarty_tpl) {
?>

<div class="row">
    <div class="col-sm-6 form-group">
        <label class="control-label" for="name">Nome</label>
        <input disabled type="text" class="form-control" name="name" value="<?php echo $_smarty_tpl->tpl_vars['client']->value->get('name');?>
">
    </div>
    <div class="col-sm-6 form-group">
        <label class="control-label" for="cpf_cnpj">CPF/CNPJ</label>
        <input disabled type="text" class="form-control" name="cpf_cnpj" value="<?php echo $_smarty_tpl->tpl_vars['client']->value->get('cpf_cnpj');?>
">
    </div>
</div>
<div class="row">
    <div class="col-sm-6 form-group">
        <label class="control-label" for="email1">Email 1</label>
        <input disabled type="email" class="form-control" name="email1" value="<?php echo $_smarty_tpl->tpl_vars['client']->value->get('email1');?>
">
    </div>
    <div class="col-sm-6 form-group">
        <label class="control-label" for="email2">Email 2</label>
        <input disabled type="email" class="form-control" name="email2" value="<?php echo $_smarty_tpl->tpl_vars['client']->value->get('email2');?>
">
    </div>
</div>
<div class="row">
    <div class="col-sm-6 form-group">
        <label class="control-label" for="phone1">Telefone 1</label>
        <input disabled type="text" class="form-control mask-phone" name="phone1" value="<?php echo $_smarty_tpl->tpl_vars['client']->value->get('phone1');?>
">
    </div>
    <div class="col-sm-6 form-group">
        <label class="control-label" for="phone2">Telefone 2</label>
        <input disabled type="text" class="form-control mask-phone" name="phone2" value="<?php echo $_smarty_tpl->tpl_vars['client']->value->get('phone2');?>
">
    </div>
</div>
<div class="row">
    <div class="col-sm-6 form-group">
        <label class="control-label" for="site">Site</label>
        <input disabled type="text" class="form-control" name="site" value="<?php echo $_smarty_tpl->tpl_vars['client']->value->get('site');?>
">
    </div>
    <div class="col-sm-6 form-group">
        <label class="control-label" for="since">Cliente desde</label>
        <input disabled type="text" class="form-control mask-date" name="since" value="<?php echo $_smarty_tpl->tpl_vars['client']->value->get('since');?>
">
    </div>
</div>
<div class="row">
    <div class="col-sm-6 form-group">
        <label class="control-label" for="responsible">Responsável</label>
        <input disabled type="text" class="form-control" name="responsible" value="<?php echo $_smarty_tpl->tpl_vars['client']->value->get('responsible');?>
">
    </div>
    <div class="col-sm-6 form-group">
        <label class="control-label" for="responsible_cpf">CPF Responsável</label>
        <input disabled type="text" class="form-control mask-cpf" name="responsible_cpf" value="<?php echo $_smarty_tpl->tpl_vars['client']->value->get('responsible_cpf');?>
">
    </div>
</div>
<div class="row">
    <div class="col-sm-12 form-group">
        <label class="control-label" for="address">Endereço</label>
        <input disabled type="text" class="form-control" name="address" value="<?php echo $_smarty_tpl->tpl_vars['client']->value->get('address');?>
">
    </div>
</div>
<div class="row">
    <div class="col-sm-12 form-group">
        <label class="control-label" for="observation">Observações</label>
        <textarea disabled name="observation" class="form-control"><?php echo $_smarty_tpl->tpl_vars['client']->value->get('observation');?>
</textarea>
    </div>
</div>
<div class="row">
    <div class="col-sm-12 form-group">
        <?php if ($_smarty_tpl->tpl_vars['client']->value->get('status')) {?>
            <?php $_smarty_tpl->tpl_vars["ativo"] = new Smarty_Variable("checked", null);
$_smarty_tpl->ext->_updateScope->updateScope($_smarty_tpl, "ativo", 0);?>
            <?php $_smarty_tpl->tpl_vars["inativo"] = new Smarty_Variable('', null);
$_smarty_tpl->ext->_updateScope->updateScope($_smarty_tpl, "inativo", 0);?>
        <?php } else { ?>
            <?php $_smarty_tpl->tpl_vars["inativo"] = new Smarty_Variable("checked", null);
$_smarty_tpl->ext->_updateScope->updateScope($_smarty_tpl, "inativo", 0);?>
            <?php $_smarty_tpl->tpl_vars["ativo"] = new Smarty_Variable('', null);
$_smarty_tpl->ext->_updateScope->updateScope($_smarty_tpl, "ativo", 0);?>
        <?php }?>
        <label class="control-label radio-inline" for="status">
            <input disabled type="radio" value="1" name="status" <?php echo $_smarty_tpl->tpl_vars['ativo']->value;?>
> Ativo
        </label>
        <label class="control-label radio-inline" for="status">
            <input disabled type="radio" value="0" name="status" <?php echo $_smarty_tpl->tpl_vars['inativo']->value;?>
> Inativo
        </label>
    </div>
</div>

<!-- Dados financeiros !-->
<div class="row">
    <div class="col-sm-12">
        <h3 class="page-header">Financeiro</h3>
    </div>
</div>
<div class="row">
    <div class="col-sm-12 form-group">
        <label class="control-label" for="monthly_value">Suporte mensal</label>
        <input disabled type="text" class="form-control mask-money" name="monthly_value" value="R$<?php echo $_smarty_tpl->tpl_vars['finances']->value->get('monthly_value',true);?>
">
    </div>
</div>
<div class="row mt">
    <div class="col-sm-12 form-group checkbox-inline">
        <label for="status" class="control-label">Situação: </label>
        <br>
        <a href="/finances/check/<?php echo $_smarty_tpl->tpl_vars['client']->value->get('id');?>
">
            <div class="switch switch-square"
                 data-on-label="<i class=' fa fa-check'></i>"
                 data-off-label="<i class='fa fa-times'></i>">
                <?php if ($_smarty_tpl->tpl_vars['finances']->value->get('status')) {?>
                    <input disabled type="checkbox" checked/>
                <?php } else { ?>

                    <input disabled type="checkbox"/>
                <?php }?>
            </div>
        </a>
    </div>
</div>
<div class="row">
    <div class="col-sm-12 text-center">
        <label class="control-label" for="observation_finances">Observações financeiras</label>
        <textarea disabled name="observation_finances" class="form-control"><?php echo $_smarty_tpl->tpl_vars['finances']->value->get('observation');?>
</textarea>
    </div>
</div>
<?php if (!empty($_smarty_tpl->tpl_vars['histories']->value)) {?>
    <div class="row">
        <div class="col-sm-12">
            <h4 class="page-header">Histórico financeiro</h4>
        </div>
    </div>
    <div class="row">
        <div class="col-md-12 table-responsive">
            <table class="table table-bordered table-hover datatable">
                <thead>
                <tr>
                    <th>Data</th>
                    <th>Alteração</th>
                </tr>
                </thead>
                <tbody>
                    <?php
$_from = $_smarty_tpl->tpl_vars['histories']->value;
if (!is_array($_from) && !is_object($_from)) {
settype($_from, 'array');
}
$__foreach_history_0_saved_item = isset($_smarty_tpl->tpl_vars['history']) ? $_smarty_tpl->tpl_vars['history'] : false;
$_smarty_tpl->tpl_vars['history'] = new Smarty_Variable();
$__foreach_history_0_total = $_smarty_tpl->smarty->ext->_foreach->count($_from);
if ($__foreach_history_0_total) {
foreach ($_from as $_smarty_tpl->tpl_vars['history']->value) {
$__foreach_history_0_saved_local_item = $_smarty_tpl->tpl_vars['history'];
?>
                        <tr>
                            <td><?php echo $_smarty_tpl->tpl_vars['history']->value->get('date',true);?>
</td>
                            <td><?php echo $_smarty_tpl->tpl_vars['history']->value->get('description');?>
</td>
                        </tr>
                    <?php
$_smarty_tpl->tpl_vars['history'] = $__foreach_history_0_saved_local_item;
}
}
if ($__foreach_history_0_saved_item) {
$_smarty_tpl->tpl_vars['history'] = $__foreach_history_0_saved_item;
}
?>
                </tbody>
            </table>
        </div>
    </div>
<?php }?>

<div class="row">
    <div class="col-sm-offset-4 col-sm-4">
        <a href="/client/edit/<?php echo $_smarty_tpl->tpl_vars['client']->value->get('id');?>
">
            <button class="btn btn-success btn-lg btn-block">
                Editar
            </button>
        </a>
    </div>
</div>
<?php }
}
