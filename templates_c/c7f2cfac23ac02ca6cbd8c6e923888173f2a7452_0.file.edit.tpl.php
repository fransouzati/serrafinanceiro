<?php
/* Smarty version 3.1.28, created on 2016-06-10 16:24:14
  from "C:\wamp\www\financeiro3\app\viewer\User\edit.tpl" */

if ($_smarty_tpl->smarty->ext->_validateCompiled->decodeProperties($_smarty_tpl, array (
  'has_nocache_code' => false,
  'version' => '3.1.28',
  'unifunc' => 'content_575acd8e9ab2d3_10401748',
  'file_dependency' => 
  array (
    'c7f2cfac23ac02ca6cbd8c6e923888173f2a7452' => 
    array (
      0 => 'C:\\wamp\\www\\financeiro3\\app\\viewer\\User\\edit.tpl',
      1 => 1465568647,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_575acd8e9ab2d3_10401748 ($_smarty_tpl) {
?>
<div clas="row">
    <div class="col-sm-12">
        <i class="fa fa-arrow-left"></i>
        <a href="/user/view/<?php echo $_smarty_tpl->tpl_vars['user']->value->get('id');?>
">
            Voltar para perfil de <?php echo $_smarty_tpl->tpl_vars['user']->value->get('name');?>

        </a>
        <hr>
    </div>
</div>

<form action="user/edit/<?php echo $_smarty_tpl->tpl_vars['user']->value->get('id');?>
" method="post">
    <div class="row">
        <div class="col-sm-6 form-group">
            <label class="control-label">Nome</label>
            <input type="text" class="form-control" name="name" value="<?php echo $_smarty_tpl->tpl_vars['user']->value->get('name');?>
">
        </div>
        <div class="col-sm-6 form-group">
            <label class="control-label">Email</label>
            <input type="email" class="form-control" name="email" value="<?php echo $_smarty_tpl->tpl_vars['user']->value->get('email');?>
">
        </div>
    </div>
    <div class="row">
        <div class="col-sm-offset-4 col-sm-4">
            <button class="btn btn-lg btn-success btn-block">
                Editar
            </button>
        </div>
    </div>
</form>
<?php }
}
