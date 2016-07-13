<?php
/* Smarty version 3.1.28, created on 2016-07-07 09:26:56
  from "C:\xampp\htdocs\serra\financeiro\app\viewer\User\login.tpl" */

if ($_smarty_tpl->smarty->ext->_validateCompiled->decodeProperties($_smarty_tpl, array (
  'has_nocache_code' => false,
  'version' => '3.1.28',
  'unifunc' => 'content_577e4a9054bc44_10826976',
  'file_dependency' => 
  array (
    '0e66443536c7c0ef70f1b0e281bd625c7190a2d6' => 
    array (
      0 => 'C:\\xampp\\htdocs\\serra\\financeiro\\app\\viewer\\User\\login.tpl',
      1 => 1467043872,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_577e4a9054bc44_10826976 ($_smarty_tpl) {
?>
<!DOCTYPE html>
<html lang="pt">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <base href="<?php echo _BASE_URL;?>
">

    <title>Sistema Financeiro | <?php echo $_smarty_tpl->tpl_vars['title']->value;?>
</title>

    <!-- Bootstrap core CSS -->
    <link href="plugins/bootstrap/dist/css/bootstrap.css" rel="stylesheet">
    <!--external css-->
    <link href="plugins/font-awesome/css/font-awesome.css" rel="stylesheet"/>

    <!-- Custom styles for this template -->
    <link href="<?php echo _APP_ROOT_DIR;?>
assets/css/style.css" rel="stylesheet">
    <link href="<?php echo _APP_ROOT_DIR;?>
assets/css/style-responsive.css" rel="stylesheet">

    <!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
    <?php echo '<script'; ?>
 src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"><?php echo '</script'; ?>
>
    <?php echo '<script'; ?>
 src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"><?php echo '</script'; ?>
>
    <![endif]-->
</head>

<body>

<div id="login-page">
    <div class="container">
        <?php echo $_smarty_tpl->tpl_vars['_flash']->value;?>

        <form class="form-login" action="/user/login" method="post">
            <div class="login-wrap">
                <input type="email" class="form-control" name="email" placeholder="Email" autofocus>
                <br>
                <input type="password" class="form-control" name="password" placeholder="Senha">
                <br>
                <button class="btn btn-theme btn-block" type="submit"><i class="fa fa-lock"></i>
                    Entrar
                </button>

            </div>

        </form>

    </div>
</div>

<!-- js placed at the end of the document so the pages load faster -->
<?php echo '<script'; ?>
 src="plugins/jquery/dist/jquery.js"><?php echo '</script'; ?>
>
<?php echo '<script'; ?>
 src="plugins/bootstrap/dist/js/bootstrap.min.js"><?php echo '</script'; ?>
>

<!--BACKSTRETCH-->
<!-- You can use an image of whatever size. This script will stretch to fit in any screen size.-->
<?php echo '<script'; ?>
 type="text/javascript" src="<?php echo _APP_ROOT_DIR;?>
assets/js/jquery.backstretch.min.js"><?php echo '</script'; ?>
>
<?php echo '<script'; ?>
 type="text/javascript" src="<?php echo _APP_ROOT_DIR;?>
assets/js/login.js"><?php echo '</script'; ?>
>


</body>
</html>
<?php }
}
