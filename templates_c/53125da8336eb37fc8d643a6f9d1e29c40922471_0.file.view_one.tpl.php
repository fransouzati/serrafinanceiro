<?php
/* Smarty version 3.1.28, created on 2016-07-11 02:54:08
  from "C:\xampp\htdocs\serra\financeiro\app\viewer\Investor\view_one.tpl" */

if ($_smarty_tpl->smarty->ext->_validateCompiled->decodeProperties($_smarty_tpl, array (
  'has_nocache_code' => false,
  'version' => '3.1.28',
  'unifunc' => 'content_57833480f147c0_97461556',
  'file_dependency' => 
  array (
    '53125da8336eb37fc8d643a6f9d1e29c40922471' => 
    array (
      0 => 'C:\\xampp\\htdocs\\serra\\financeiro\\app\\viewer\\Investor\\view_one.tpl',
      1 => 1467043871,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_57833480f147c0_97461556 ($_smarty_tpl) {
?>
<div class="row">
    <div class="col-sm-6 form-group">
        <label class="control-label">Nome</label>
        <input disabled type="text" class="form-control" name="name" value="<?php echo $_smarty_tpl->tpl_vars['investor']->value->get('name');?>
">
    </div>
    <div class="col-sm-6 form-group">
        <label class="control-label">Capital inicial</label>
        <input disabled type="text" class="form-control mask-money" name="initial_capital" value="R$<?php echo $_smarty_tpl->tpl_vars['investor']->value->get('initial_capital',true);?>
">
    </div>
</div>
<div class="row">
    <div class="col-sm-12 form-group">
        <label class="control-label checkbox">
            Este investidor também é um sócio -
            <?php echo $_smarty_tpl->tpl_vars['investor']->value->get('is_partner',true);?>

        </label>

    </div>
</div>
<div class="row">
    <div class="col-sm-offset-4 col-sm-4">
        <a href="/investor/edit/<?php echo $_smarty_tpl->tpl_vars['investor']->value->get('id');?>
">
            <button class="btn btn-success btn-lg btn-block">
                Editar
            </button>
        </a>
    </div>
</div>
<?php }
}
