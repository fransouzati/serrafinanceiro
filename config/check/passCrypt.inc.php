<?php
    if(isset($_POST['password'])){
        if(trim($_POST['password']) != '')
            $_POST['password'] = crypt($_POST['password'], '$2a$12$jALKAJSeqwnaSEnxcjayeE$');
    }
    if(isset($_POST['passwordConfirm'])){
        if(trim($_POST['passwordConfirm']) != '')
            $_POST['passwordConfirm'] = crypt($_POST['passwordConfirm'], '$2a$12$jALKAJSeqwnaSEnxcjayeE$');
    }