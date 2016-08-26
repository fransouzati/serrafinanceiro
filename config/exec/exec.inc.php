<?php

    if (!isset($_SESSION['phpError']))
        $_SESSION['phpError'] = '';
    $friendlyUrl = isset($_GET['ctrl']) && isset($_GET['act']) ? false : true;
    
    if(_LOCAL){
        $first = 0;
        $sec = 1;
        $third = 2;
    }else{
        $first = 1;
        $sec = 2;
        $third = 3;
    }
    
    if ($friendlyUrl) {
        $comp = strrchr($_SERVER['REQUEST_URI'], '?');
        $end = str_replace($comp, '', $_SERVER['REQUEST_URI']);
        $url = explode('/', $end);
        array_shift($url);

        if (isset($url[$first])) {
            if (isset($url[$sec])) {
                if(trim($url[$sec]) != '')
                    $action = $url[$sec];
                else
                    $action = 'view';
            } else {
                $action = 'view';
            }
            $controller = ucfirst($url[$first]) . 'Controller';
        } else {
            $controller = _MAIN_CLASS;
        }

        $params = '';
        if (isset($url[$third])) {
            for ($i = $third; $i < count($url); $i++) {
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
            
            eval('$controller = new ' . $controller . '("'.$controller.'","'.$action.'");');
            if (method_exists($controller, $action)) {
                eval('$controller->' . $action . '(' . $params . ');');
            } else {
                eval('$controller = new ' . _MAIN_CLASS . '("'._MAIN_CLASS.'","'._MAIN_METHOD.'");');
                eval('$controller->' . _MAIN_METHOD . '();');
            }
        } else {
            eval('$controller = new ' . _MAIN_CLASS . '("'._MAIN_CLASS.'","'._MAIN_METHOD.'");');
            eval('$controller->' . _MAIN_METHOD . '();');
        }


    } else {
        if (isset($_GET['ctrl']) && isset($_GET['act'])) {
            eval('$controller = new ' . ucfirst($_GET['ctrl']) . 'Controller("'.$_GET['ctrl'].'","'.$_GET['act'].'");');
            if (isset($_GET['param']))
                $controller->{$_GET['act']}($_GET['param']);
            else
                $controller->{$_GET['act']}();

        } else {
            eval('$controller = new ' . _MAIN_CLASS . '("'._MAIN_CLASS.'","'._MAIN_METHOD.'");');
            $controller->{_MAIN_METHOD}();
        }
    }
