<?php

    
    define('_LOCAL', $_SERVER['HTTP_HOST'] == 'localhost:8091' || $_SERVER['HTTP_HOST'] == 'localhost:8092');
    include_once('config/dirList.php');
    include_once(_CONFIG_ROOT_DIR.'/constants.inc.php');
    include_once(_CONFIG_ROOT_DIR.'check/formatDate.inc.php');
    include_once(_CONFIG_ROOT_DIR.'exec/autoload.inc.php');
    define('_TRAIT', _APP_ROOT_DIR.'model/Trait/Functions.trait.php');
    define('_CONTROLLERS', _APP_ROOT_DIR.'controller/');
    
    $controllers = getControllers();
    $traitFunctions = traitFunctions();
    $traitControllers = traitControllers();
    
    $diffs = array();
    $newControllers = array();
    
    foreach($controllers as $controller){
        $ctrlDir = _CONTROLLERS.$controller;
        $name = getControllerName($controller, false);
        $functions = getFunctions($ctrlDir);
        $diff = compareFunc($traitFunctions, $functions, $name);
        $diffs[$name] = $diff;
    
        if(!in_array($name, array_keys($traitControllers))) {
            $traitControllers[$name] = $name;
            $newControllers[] = $name;
        }
        if(count($diff) > 0){
            mergeDiff($traitFunctions, $diff, $name);
        }
    }
    $publics = traitFunctions('publics');
    if(isset($_POST['submit'])) {
        unset($_POST['submit']);
        $publics = traitFunctions('publics');
        foreach($_POST as $name=>$newFuncs) {
            mergeDiff($publics, $newFuncs, $name);
        }
        putInFile($traitFunctions);
        putInFile($publics, 'publics');
        putInFile($traitControllers, 'controllers');
        die('Ok!');
    }else {
        if(count($newControllers))
            newControllers($newControllers);
        form($diffs);
    }
    
    
    function getControllers(){
        $controllers = scandir(_CONTROLLERS);
        unset($controllers[0]);
        unset($controllers[1]);
        $controllers = array_diff($controllers, array('AppController.class.php'));
        return $controllers;
    }
    
    function getControllerName($controller, $lower = false){
        if($lower)
            return strtolower(str_replace('Controller.class.php', '', $controller));
        else
            return str_replace('Controller.class.php', '', $controller);
    }
    
    function getFunctions($file) {
        $source = file_get_contents($file);
        $tokens = token_get_all($source);
        $functions = array();
        $next = false;
        foreach($tokens as $token){
            if($token[0] == 337){
                $next = true;
                continue;
            }
                        
            if($next && $token[0] != 379){
                $functions[] = $token[1];
                $next = false;
            }
        }
        return $functions;
    }
    
    function countFunctions($name, $functions){
        $final = array();
        for($i = 0; $i < count($functions); $i++){
            $final[$name.($i + 1)] = $functions[$i];
        }
        return $final;
    }
    
    function traitFunctions($filter = 'all'){
        $file = file_get_contents(_TRAIT);
        $file = explode(PHP_EOL, $file);
        $functions = array();
        $inFunctions = false;
        $inArray = false;
        foreach($file as $line){
            if($filter == 'block') {
                if (strpos($line, 'public static $block') != 0) {
                    $inFunctions = true;
                    continue;
                }
            }elseif($filter == 'publics'){
                if (strpos($line, 'public static $publics') != 0) {
                    $inFunctions = true;
                    continue;
                }
            }else{
                if (strpos($line, 'public static $functions') != 0) {
                    $inFunctions = true;
                    continue;
                }
            }
            
            if(strpos($line, ');') != 0){
                $inFunctions = false;
            }
            if(strpos($line, '),') != 0){
                $inArray = false;
            }
            
            if($inFunctions){
                $line = explode('=>', $line);
                if(count($line) > 1) {
                    $controller = trim(str_replace("'", '', $line[0]));
                    $functions[$controller] = array();
                    $inArray = true;
                    continue;
                }
                if($inArray){
                    $function = trim(str_replace("'", '', $line[0]));
                    $function = trim(str_replace(",", '', $function));
                    $functions[$controller][] = $function;
                }
            }
        }
        
        return $functions;
    }
    
    function traitControllers(){
        $file = file_get_contents(_TRAIT);
        $file = explode(PHP_EOL, $file);
        $controllers = array();
        $inControllers = false;
        foreach($file as $line){
            if (strpos($line, 'public static $controllers') != 0) {
                $inControllers = true;
                continue;
            }
            if(strpos($line, ');') != 0){
                $inControllers = false;
            }
            
            if($inControllers){
                $line = explode('=>', $line);
                if(count($line) > 1) {
                    $line[0] = trim(str_replace("'", '', $line[0]));
                    $line[1] = trim(str_replace("'", '', $line[1]));
                    $line[1] = trim(str_replace(",", '', $line[1]));
                    $controllers[$line[0]] = $line[1];
                    continue;
                }
            }
        }
        
        return $controllers;
    }
    
    function compareFunc($trait, $ctrl, $name){
        $diff = array();
        if(!isset($trait[$name]))
            $trait[$name] = array();
        foreach($ctrl as $function){
            if(!in_array($function, $trait[$name])){
                $diff[] = $function;
            }
        }
        
        return $diff;
    }
    
    function mergeDiff(&$traitFunctions, $diff, $name){
        if(!isset($traitFunctions[$name]))
            $traitFunctions[$name] = array();
        foreach($diff as $func){
            $traitFunctions[$name][] = $func;
        }
    }
    
    function toStr($traitFunctions){
        $str = '';
        foreach($traitFunctions as $controller => $functions){
            $str .= "           '".$controller."'".' => array('.PHP_EOL;
            foreach($functions as $function){
                $str .= "               '".$function."'".','.PHP_EOL;
            }
            
            $str .= '           ),'.PHP_EOL;
        }
        return $str;
    }
    
    function toStrController($traitControllers){
        $str = '';
        foreach($traitControllers as $controller => $label){
            $str .= "           '".$controller."' => '".$label."',".PHP_EOL;
        }
        return $str;
    }
    
    function putInFile($functions, $filter = 'all'){
        $file = file_get_contents(_TRAIT);
        $file = explode(PHP_EOL, $file);
        if($filter == 'controllers')
            $str = toStrController($functions);
        else
            $str = toStr($functions);
        $inFunctions = false;
        foreach($file as $num => $line){
            if($filter == 'publics'){
                if (strpos($line, 'public static $publics') != 0) {
                    $inFunctions = true;
                    $toPut = $num + 1;
                    continue;
                }
            }elseif($filter == 'controllers') {
                if (strpos($line, 'public static $controllers') != 0) {
                    $inFunctions = true;
                    $toPut = $num + 1;
                    continue;
                }
            }else{
                if (strpos($line, 'public static $functions') != 0) {
                    $inFunctions = true;
                    $toPut = $num + 1;
                    continue;
                }
            }
            if(strpos($line, ');') != 0){
                $lastFunctionsNum = $num - 1;
                $inFunctions = false;
            }
            
            if ($inFunctions) {
                if ($num == $toPut)
                    $file[$num] = '';
                else
                    unset($file[$num]);
            }
        }
        
        $file[$toPut] = $str;
        
        $file = implode(PHP_EOL, $file);
        
        file_put_contents(_TRAIT, $file);
    }
    
    function form($diffs){
        echo '<form action="#" method="POST">';
        foreach($diffs as $controller => $functions){
            if(count($functions)) {
                echo '<h3>'.$controller.'</h3>';
                foreach ($functions as $function) {
                    echo $function . ' <input type="checkbox" name="' . $controller . '[]" value="' . $function . '"> Deixar public';
                    echo '<br>';
                }
                echo '<hr>';
            }
        }
        echo '<input type="submit" name="submit">';
        echo '</form>';
    }
    
    function newControllers($new){
        if(count($new)){
            echo '<b>Novos controladores: </b>';
            foreach($new as $controller){
                echo $controller.',';
            }
            echo '<br>';
        }
    }