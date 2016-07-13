<?php
/* Smarty version 3.1.28, created on 2016-06-30 14:32:42
  from "C:\wamp\www\financeiro3\app\viewer\Client\add.tpl" */

if ($_smarty_tpl->smarty->ext->_validateCompiled->decodeProperties($_smarty_tpl, array (
  'has_nocache_code' => false,
  'version' => '3.1.28',
  'unifunc' => 'content_577557baaef540_72967455',
  'file_dependency' => 
  array (
    '6f7d4d4ba0015a4e7096337c89aa7030319dd4ef' => 
    array (
      0 => 'C:\\wamp\\www\\financeiro3\\app\\viewer\\Client\\add.tpl',
      1 => 1467290715,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_577557baaef540_72967455 ($_smarty_tpl) {
?>
<form action="client/add" method="post">
    <div class="row">
        <div class="col-sm-6 form-group">
            <label class="control-label" for="name">Nome</label>
            <input required type="text" class="form-control" name="name">
        </div>
        <div class="col-sm-6 form-group">
            <label class="control-label" for="cpf_cnpj">CPF/CNPJ</label>
            <input type="text" class="form-control" name="cpf_cnpj">
        </div>
    </div>
    <div class="row">
        <div class="col-sm-6 form-group">
            <label class="control-label" for="email1">Email 1</label>
            <input type="email" class="form-control" name="email1">
        </div>
        <div class="col-sm-6 form-group">
            <label class="control-label" for="email2">Email 2</label>
            <input type="email" class="form-control" name="email2">
        </div>
    </div>
    <div class="row">
        <div class="col-sm-6 form-group">
            <label class="control-label" for="phone1">Telefone 1</label>
            <input type="text" class="form-control mask-phone" name="phone1">
        </div>
        <div class="col-sm-6 form-group">
            <label class="control-label" for="phone2">Telefone 2</label>
            <input type="text" class="form-control mask-phone" name="phone2">
        </div>
    </div>
    <div class="row">
        <div class="col-sm-6 form-group">
            <label class="control-label" for="site">Site</label>
            <input type="text" class="form-control" name="site">
        </div>
        <div class="col-sm-6 form-group">
            <label class="control-label" for="since">Cliente desde</label>
            <input type="text" class="form-control mask-date" name="since">
        </div>
    </div>
    <div class="row">
        <div class="col-sm-6 form-group">
            <label class="control-label" for="responsible">Responsável</label>
            <input type="text" class="form-control" name="responsible">
        </div>
        <div class="col-sm-6 form-group">
            <label class="control-label" for="responsible_cpf">CPF Responsável</label>
            <input type="text" class="form-control mask-cpf" name="responsible_cpf">
        </div>
    </div>
    <div class="row">
        <div class="col-sm-12 form-group">
            <label class="control-label" for="address">Endereço</label>
            <input type="text" class="form-control" name="address">
        </div>
    </div>
    <div class="row">
        <div class="col-sm-12 form-group">
            <label class="control-label" for="observation">Observações</label>
            <textarea name="observation" class="form-control"></textarea>
        </div>
    </div>
    <div class="row">
        <div class="col-sm-12 form-group">
            <label class="control-label radio-inline" for="status">
                <input type="radio" value="1" name="status" checked> Ativo
            </label>
            <label class="control-label radio-inline" for="status">
                <input type="radio" value="0" name="status"> Inativo
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
            <input type="text" class="form-control mask-money" name="monthly_value">
        </div>
    </div>
    <div class="row">
        <div class="col-sm-12 form-group">
            <label class="control-label" for="observation_finances">Observações financeiras</label>
            <textarea name="observation_finances" class="form-control"></textarea>
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
