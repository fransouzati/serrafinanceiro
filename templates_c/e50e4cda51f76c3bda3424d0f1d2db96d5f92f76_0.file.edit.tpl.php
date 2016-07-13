<?php
/* Smarty version 3.1.28, created on 2016-05-10 20:43:35
  from "C:\xampp\htdocs\Clientes\prophet_admin\app\viewer\User\edit.tpl" */

if ($_smarty_tpl->smarty->ext->_validateCompiled->decodeProperties($_smarty_tpl, array (
  'has_nocache_code' => false,
  'version' => '3.1.28',
  'unifunc' => 'content_57322bd7c11030_80131883',
  'file_dependency' => 
  array (
    'e50e4cda51f76c3bda3424d0f1d2db96d5f92f76' => 
    array (
      0 => 'C:\\xampp\\htdocs\\Clientes\\prophet_admin\\app\\viewer\\User\\edit.tpl',
      1 => 1462905812,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_57322bd7c11030_80131883 ($_smarty_tpl) {
?>
<div clas="row">
    <div class="col-sm-12">
        <i class="fa fa-arrow-left"></i>
        <a href="/user/view/<?php echo $_smarty_tpl->tpl_vars['user']->value->get('id');?>
">
            Voltar para perfil de <?php echo $_smarty_tpl->tpl_vars['user']->value->get('name');?>

        </a>
        <hr>
        <form action="user/edit/<?php echo $_smarty_tpl->tpl_vars['user']->value->get('id');?>
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
