<?php
/* Smarty version 3.1.28, created on 2016-05-10 20:20:24
  from "C:\xampp\htdocs\Clientes\prophet_admin\app\viewer\User\login.tpl" */

if ($_smarty_tpl->smarty->ext->_validateCompiled->decodeProperties($_smarty_tpl, array (
  'has_nocache_code' => false,
  'version' => '3.1.28',
  'unifunc' => 'content_57322668773130_86250261',
  'file_dependency' => 
  array (
    '578983dd4e5cfe1f4b1f91fbd7ce83e31bb8d5b6' => 
    array (
      0 => 'C:\\xampp\\htdocs\\Clientes\\prophet_admin\\app\\viewer\\User\\login.tpl',
      1 => 1462904422,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_57322668773130_86250261 ($_smarty_tpl) {
?>
<html>
    <header>
        <title>Prophet | <?php echo $_smarty_tpl->tpl_vars['title']->value;?>
</title>
        <meta charset="utf-8">
		<base href="<?php echo _BASE_URL;?>
">
	    <meta name="viewport" content="width=device-width, initial-scale=1.0">
	    <meta name="description" content="Serviços de drone">
	    <meta name="author" content="Bento Net">

        <!-- Bootstrap Core CSS -->
        <link href="plugins/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet">

        <!-- MetisMenu CSS -->
        <link href="plugins/metisMenu/dist/metisMenu.min.css" rel="stylesheet">

        <!-- Custom CSS -->
        <link href="<?php echo _APP_ROOT_DIR;?>
assets/css/sb-admin-2.css" rel="stylesheet">

        <!-- Custom Fonts -->
        <link href="plugins/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">

    </header>
  	<body>

	  	<?php echo $_smarty_tpl->tpl_vars['_flash']->value;?>


	    <div class="container">
            <div class="row">
                <div class="col-md-4 col-md-offset-4">
                    <div class="login-panel panel panel-default">
                        <div class="panel-heading">
                            <h3 class="panel-title">Login</h3>
                        </div>
                        <div class="panel-body">
                            <form role="form" method="post" action="/user/login">
                                <fieldset>
                                    <div class="form-group">
                                        <input class="form-control" placeholder="Login" name="username" type="text" autofocus>
                                    </div>
                                    <div class="form-group">
                                        <input class="form-control" placeholder="Senha" name="password" type="password" value="">
                                    </div>
                                    <!-- Change this to a button or input when using this as a form -->
                                    <button class="btn btn-success btn-block btn-lg" type="submit">
                                    	Login
                                    </button>
                                </fieldset>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
	    </div>
	</body>
	<footer>
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
	</footer>
</html>
<?php }
}
