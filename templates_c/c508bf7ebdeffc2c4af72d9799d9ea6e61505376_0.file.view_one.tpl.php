<?php
/* Smarty version 3.1.28, created on 2016-07-20 10:18:31
  from "C:\wamp\www\financeiro3\app\viewer\Client\view_one.tpl" */

if ($_smarty_tpl->smarty->ext->_validateCompiled->decodeProperties($_smarty_tpl, array (
  'has_nocache_code' => false,
  'version' => '3.1.28',
  'unifunc' => 'content_578f7a27508646_48221197',
  'file_dependency' => 
  array (
    'c508bf7ebdeffc2c4af72d9799d9ea6e61505376' => 
    array (
      0 => 'C:\\wamp\\www\\financeiro3\\app\\viewer\\Client\\view_one.tpl',
      1 => 1468863899,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_578f7a27508646_48221197 ($_smarty_tpl) {
?>
<ul class="nav nav-tabs">
    <li class="active">
        <a data-toggle="tab" href="#clientData">Dados do cliente</a>
    </li>
    <li>
        <a data-toggle="tab" href="#financesData">Dados financeiros</a>
    </li>
    <li>
        <a data-toggle="tab" href="#projectsData">Projetos</a>
    </li>
    <li>
        <a data-toggle="tab" href="#extraChargesData">Cobranças extras</a>
    </li>
</ul>

<div class="tab-content">
    <div id="clientData" class="tab-pane fade in active">
        <div class="row">
            <div class="col-sm-12">
                <h3 class="page-header">Dados do cliente</h3>
            </div>
        </div>
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
                <input disabled type="text" class="form-control mask-phone" name="phone1"
                       value="<?php echo $_smarty_tpl->tpl_vars['client']->value->get('phone1');?>
">
            </div>
            <div class="col-sm-6 form-group">
                <label class="control-label" for="phone2">Telefone 2</label>
                <input disabled type="text" class="form-control mask-phone" name="phone2"
                       value="<?php echo $_smarty_tpl->tpl_vars['client']->value->get('phone2');?>
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
                <input disabled type="text" class="form-control mask-date" name="since"
                       value="<?php echo $_smarty_tpl->tpl_vars['client']->value->get('since',true);?>
">
            </div>
        </div>
        <div class="row">
            <div class="col-sm-6 form-group">
                <label class="control-label" for="responsible">Responsável</label>
                <input disabled type="text" class="form-control" name="responsible"
                       value="<?php echo $_smarty_tpl->tpl_vars['client']->value->get('responsible');?>
">
            </div>
            <div class="col-sm-6 form-group">
                <label class="control-label" for="responsible_cpf">CPF Responsável</label>
                <input disabled type="text" class="form-control mask-cpf" name="responsible_cpf"
                       value="<?php echo $_smarty_tpl->tpl_vars['client']->value->get('responsible_cpf');?>
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
    </div>

    <div id="financesData" class="tab-pane fade in">
        <!-- Dados financeiros !-->
        <div class="row">
            <div class="col-sm-12">
                <h3 class="page-header">Dados financeiros</h3>
            </div>
        </div>
        <div class="row">
            <div class="col-sm-6 form-group">
                <label class="control-label" for="monthly_value">Suporte mensal</label>
                <input disabled type="text" class="form-control mask-money" name="monthly_value"
                       value="R$<?php echo $_smarty_tpl->tpl_vars['finances']->value->get('monthly_value',true);?>
">
            </div>
            <div class="col-sm-6 form-group">
                <label class="control-label" for="payment_day">Dia de pagamento</label>
                <input disabled type="number" class="form-control" name="payment_day"
                       value="<?php echo $_smarty_tpl->tpl_vars['finances']->value->get('payment_day');?>
">
            </div>
        </div>
        <div class="row mt">
            <div class="col-sm-12 form-group checkbox-inline">
                <label for="status" class="control-label">Situação: </label>
                <br>
                <div class="switch switch-square"
                     data-on-label="<i class=' fa fa-check'></i>"
                     data-off-label="<i class='fa fa-times'></i>">
                    <?php if ($_smarty_tpl->tpl_vars['finances']->value->get('status')) {?>
                        <input disabled type="checkbox" checked/>
                    <?php } else { ?>
                        <input disabled type="checkbox"/>
                    <?php }?>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-sm-12 text-center">
                <label class="control-label" for="observation_finances">Observações financeiras</label>
                <textarea disabled name="observation_finances"
                          class="form-control"><?php echo $_smarty_tpl->tpl_vars['finances']->value->get('observation');?>
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
                    <table class="table table-bordered table-hover datatable" default-quantity="5">
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
        <?php } else { ?>
            <br>
        <?php }?>
    </div>

    <div id="projectsData" class="tab-pane fade in">
        <!-- Projects !-->
        <?php if (!empty($_smarty_tpl->tpl_vars['projects']->value)) {?>
            <div class="row">
                <div class="col-sm-12">
                    <h3 class="page-header">Projetos</h3>
                </div>
            </div>
            <div class="row">
                <div class="col-md-12 table-responsive">
                    <table class="table table-bordered table-hover datatable" default-quantity="5">
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
                                <?php $_smarty_tpl->tpl_vars["clientName"] = new Smarty_Variable("-", null);
$_smarty_tpl->ext->_updateScope->updateScope($_smarty_tpl, "clientName", 0);?>
                            <?php } else { ?>
                                <?php $_smarty_tpl->tpl_vars["clientName"] = new Smarty_Variable($_smarty_tpl->tpl_vars['project']->value->get('id_client',true)->get('name'), null);
$_smarty_tpl->ext->_updateScope->updateScope($_smarty_tpl, "clientName", 0);?>
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
                                    <a href="project/view/<?php echo $_smarty_tpl->tpl_vars['project']->value->get('id');?>
">
                                        <?php echo $_smarty_tpl->tpl_vars['project']->value->get('name');?>

                                    </a>
                                </td>
                                <td><?php echo $_smarty_tpl->tpl_vars['clientName']->value;?>
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
                                        <i class="fa fa-circle" style="color: #FF6671!important"></i>
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
            </div>
        <?php } else { ?>
            <br>
        <?php }?>
    </div>

    <div id="extraChargesData" class="tab-pane fade in">
        <!-- Extra charges !-->
        <div class="row">
            <div class="col-sm-12">
                <h3 class="page-header">Cobranças extras</h3>
            </div>
        </div>
        <div class="row">
            <div class="col-sm-12">
                <a href="extraCharge/add/<?php echo $_smarty_tpl->tpl_vars['client']->value->get('id');?>
">
                    <button type="button" class="btn btn-primary">
                        Cadastrar cobrança extra
                    </button>
                </a>
                <hr>
            </div>
        </div>
        <?php if (!empty($_smarty_tpl->tpl_vars['extras']->value)) {?>
            <div class="row">
                <div class="col-md-12 table-responsive">
                    <table class="table table-bordered table-hover datatable" default-quantity="5">
                        <thead>
                        <tr>
                            <th>Data</th>
                            <th>Valor</th>
                            <th>Descrição</th>
                            <th>Validade</th>
                            <th>Estado</th>
                            <th>Ações</th>
                        </tr>
                        </thead>
                        <tbody>
                        <?php
$_from = $_smarty_tpl->tpl_vars['extras']->value;
if (!is_array($_from) && !is_object($_from)) {
settype($_from, 'array');
}
$__foreach_extra_2_saved_item = isset($_smarty_tpl->tpl_vars['extra']) ? $_smarty_tpl->tpl_vars['extra'] : false;
$_smarty_tpl->tpl_vars['extra'] = new Smarty_Variable();
$__foreach_extra_2_total = $_smarty_tpl->smarty->ext->_foreach->count($_from);
if ($__foreach_extra_2_total) {
foreach ($_from as $_smarty_tpl->tpl_vars['extra']->value) {
$__foreach_extra_2_saved_local_item = $_smarty_tpl->tpl_vars['extra'];
?>
                            <tr>
                                <td><?php echo $_smarty_tpl->tpl_vars['extra']->value->get('date',true);?>
</td>
                                <td>R$<?php echo $_smarty_tpl->tpl_vars['extra']->value->get('value',true);?>
</td>
                                <td><?php echo $_smarty_tpl->tpl_vars['extra']->value->get('description');?>
</td>
                                <td><?php echo $_smarty_tpl->tpl_vars['extra']->value->get('expiry',true);?>
</td>
                                <td>
                                    <?php if ($_smarty_tpl->tpl_vars['extra']->value->get('status')) {?>
                                        <i class="fa fa-circle" style="color: #7AFF88"></i>
                                    <?php } else { ?>
                                        <i class="fa fa-circle" style="color: #FF6671!important"></i>
                                    <?php }?>
                                </td>
                                <td>
                                    <?php if (!$_smarty_tpl->tpl_vars['extra']->value->get('status')) {?>
                                        <a href="extraCharge/pay/<?php echo $_smarty_tpl->tpl_vars['extra']->value->get('id');?>
" class="confirm-link">
                                            <button type="button" class="btn btn-success" title="Pagar">
                                                <i class="fa fa-dollar"></i>
                                            </button>
                                        </a>
                                    <?php }?>
                                    <a href="extraCharge/delete/<?php echo $_smarty_tpl->tpl_vars['extra']->value->get('id');?>
" class="confirm-link">
                                        <button type="button" class="btn btn-danger" title="Remover">
                                            <i class="fa fa-remove"></i>
                                        </button>
                                    </a>
                                </td>
                            </tr>
                        <?php
$_smarty_tpl->tpl_vars['extra'] = $__foreach_extra_2_saved_local_item;
}
}
if ($__foreach_extra_2_saved_item) {
$_smarty_tpl->tpl_vars['extra'] = $__foreach_extra_2_saved_item;
}
?>
                        </tbody>
                    </table>
                </div>
            </div>
        <?php } else { ?>
            <br>
        <?php }?>
    </div>
</div>

<div class="row">
    <div class="col-sm-offset-4 col-sm-4">
        <a href="client/edit/<?php echo $_smarty_tpl->tpl_vars['client']->value->get('id');?>
">
            <button class="btn btn-success btn-lg btn-block">
                Editar cliente
            </button>
        </a>
    </div>
</div><?php }
}
