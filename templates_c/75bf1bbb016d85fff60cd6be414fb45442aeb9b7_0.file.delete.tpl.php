<?php
/* Smarty version 3.1.28, created on 2016-05-17 15:35:35
  from "C:\xampp\htdocs\Clientes\prophet_admin\app\viewer\Payment\delete.tpl" */

if ($_smarty_tpl->smarty->ext->_validateCompiled->decodeProperties($_smarty_tpl, array (
  'has_nocache_code' => false,
  'version' => '3.1.28',
  'unifunc' => 'content_573b1e2729a115_97893093',
  'file_dependency' => 
  array (
    '75bf1bbb016d85fff60cd6be414fb45442aeb9b7' => 
    array (
      0 => 'C:\\xampp\\htdocs\\Clientes\\prophet_admin\\app\\viewer\\Payment\\delete.tpl',
      1 => 1463492132,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_573b1e2729a115_97893093 ($_smarty_tpl) {
?>
<div class="row">
    <div class="col-sm-12">
        <h3>Tem certeza que deseja deletar este pagamento?</h3>
    </div>
</div>
<div class="row">
    <div class="col-sm-4 col-sm-offset-2">
        <a href="/payment/delete/<?php echo $_smarty_tpl->tpl_vars['id']->value;?>
/1">
            <button class="btn btn-danger btn-block btn-lg">
                Sim
            </button>
        </a>
    </div>
    <div class="col-sm-4">
        <a href="/payment/view/<?php echo $_smarty_tpl->tpl_vars['id']->value;?>
/0">
            <button class="btn btn-success btn-block btn-lg">
                Não
            </button>
        </a>
    </div>
</div><?php }
}
