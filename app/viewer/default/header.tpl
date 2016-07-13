<html>
    <head>
        <title>Sistema financeiro | {$title}</title>
        <meta charset="utf-8">
		<base href="{_BASE_URL}">
	    <meta name="viewport" content="width=device-width, initial-scale=1.0">

        <!-- Bootstrap Core CSS -->
        <link href="plugins/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet">

        <!-- Custom Fonts -->
        <link href="plugins/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">

        <link href="plugins/sweetalert2/dist/sweetalert2.css" rel="stylesheet">

        <link href="https://cdn.datatables.net/1.10.10/css/jquery.dataTables.min.css" rel="stylesheet">

        <!-- Custom styles for this template -->
        <link href="{_APP_ROOT_DIR}assets/css/style.css" rel="stylesheet">
        <link href="{_APP_ROOT_DIR}assets/css/style-responsive.css" rel="stylesheet">
        <link rel="stylesheet" type="text/css" href="{_APP_ROOT_DIR}plugins/lineicons/style.css">

        <!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->
        <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
        <![endif]-->

        <link rel="stylesheet" type="text/css" href="{_APP_ROOT_DIR}plugins/select2/dist/css/select2.min.css">

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
                    <li><a class="logout" href="user/viewBalance">Saldo em caixa: R${$_balance}</a></li>
                </ul>
                <ul class="nav pull-right top-menu">
                    <li><a class="logout" href="user/logout">Logout</a></li>
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

                    {assign var="userSess" value=$smarty.session.user|unserialize}
                    <h5 class="centered">
                        <a href="user/view/{$userSess->get('id')} ">
                            {$userSess->get('name')}</h5>
                        </a>

                    <li class="mt">
                        <a class="" href="user/home/">
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
                            <li><a  href="withdrawType/">Tipos de saída</a></li>
                            <li><a  href="entryType/">Tipos de entrada</a></li>
                            <li><a  href="bill/">Contas a pagar</a></li>
                        </ul>
                    </li>

                    <li class="">
                        <a class="" href="entry/">
                            <i class="fa fa-sign-in"></i>
                            <span>Entradas</span>
                        </a>
                    </li>

                    <li class="">
                        <a class="" href="withdraw/">
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
                        <a class="" href="bill/payments">
                            <i class="fa fa-folder-o"></i>
                            <span>Contas pagas</span>
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
                    {$_flash}
                    <div class="row">
                        <div class="col-md-12">
                            <h1 class="page-header">{$title}</h1>
                        </div>
                    </div>
