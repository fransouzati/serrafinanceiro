<?php
/* Smarty version 3.1.28, created on 2016-05-17 15:30:10
  from "C:\xampp\htdocs\Clientes\prophet_admin\app\viewer\Payment\view_one.tpl" */

if ($_smarty_tpl->smarty->ext->_validateCompiled->decodeProperties($_smarty_tpl, array (
  'has_nocache_code' => false,
  'version' => '3.1.28',
  'unifunc' => 'content_573b1ce223dea3_80469138',
  'file_dependency' => 
  array (
    '0f997bdcb42e75f00b54d18187c876187f279b13' => 
    array (
      0 => 'C:\\xampp\\htdocs\\Clientes\\prophet_admin\\app\\viewer\\Payment\\view_one.tpl',
      1 => 1463491807,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_573b1ce223dea3_80469138 ($_smarty_tpl) {
?>

    <div class="row">
        <div class="col-sm-12">
            <i class="fa fa-arrow-left"></i>
            <a href="/clinic/view/<?php echo $_smarty_tpl->tpl_vars['payment']->value->get('id_clinic');?>
">
                Voltar para <?php echo $_smarty_tpl->tpl_vars['payment']->value->get('id_clinic',true)->get('nomClinica');?>

            </a>
            <hr>
        </div>
    </div>
    <div class="row">
        <div class="col-sm-12">
            <?php echo $_smarty_tpl->tpl_vars['form']->value;?>

        </div>
    </div>
    <div class="row">
        <div class="col-sm-4 col-sm-offset-4">
            <a href="/payment/delete/<?php echo $_smarty_tpl->tpl_vars['payment']->value->get('id');?>
">
                <button class="btn btn-danger btn-lg btn-block">
                    Deletar
                </button>
            </a>
        </div>
    </div><?php }
}
