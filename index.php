<?php
 
 include "bootstrap/init.php"; 

 $location = false;
 if(isset($_GET['loc']) and is_numeric($_GET['loc'])){
    $location = getLocation($_GET['loc']);
    // dd($location) ;
 }

 include "tpl/tpl-map.php"; 

 

