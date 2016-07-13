<?php

    if (!isset($_SESSION['phpError']))
        $_SESSION['phpError'] = '';
    $friendlyUrl = isset($_GET['ctrl']) && isset($_GET['act']) ? false : true;
    if ($friendlyUrl) {

        $comp = strrchr($_SERVER['REQUEST_URI'], '?');
        $end = str_replace($comp, '', $_SERVER['REQUEST_URI']);
        $url = explode('/', $end);
        array_shift($url);

        if (isset($url[1])) {
            if (isset($url[2])) {
                if(trim($url[2]) != '')
                    $action = $url[2];
                else
                    $action = 'view';
            } else {
                $action = 'view';
            }
            $controller = ucfirst($url[1]) . 'Controller';
        } else {
            $controller = _MAIN_CLASS;
        }

        $params = '';
        if (isset($url[3])) {
            for ($i = 3; $i < count($url); $i++) {
                if(trim($url[$i]) != '')
                    $params .= '"' . $url[$i] . '",';
            }
        }
        $params = trim($params, ',');

        if ($controller == 'LoginController') {
            $controller = 'UserController';
            $action = 'login';
        }

        if (class_exists($controller)) {
            eval('$controller = new ' . $controller . '();');
            if (method_exists($controller, $action)) {
                eval('$controller->' . $action . '(' . $params . ');');
            } else {
                eval('$controller = new ' . _MAIN_CLASS . '();');
                eval('$controller->' . _MAIN_METHOD . '();');
            }
        } else {
            eval('$controller = new ' . _MAIN_CLASS . '();');
            eval('$controller->' . _MAIN_METHOD . '();');
        }


    } else {
        if (isset($_GET['ctrl']) && isset($_GET['act'])) {
            eval('$controller = new ' . ucfirst($_GET['ctrl']) . 'Controller();');
            if (isset($_GET['param']))
                $controller->{$_GET['act']}($_GET['param']);
            else
                $controller->{$_GET['act']}();

        } else {
            eval('$controller = new ' . _MAIN_CLASS . '();');
            $controller->{_MAIN_METHOD}();
        }
    }
