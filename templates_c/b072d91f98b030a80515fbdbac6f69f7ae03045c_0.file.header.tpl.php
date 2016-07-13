<?php
/* Smarty version 3.1.28, created on 2016-05-18 20:49:32
  from "C:\xampp\htdocs\Clientes\prophet_admin\app\viewer\default\header.tpl" */

if ($_smarty_tpl->smarty->ext->_validateCompiled->decodeProperties($_smarty_tpl, array (
  'has_nocache_code' => false,
  'version' => '3.1.28',
  'unifunc' => 'content_573cb93c10aed7_55837326',
  'file_dependency' => 
  array (
    'b072d91f98b030a80515fbdbac6f69f7ae03045c' => 
    array (
      0 => 'C:\\xampp\\htdocs\\Clientes\\prophet_admin\\app\\viewer\\default\\header.tpl',
      1 => 1463597369,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_573cb93c10aed7_55837326 ($_smarty_tpl) {
?>
<html>
    <header>
        <title>Prophet | <?php echo $_smarty_tpl->tpl_vars['title']->value;?>
</title>
        <meta charset="utf-8">
		<base href="<?php echo _BASE_URL;?>
">
	    <meta name="viewport" content="width=device-width, initial-scale=1.0">

        <!-- Bootstrap Core CSS -->
        <link href="plugins/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet">

        <!-- MetisMenu CSS -->
        <link href="plugins/metisMenu/dist/metisMenu.min.css" rel="stylesheet">

        <!-- Custom CSS -->
        <link href="<?php echo _APP_ROOT_DIR;?>
assets/css/sb-admin-2.css" rel="stylesheet">

        <!-- Custom Fonts -->
        <link href="plugins/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">

        <link href="plugins/sweetalert2/dist/sweetalert2.css" rel="stylesheet">

        <link href="https://cdn.datatables.net/1.10.10/css/jquery.dataTables.min.css" rel="stylesheet">

    </header>
    <body>

	    <div id="wrapper">

	        <!-- Navigation -->
	        <nav class="navbar navbar-default navbar-static-top" role="navigation" style="margin-bottom: 0">
	            <div class="navbar-header">
	                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
	                    <span class="sr-only">Toggle navigation</span>
	                    <span class="icon-bar"></span>
	                    <span class="icon-bar"></span>
	                    <span class="icon-bar"></span>
	                </button>
	                <a class="navbar-brand" href="users/home">Administração - Prophet</a>
	            </div>
	            <!-- /.navbar-header -->

	            <div class="navbar-default sidebar" role="navigation">
	                <div class="sidebar-nav navbar-collapse">
	                    <ul class="nav" id="side-menu">
	                        <li>
	                            <a href="user/home/"><i class="fa fa-home fa-fw"></i> Início</a>
	                        </li>
	                        <li>
	                            <a href="#"><i class="fa fa-male"></i> Usuários<span class="fa arrow"></span></a>
	                            <ul class="nav nav-second-level">
	                                <li>
	                                    <a href="/user/add">Cadastrar</a>
	                                </li>
	                                <li>
	                                    <a href="/user/view">Consultar</a>
	                                </li>
	                            </ul>
	                            <!-- /.nav-second-level -->
	                        </li>
                            <li>
                                <a href="payment/view/"><i class="fa fa-dollar fa-fw"></i> Pagamentos</a>
                            </li>
                            <li>
                                <a href="clinic/view/"><i class="fa fa-building fa-fw"></i> Clínicas cadastradas</a>
                            </li>
                            <li>
                                <a href="/clinic/advices/"><i class="fa fa-exclamation-triangle"></i> Avisos</a>
                            </li>

	                        <li>
	                        	<a href="/user/logout">
	                        		<i class="fa fa-sign-out fa-fw"></i> Sair do sistema
	                        	</a>
	                        </li>
	                    </ul>
	                </div>
	                <!-- /.sidebar-collapse -->
	            </div>
	            <!-- /.navbar-static-side -->
	        </nav>
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
