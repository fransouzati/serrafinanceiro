<!DOCTYPE html>
<html lang="pt">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <base href="{_BASE_URL}">

    <title>Sistema Financeiro | {$title}</title>

    <!-- Bootstrap core CSS -->
    <link href="plugins/bootstrap/dist/css/bootstrap.css" rel="stylesheet">
    <!--external css-->
    <link href="plugins/font-awesome/css/font-awesome.css" rel="stylesheet"/>

    <!-- Custom styles for this template -->
    <link href="{_APP_ROOT_DIR}assets/css/style.css" rel="stylesheet">
    <link href="{_APP_ROOT_DIR}assets/css/style-responsive.css" rel="stylesheet">

    <!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
    <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->
</head>

<body>

<div id="login-page">
    <div class="container">
        {$_flash}
        <form class="form-login" action="user/login" method="post">
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
<script src="plugins/jquery/dist/jquery.js"></script>
<script src="plugins/bootstrap/dist/js/bootstrap.min.js"></script>

<!--BACKSTRETCH-->
<!-- You can use an image of whatever size. This script will stretch to fit in any screen size.-->
<script type="text/javascript" src="{_APP_ROOT_DIR}assets/js/jquery.backstretch.min.js"></script>
<script type="text/javascript" src="{_APP_ROOT_DIR}assets/js/login.js"></script>


</body>
</html>
