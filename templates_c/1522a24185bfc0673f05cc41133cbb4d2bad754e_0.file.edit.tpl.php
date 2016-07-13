<?php
/* Smarty version 3.1.28, created on 2016-07-06 16:55:52
  from "C:\wamp\www\financeiro3\app\viewer\Client\edit.tpl" */

if ($_smarty_tpl->smarty->ext->_validateCompiled->decodeProperties($_smarty_tpl, array (
  'has_nocache_code' => false,
  'version' => '3.1.28',
  'unifunc' => 'content_577d6248306935_02932395',
  'file_dependency' => 
  array (
    '1522a24185bfc0673f05cc41133cbb4d2bad754e' => 
    array (
      0 => 'C:\\wamp\\www\\financeiro3\\app\\viewer\\Client\\edit.tpl',
      1 => 1467834950,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_577d6248306935_02932395 ($_smarty_tpl) {
?>
<div clas="row">
    <div class="col-sm-12">
        <i class="fa fa-arrow-left"></i>
        <a href="/client/view/<?php echo $_smarty_tpl->tpl_vars['client']->value->get('id');?>
">
            Voltar para perfil de <?php echo $_smarty_tpl->tpl_vars['client']->value->get('name');?>

        </a>
        <hr>
    </div>
</div>

<form action="client/edit/<?php echo $_smarty_tpl->tpl_vars['client']->value->get('id');?>
" method="post">
    <div class="row">
        <div class="col-sm-6 form-group">
            <label class="control-label" for="name">Nome</label>
            <input required type="text" class="form-control" name="name" value="<?php echo $_smarty_tpl->tpl_vars['client']->value->get('name');?>
">
        </div>
        <div class="col-sm-6 form-group">
            <label class="control-label" for="cpf_cnpj">CPF/CNPJ</label>
            <input type="text" class="form-control" name="cpf_cnpj" value="<?php echo $_smarty_tpl->tpl_vars['client']->value->get('cpf_cnpj');?>
">
        </div>
    </div>
    <div class="row">
        <div class="col-sm-6 form-group">
            <label class="control-label" for="email1">Email 1</label>
            <input type="email" class="form-control" name="email1" value="<?php echo $_smarty_tpl->tpl_vars['client']->value->get('email1');?>
">
        </div>
        <div class="col-sm-6 form-group">
            <label class="control-label" for="email2">Email 2</label>
            <input type="email" class="form-control" name="email2" value="<?php echo $_smarty_tpl->tpl_vars['client']->value->get('email2');?>
">
        </div>
    </div>
    <div class="row">
        <div class="col-sm-6 form-group">
            <label class="control-label" for="phone1">Telefone 1</label>
            <input type="text" class="form-control mask-phone" name="phone1" value="<?php echo $_smarty_tpl->tpl_vars['client']->value->get('phone1');?>
">
        </div>
        <div class="col-sm-6 form-group">
            <label class="control-label" for="phone2">Telefone 2</label>
            <input type="text" class="form-control mask-phone" name="phone2" value="<?php echo $_smarty_tpl->tpl_vars['client']->value->get('phone2');?>
">
        </div>
    </div>
    <div class="row">
        <div class="col-sm-6 form-group">
            <label class="control-label" for="site">Site</label>
            <input type="text" class="form-control" name="site" value="<?php echo $_smarty_tpl->tpl_vars['client']->value->get('site');?>
">
        </div>
        <div class="col-sm-6 form-group">
            <label class="control-label" for="since">Cliente desde</label>
            <input type="text" class="form-control mask-date" name="since" value="<?php echo $_smarty_tpl->tpl_vars['client']->value->get('since');?>
">
        </div>
    </div>
    <div class="row">
        <div class="col-sm-6 form-group">
            <label class="control-label" for="responsible">Responsável</label>
            <input type="text" class="form-control" name="responsible" value="<?php echo $_smarty_tpl->tpl_vars['client']->value->get('responsible');?>
">
        </div>
        <div class="col-sm-6 form-group">
            <label class="control-label" for="responsible_cpf">CPF Responsável</label>
            <input type="text" class="form-control mask-cpf" name="responsible_cpf" value="<?php echo $_smarty_tpl->tpl_vars['client']->value->get('responsible_cpf');?>
">
        </div>
    </div>
    <div class="row">
        <div class="col-sm-12 form-group">
            <label class="control-label" for="address">Endereço</label>
            <input type="text" class="form-control" name="address" value="<?php echo $_smarty_tpl->tpl_vars['client']->value->get('address');?>
">
        </div>
    </div>
    <div class="row">
        <div class="col-sm-12 form-group">
            <label class="control-label" for="observation">Observações</label>
            <textarea name="observation" class="form-control"><?php echo $_smarty_tpl->tpl_vars['client']->value->get('observation');?>
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
                <input type="radio" value="1" name="status" <?php echo $_smarty_tpl->tpl_vars['ativo']->value;?>
> Ativo
            </label>
            <label class="control-label radio-inline" for="status">
                <input type="radio" value="0" name="status" <?php echo $_smarty_tpl->tpl_vars['inativo']->value;?>
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
            <input type="text" class="form-control mask-money" name="monthly_value" value="R$<?php echo $_smarty_tpl->tpl_vars['finances']->value->get('monthly_value',true);?>
">
        </div>
    </div>
    <div class="row">
        <div class="col-sm-12 form-group">
            <label class="control-label" for="observation_finances">Observações financeiras</label>
            <textarea name="observation_finances" class="form-control"><?php echo $_smarty_tpl->tpl_vars['finances']->value->get('observation');?>
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
