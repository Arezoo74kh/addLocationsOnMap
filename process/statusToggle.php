<?php
include "../bootstrap/init.php"; 

if(!isAjaxRequest()){
    diePage("Invalid Request!");
}
//Request is ajax and ok

// dd($_POST);
if(is_null($_POST['loc']) or !is_numeric($_POST['loc'])){
   echo "Invalid Location!";
   die();
}
$locationId = $_POST['loc'];
echo toggleStatus($locationId);
