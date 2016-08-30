<?php
/* Smarty version 3.1.28, created on 2016-08-03 10:15:18
  from "C:\wamp\www\financeiro3\app\viewer\User\edit.tpl" */

if ($_smarty_tpl->smarty->ext->_validateCompiled->decodeProperties($_smarty_tpl, array (
  'has_nocache_code' => false,
  'version' => '3.1.28',
  'unifunc' => 'content_57a1ee66a55488_32380998',
  'file_dependency' => 
  array (
    'c7f2cfac23ac02ca6cbd8c6e923888173f2a7452' => 
    array (
      0 => 'C:\\wamp\\www\\financeiro3\\app\\viewer\\User\\edit.tpl',
      1 => 1470230117,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_57a1ee66a55488_32380998 ($_smarty_tpl) {
?>
<div clas="row">
    <div class="col-sm-12">
        <i class="fa fa-arrow-left"></i>
        <a href="user/view/<?php echo $_smarty_tpl->tpl_vars['user']->value->get('id');?>
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
        <div class="col-sm-12">
            <hr>
        </div>
    </div>
    <div class="row">
        <div class="col-sm-4 col-sm-offset-2">
            <button type="button" class="btn btn-default btn-block" id="checkAll">
                Marcar todas
            </button>
        </div>
        <div class="col-sm-4">
            <button type="button" class="btn btn-default btn-block" id="uncheckAll">
                Desmarcar todas
            </button>
        </div>
    </div>
    <?php echo $_smarty_tpl->tpl_vars['form']->value;?>

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
