<?php
    define('_LOCAL', $_SERVER['HTTP_HOST'] == 'localhost:8091' || $_SERVER['HTTP_HOST'] == 'localhost:8092');
    
    // Dir config
    include_once('config/dirList.php');
    
    // Constants
    include_once(_CONFIG_ROOT_DIR.'constants.inc.php');
    
    // Autoload
    include_once(_CONFIG_ROOT_DIR.'exec/autoload.inc.php');
    
    // Smarty
    include_once(_CONFIG_ROOT_DIR.'smarty.inc.php');
    
    // Database connection_status
    include_once(_CONFIG_ROOT_DIR.'database/dbConnection.inc.php');

    $errors = array();
    $clients = file_get_contents_utf8('clients.csv');
    $clients = explode(PHP_EOL, $clients);
    $first = true;
    $model = new ClientModel();
    
    foreach($clients as $row){
        if($first){
            $first = false;
            continue;
        }
        $row = explode(';', $row);
        $client = new Client();
        $finances = new Finances();
        for($i = 0; $i < count($row); $i++){
            $cell = trim($row[$i]);
            $atr = trim(explode(';', $clients[0])[$i]);
            if($i < 14){
                
                if(count(explode('/', $cell)) == 3){
                    $oldCell = $cell;
                    $cell = explode('/', $cell);
                    $cell = $cell[2].'-'.$cell[1].'-'.$cell[0];
                    if(!is_numeric($cell[0]) || !is_numeric($cell[1]) || !is_numeric($cell[2])) {
                        $cell = $oldCell;
                    }else {
                        if (!$client->validDate($cell))
                            $cell = $oldCell;
                    }
                }
                $client->set($atr, $cell);
            }elseif($i > 14){
                $finances->set($atr, $cell);
            }
        }
        $client->set('name', $row[0]);
        
        $finances->set('status', 1);
        
        
        
        
        if($model->insert('client', $client)){
            $id_client = $model->lastInserted('client');
            $finances->set('id_client', $id_client);
            if(!$model->insert('finances', $finances)){
                $model->delete('client', array('id' => $id_client));
                echo $id_client.'-'.$client->get('name');
                die;
                $errors[] = $client->get('name');
                continue;
            }
        }else{
            $errors[] = $client->get('name');
            continue;
        }
        
        
        
        
        
    }
    function file_get_contents_utf8($fn) {
        $content = file_get_contents($fn);
        return mb_convert_encoding($content, 'UTF-8',
            mb_detect_encoding($content, 'UTF-8, ISO-8859-1', true));
    }