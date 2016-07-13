<?php
/* Smarty version 3.1.28, created on 2016-05-16 20:55:07
  from "C:\xampp\htdocs\Clientes\prophet_admin\app\viewer\Payment\add.tpl" */

if ($_smarty_tpl->smarty->ext->_validateCompiled->decodeProperties($_smarty_tpl, array (
  'has_nocache_code' => false,
  'version' => '3.1.28',
  'unifunc' => 'content_573a178bb07ea7_48163361',
  'file_dependency' => 
  array (
    'cdb9ff564327dfe529284ca64bd97f0e97378f95' => 
    array (
      0 => 'C:\\xampp\\htdocs\\Clientes\\prophet_admin\\app\\viewer\\Payment\\add.tpl',
      1 => 1463424906,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_573a178bb07ea7_48163361 ($_smarty_tpl) {
?>
<div clas="row">
    <div class="col-sm-12">
        <a href="/clinic/view/<?php echo $_smarty_tpl->tpl_vars['id_clinic']->value;?>
">
            Voltar para o perfil da clínica
        </a>
        <i class="fa fa-arrow-left"></i>
        <hr>
        <form action="payment/add/<?php echo $_smarty_tpl->tpl_vars['id_clinic']->value;?>
" method="post">
            <?php echo $_smarty_tpl->tpl_vars['form']->value;?>

            <div class="col-sm-offset-4 col-sm-4">
                <button class="btn btn-lg btn-success btn-block">
                    Registrar pagamento
                </button>
            </div>
        </form>
    </div>
</div>
<?php }
}
