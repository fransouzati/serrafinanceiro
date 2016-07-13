<?php
/* Smarty version 3.1.28, created on 2016-07-08 16:21:53
  from "C:\xampp\htdocs\serra\financeiro\app\viewer\ExtraCharge\add.tpl" */

if ($_smarty_tpl->smarty->ext->_validateCompiled->decodeProperties($_smarty_tpl, array (
  'has_nocache_code' => false,
  'version' => '3.1.28',
  'unifunc' => 'content_577ffd51a567a1_05534939',
  'file_dependency' => 
  array (
    'f35c4ac4671029c01bf3eba47763ebea54ad89d8' => 
    array (
      0 => 'C:\\xampp\\htdocs\\serra\\financeiro\\app\\viewer\\ExtraCharge\\add.tpl',
      1 => 1468005514,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_577ffd51a567a1_05534939 ($_smarty_tpl) {
?>
<form action="extraCharge/add/<?php echo $_smarty_tpl->tpl_vars['id_client']->value;?>
" method="post">
    <div class="row">
        <div class="col-sm-4 form-group">
            <label for="date" class="control-label">Data</label>
            <input required type="text" class="form-control mask-date" name="date">
        </div>

        <div class="col-sm-4 form-group">
            <label for="value" class="control-label">Valor</label>
            <input required class="form-control mask-money" name="value" type="text">
        </div>

        <div class="col-sm-4 form-group">
            <label for="expiry" class="control-label">Validade</label>
            <input required class="form-control mask-date" name="expiry" type="text">
        </div>
    </div>

    <div class="row">
        <div class="col-sm-12 form-group">
            <label class="control-label radio-inline" for="status">
                <input required type="radio" value="0" name="status" checked> Cobrança com pagamento pendente
            </label>
            <label class="control-label radio-inline" for="status">
                <input required type="radio" value="1" name="status"> Cobrança já foi paga
            </label>
        </div>
    </div>

    <div class="row">
        <div class="col-sm-12 form-group">
            <label for="description" class="control-label">Descrição</label>
            <textarea name="description" class="form-control"></textarea>
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
