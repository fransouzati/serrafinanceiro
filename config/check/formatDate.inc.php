<?php

    /**
     * Passes through $_POST to search for unformatted dates
     */
    if(isset($_POST)){
        foreach($_POST as $item => $value){
            if(is_array($value))
                continue;
            $oldValue = $value;
            $value = explode('/', $value);
            if(count($value) == 3){
                if(is_numeric($value[1])) {
                    if (checkdate($value[1], $value[0], $value[2])) {
                        $value = $value[2] . '-' . $value[1] . '-' . $value[0];
                        $_POST[$item] = $value;
                    }
                }
            }else{
                $value = explode('-', $oldValue);

                if(count($value) == 2){
                    $first = $value[0];
                    $sec = $value[1];

                    $first = explode('/', $first);
                    if(count($first) == 3) {
                        if (checkdate(intval($first[1]), intval($first[0]), intval($first[2]))) {
                            $first = trim($first[2]) . '-' . trim($first[1]) . '-' . trim($first[0]);
                            $sec = $sec = explode('/', $sec);

                            if (checkdate($sec[1], $sec[0], $sec[2])) {
                                $sec = trim($sec[2]) . '-' . trim($sec[1]) . '-' . trim($sec[0]);

                                $value[0] = $first;
                                $value[1] = $sec;
                                $value = $value[0].' / '.$value[1];
                                $_POST[$item] = $value;
                            }
                        }
                    }

                }
            }
        }
    }

    function unfilter_period($date){
        $date = explode('/', $date);
        $date[0] = date('d/m/Y', strtotime($date[0]));
        $date[1] = date('d/m/Y', strtotime($date[1]));
        return $date[0].' - '.$date[1];
    }