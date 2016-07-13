<?php
/* Smarty version 3.1.28, created on 2016-06-30 14:27:46
  from "C:\wamp\www\financeiro3\app\viewer\EntryType\edit.tpl" */

if ($_smarty_tpl->smarty->ext->_validateCompiled->decodeProperties($_smarty_tpl, array (
  'has_nocache_code' => false,
  'version' => '3.1.28',
  'unifunc' => 'content_577556928c0b63_37739690',
  'file_dependency' => 
  array (
    'ea4a77606d3f117f1814ed8bc82ada0294f1678d' => 
    array (
      0 => 'C:\\wamp\\www\\financeiro3\\app\\viewer\\EntryType\\edit.tpl',
      1 => 1467043869,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_577556928c0b63_37739690 ($_smarty_tpl) {
?>
<div clas="row">
    <div class="col-sm-12">
        <i class="fa fa-arrow-left"></i>
        <a href="/entryType/view/<?php echo $_smarty_tpl->tpl_vars['entryType']->value->get('id');?>
">
            Voltar para <?php echo $_smarty_tpl->tpl_vars['entryType']->value->get('name');?>

        </a>
        <hr>
    </div>
</div>

<form action="entryType/edit/<?php echo $_smarty_tpl->tpl_vars['entryType']->value->get('id');?>
" method="post">
    <div class="row">
        <div class="col-sm-12 form-group">
            <label class="control-label">Nome</label>
            <input type="text" class="form-control" name="name" value="<?php echo $_smarty_tpl->tpl_vars['entryType']->value->get('name');?>
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
