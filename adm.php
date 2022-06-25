<?php
include "bootstrap/init.php";

if(isset($_GET['logout']) and $_GET['logout'] == 1){
    logout();
}

if($_SERVER['REQUEST_METHOD'] == 'POST'){
    // var_dump($_POST);
    if(!login($_POST['username'],$_POST['password'])){
        message("نام کاربری یا پسورد اشتباهه");
    }
}

if(isloggedin()){
    include "tpl/tpl-adm.php";
}else{
    include "tpl/tpl-adm-auth.php";
}


