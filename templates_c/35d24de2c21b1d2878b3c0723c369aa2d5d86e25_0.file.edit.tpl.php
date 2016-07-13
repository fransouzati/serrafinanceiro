<?php
/* Smarty version 3.1.28, created on 2016-05-11 04:12:06
  from "C:\xampp\htdocs\Clientes\prophet_admin\app\viewer\Clinic\edit.tpl" */

if ($_smarty_tpl->smarty->ext->_validateCompiled->decodeProperties($_smarty_tpl, array (
  'has_nocache_code' => false,
  'version' => '3.1.28',
  'unifunc' => 'content_573294f6908d80_01249637',
  'file_dependency' => 
  array (
    '35d24de2c21b1d2878b3c0723c369aa2d5d86e25' => 
    array (
      0 => 'C:\\xampp\\htdocs\\Clientes\\prophet_admin\\app\\viewer\\Clinic\\edit.tpl',
      1 => 1462932722,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_573294f6908d80_01249637 ($_smarty_tpl) {
?>
<div clas="row">
    <div class="col-sm-12">
        <i class="fa fa-arrow-left"></i>
        <a href="/clinic/view/<?php echo $_smarty_tpl->tpl_vars['clinic']->value->get('cdnClinica');?>
">
            Voltar para <?php echo $_smarty_tpl->tpl_vars['clinic']->value->get('nomClinica');?>

        </a>
        <hr>
        <form action="clinic/edit/<?php echo $_smarty_tpl->tpl_vars['clinic']->value->get('cdnClinica');?>
" method="post">
            <?php echo $_smarty_tpl->tpl_vars['form']->value;?>

            <div class="col-sm-offset-4 col-sm-4">
                <button class="btn btn-lg btn-success btn-block">
                    Editar
                </button>
            </div>
        </form>
    </div>
</div>
<?php }
}
