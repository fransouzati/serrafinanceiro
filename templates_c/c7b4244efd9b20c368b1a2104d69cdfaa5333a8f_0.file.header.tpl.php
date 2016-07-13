<?php
/* Smarty version 3.1.28, created on 2016-06-30 09:42:50
  from "C:\wamp\www\financeiro3\app\viewer\default\header.tpl" */

if ($_smarty_tpl->smarty->ext->_validateCompiled->decodeProperties($_smarty_tpl, array (
  'has_nocache_code' => false,
  'version' => '3.1.28',
  'unifunc' => 'content_577513ca26f379_30565628',
  'file_dependency' => 
  array (
    'c7b4244efd9b20c368b1a2104d69cdfaa5333a8f' => 
    array (
      0 => 'C:\\wamp\\www\\financeiro3\\app\\viewer\\default\\header.tpl',
      1 => 1467289174,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_577513ca26f379_30565628 ($_smarty_tpl) {
?>
<html>
    <head>
        <title>Sistema financeiro | <?php echo $_smarty_tpl->tpl_vars['title']->value;?>
</title>
        <meta charset="utf-8">
		<base href="<?php echo _BASE_URL;?>
">
	    <meta name="viewport" content="width=device-width, initial-scale=1.0">

        <!-- Bootstrap Core CSS -->
        <link href="plugins/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet">

        <!-- Custom Fonts -->
        <link href="plugins/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">

        <link href="plugins/sweetalert2/dist/sweetalert2.css" rel="stylesheet">

        <link href="https://cdn.datatables.net/1.10.10/css/jquery.dataTables.min.css" rel="stylesheet">

        <!-- Custom styles for this template -->
        <link href="<?php echo _APP_ROOT_DIR;?>
assets/css/style.css" rel="stylesheet">
        <link href="<?php echo _APP_ROOT_DIR;?>
assets/css/style-responsive.css" rel="stylesheet">
        <link rel="stylesheet" type="text/css" href="<?php echo _APP_ROOT_DIR;?>
plugins/lineicons/style.css">

        <!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->
        <!--[if lt IE 9]>
        <?php echo '<script'; ?>
 src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"><?php echo '</script'; ?>
>
        <?php echo '<script'; ?>
 src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"><?php echo '</script'; ?>
>
        <![endif]-->

        <link rel="stylesheet" type="text/css" href="<?php echo _APP_ROOT_DIR;?>
plugins/select2/dist/css/select2.min.css">

        <link rel="stylesheet" type="text/css" href="plugins/daterangepicker/daterangepicker.css">
        <link rel="stylesheet" type="text/css" href="plugins/datepicker/css/datepicker.css">

    </head>
    <section id="container" >
        <!-- **********************************************************************************************************************************************************
        TOP BAR CONTENT & NOTIFICATIONS
        *********************************************************************************************************************************************************** -->
        <!--header start-->
        <header class="header black-bg">
            <div class="sidebar-toggle-box">
                <div class="fa fa-bars tooltips" data-placement="right" data-original-title="Toggle Navigation"></div>
            </div>
            <!--logo start-->
            <a href="user/home" class="logo"><b>SISTEMA FINANCEIRO</b></a>
            <!--logo end-->
            <div class="nav notify-row" id="top_menu">
                <!--  notification start -->

                <!--  notification end -->
            </div>
            <div class="top-menu">
                <ul class="nav pull-right top-menu">
                    <li><a class="logout" href="/user/logout">Logout</a></li>
                </ul>
            </div>
        </header>
        <!--header end-->

        <!-- **********************************************************************************************************************************************************
        MAIN SIDEBAR MENU
        *********************************************************************************************************************************************************** -->
        <!--sidebar start-->
        <aside>
            <div id="sidebar"  class="nav-collapse ">
                <!-- sidebar menu start-->
                <ul class="sidebar-menu" id="nav-accordion">

                    <p class="centered"><img src="<?php echo _APP_ROOT_DIR;?>
assets/img/logo-serra.png" class="img-" width="200"></a></p>
                    <?php $_smarty_tpl->tpl_vars["userSess"] = new Smarty_Variable(unserialize($_SESSION['user']), null);
$_smarty_tpl->ext->_updateScope->updateScope($_smarty_tpl, "userSess", 0);?>
                    <h5 class="centered">
                        <a href="/user/view/<?php echo $_smarty_tpl->tpl_vars['userSess']->value->get('id');?>
 ">
                            <?php echo $_smarty_tpl->tpl_vars['userSess']->value->get('name');?>
</h5>
                        </a>

                    <li class="mt">
                        <a class="" href="/user/home/">
                            <i class="fa fa-home"></i>
                            <span>Início</span>
                        </a>
                    </li>

                    <li class="sub-menu">
                        <a href="javascript:;" >
                            <i class="fa fa-edit"></i>
                            <span>Cadastros</span>
                        </a>
                        <ul class="sub">
                            <li><a  href="user/">Administradores</a></li>
                            <li><a  href="investor/">Investidores</a></li>
                            <li><a  href="exitType/">Tipos de saída</a></li>
                            <li><a  href="entryType/">Tipos de entrada</a></li>
                        </ul>
                    </li>

                    <li class="">
                        <a class="" href="entry/">
                            <i class="fa fa-sign-in"></i>
                            <span>Entradas</span>
                        </a>
                    </li>

                    <li class="">
                        <a class="" href="exit/">
                            <i class="fa fa-sign-out"></i>
                            <span>Saídas</span>
                        </a>
                    </li>

                    <li class="">
                        <a class="" href="client/">
                            <i class="fa fa-group"></i>
                            <span>Clientes</span>
                        </a>
                    </li>

                    <li class="">
                        <a class="" href="project/">
                            <i class="fa fa-folder"></i>
                            <span>Projetos</span>
                        </a>
                    </li>

                    <li class="">
                        <a class="" href="report/">
                            <i class="fa fa-dollar"></i>
                            <span>Relatório títulos</span>
                        </a>
                    </li>

                </ul>
                <!-- sidebar menu end-->
            </div>
        </aside>
        <!--sidebar end-->
        <!--main content start-->
        <section id="main-content">
            <section class="wrapper">
                <div id="page-wrapper">
                    <?php echo $_smarty_tpl->tpl_vars['_flash']->value;?>

                    <div class="row">
                        <div class="col-md-12">
                            <h1 class="page-header"><?php echo $_smarty_tpl->tpl_vars['title']->value;?>
</h1>
                        </div>
                    </div>
<?php }
}
