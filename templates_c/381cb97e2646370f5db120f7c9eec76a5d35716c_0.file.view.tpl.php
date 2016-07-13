<?php
/* Smarty version 3.1.28, created on 2016-05-11 03:40:03
  from "C:\xampp\htdocs\Clientes\prophet_admin\app\viewer\Clinic\view.tpl" */

if ($_smarty_tpl->smarty->ext->_validateCompiled->decodeProperties($_smarty_tpl, array (
  'has_nocache_code' => false,
  'version' => '3.1.28',
  'unifunc' => 'content_57328d73246512_51546673',
  'file_dependency' => 
  array (
    '381cb97e2646370f5db120f7c9eec76a5d35716c' => 
    array (
      0 => 'C:\\xampp\\htdocs\\Clientes\\prophet_admin\\app\\viewer\\Clinic\\view.tpl',
      1 => 1462930802,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_57328d73246512_51546673 ($_smarty_tpl) {
if (!is_callable('smarty_function_math')) require_once 'C:/xampp/htdocs/Clientes/prophet_admin/base/smarty/plugins\\function.math.php';
?>
<div class="row">
    <div class="col-sm-12 table-responsive">
        <table class="table table-bordered table-hover datatable">
            <thead>
            <tr>
                <th>Nome</th>
                <th>Dono</th>
                <th>Cadastrado</th>
                <th>Total de SMS - Limite</th>
                <th>Ações</th>
            </tr>
            </thead>
            <tbody>
            <?php
$_from = $_smarty_tpl->tpl_vars['clinics']->value;
if (!is_array($_from) && !is_object($_from)) {
settype($_from, 'array');
}
$__foreach_clinic_0_saved_item = isset($_smarty_tpl->tpl_vars['clinic']) ? $_smarty_tpl->tpl_vars['clinic'] : false;
$_smarty_tpl->tpl_vars['clinic'] = new Smarty_Variable();
$__foreach_clinic_0_total = $_smarty_tpl->smarty->ext->_foreach->count($_from);
if ($__foreach_clinic_0_total) {
foreach ($_from as $_smarty_tpl->tpl_vars['clinic']->value) {
$__foreach_clinic_0_saved_local_item = $_smarty_tpl->tpl_vars['clinic'];
?>
                <?php echo smarty_function_math(array('assign'=>'total','equation'=>'x+y','x'=>$_smarty_tpl->tpl_vars['clinic']->value->get('numRecebimentosSms'),'y'=>$_smarty_tpl->tpl_vars['clinic']->value->get('numEnviosSms')),$_smarty_tpl);?>

                <tr>
                    <td><?php echo $_smarty_tpl->tpl_vars['clinic']->value->get('nomClinica');?>
</td>
                    <td><?php echo $_smarty_tpl->tpl_vars['clinic']->value->get('cdnUsuario',true)->get('nomUsuario');?>
</td>
                    <td><?php echo $_smarty_tpl->tpl_vars['clinic']->value->get('datCadastro',true);?>
</td>
                    <td><?php echo (($_smarty_tpl->tpl_vars['total']->value).(' de ')).($_smarty_tpl->tpl_vars['clinic']->value->get('numLimiteSms'));?>
</td>
                    <td>
                        <a href="/clinic/view/<?php echo $_smarty_tpl->tpl_vars['clinic']->value->get('cdnClinica');?>
">
                            <button type="button" class="btn btn-primary">
                                Visualizar
                            </button>
                        </a>
                    </td>
                </tr>
            <?php
$_smarty_tpl->tpl_vars['clinic'] = $__foreach_clinic_0_saved_local_item;
}
}
if ($__foreach_clinic_0_saved_item) {
$_smarty_tpl->tpl_vars['clinic'] = $__foreach_clinic_0_saved_item;
}
?>
            </tbody>
        </table>
    </div>
</div>
<?php }
}
