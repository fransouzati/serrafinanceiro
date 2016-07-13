<?php
/* Smarty version 3.1.28, created on 2016-05-16 20:59:07
  from "C:\xampp\htdocs\Clientes\prophet_admin\app\viewer\default\footer.tpl" */

if ($_smarty_tpl->smarty->ext->_validateCompiled->decodeProperties($_smarty_tpl, array (
  'has_nocache_code' => false,
  'version' => '3.1.28',
  'unifunc' => 'content_573a187b70b428_49624961',
  'file_dependency' => 
  array (
    '63e05929020498caa7fdcc8050734d12ed369162' => 
    array (
      0 => 'C:\\xampp\\htdocs\\Clientes\\prophet_admin\\app\\viewer\\default\\footer.tpl',
      1 => 1463425146,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_573a187b70b428_49624961 ($_smarty_tpl) {
?>
                    <hr>
                </div>
                <!-- /#page-wrapper -->

            </div>
            <!-- /#wrapper -->

            <!-- jQuery -->
            <?php echo '<script'; ?>
 src="plugins/jquery/dist/jquery.min.js"><?php echo '</script'; ?>
>

            <!-- Bootstrap Core JavaScript -->
            <?php echo '<script'; ?>
 src="plugins/bootstrap/dist/js/bootstrap.min.js"><?php echo '</script'; ?>
>

            <!-- Metis Menu Plugin JavaScript -->
            <?php echo '<script'; ?>
 src="plugins/metisMenu/dist/metisMenu.min.js"><?php echo '</script'; ?>
>

            <!-- Custom Theme JavaScript -->
            <?php echo '<script'; ?>
 src="<?php echo _APP_ROOT_DIR;?>
assets/js/sb-admin-2.js"><?php echo '</script'; ?>
>

            <?php echo '<script'; ?>
 src="<?php echo _APP_ROOT_DIR;?>
assets/js/formSubmition.js"><?php echo '</script'; ?>
>
            <?php echo '<script'; ?>
 src="<?php echo _APP_ROOT_DIR;?>
assets/js/browserDetection.js"><?php echo '</script'; ?>
>
            <?php echo '<script'; ?>
 src="plugins/sweetalert2/dist/sweetalert2.min.js"><?php echo '</script'; ?>
>
            <?php echo '<script'; ?>
 src="plugins/input-mask/jquery.inputmask.js"><?php echo '</script'; ?>
>
            <?php echo '<script'; ?>
 src="plugins/input-mask/jquery.maskMoney.js"><?php echo '</script'; ?>
>
            <?php echo '<script'; ?>
 src="plugins/input-mask/jquery.mask.init.js"><?php echo '</script'; ?>
>



            <?php echo '<script'; ?>
 src="plugins/datatables/datatables.min.js"><?php echo '</script'; ?>
>
            <?php echo '<script'; ?>
 src="plugins/datatables/dataTables.init.js"><?php echo '</script'; ?>
>

            <?php if (isset($_smarty_tpl->tpl_vars['js']->value)) {
echo $_smarty_tpl->tpl_vars['js']->value;
}?>
            <?php if (isset($_smarty_tpl->tpl_vars['css']->value)) {
echo $_smarty_tpl->tpl_vars['css']->value;
}?>
        </body>
</html>
<?php }
}
